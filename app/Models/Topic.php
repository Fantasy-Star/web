<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    protected $keepRevisionOf = [
        'deleted_at',
        'is_excellent',
        'is_blocked',
        'order',
    ];

    protected $searchable = [
        'columns' => [
            'topics.title' => 10,
            'topics.body'  => 5,
        ]
    ];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    // Don't forget to fill this array
    protected $fillable = [
        'title',
        'slug',
        'body',
        'excerpt',
        'is_draft',
        'source',
        'body_original',
        'user_id',
        'category_id',
        'created_at',
        'updated_at',
    ];

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($topic) {
            foreach ($topic->replies as $reply) {
                app(UserRepliedTopic::class)->remove($reply->user, $reply);
            }
        });
    }

    public function share_link()
    {
        return $this->hasOne(ShareLink::class);
    }

    public function attentedUsers()
    {
        return $this->belongsToMany(User::class, 'attentions')->get();
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Tag()
    {
        return $this->hasMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lastReplyUser()
    {
        return $this->belongsTo(User::class, 'last_reply_user_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_topics');
    }

    public function appends()
    {
        return $this->hasMany(Append::class);
    }

    public function generateLastReplyUserInfo()
    {
        $lastReply = $this->replies()->recent()->first();

        $this->last_reply_user_id = $lastReply ? $lastReply->user_id : 0;
        $this->save();
    }

    public function getRepliesWithLimit($limit = 30, $order = 'created_at')
    {
        $pageName = 'page';
        // Default display the latest reply
        $latest_page = is_null(\Input::get($pageName)) ? ceil($this->reply_count / $limit) : 1;
        $query = $this->replies()->with('user');

        $query = ($order == 'vote_count') ? $query->orderBy('vote_count', 'desc') : $query->orderBy('created_at', 'asc');

        return $query->paginate($limit, ['*'], $pageName, $latest_page);
    }

    public function scopeByWhom($query, $user_id)
    {
        return $query->where('user_id', '=', $user_id);
    }

    public function scopeDraft($query)
    {
        return $query->where('is_draft', '=', 'yes');
    }

    public function scopeWithoutDraft($query)
    {
        return $query->where('is_draft', '=', 'no');
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function isArticle()
    {
        return $this->category_id == config('phphub.blog_category_id');
    }

    public function isShareLink()
    {
        return $this->category_id == config('phphub.hunt_category_id');
    }
}
