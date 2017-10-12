<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Notifications\ResetPassword;
use Auth;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

    const departments = [
        '0' => '未决定',
        '1' => '小说部',
        '2' => '电影部',
        '3' => '科技部',
        '4' => '外联部',
        '5' => '行政部',
    ];

    const academys = [
        '00' => '我来自其他奇怪的地方',
        '01' => '商船学院',
        '02' => '物流工程学院',
        '03' => '信息工程学院',
        '04' => '海洋环境与安全工程学院',
        '06' => '交通运输学院',
        '07' => '经济管理学院',
        '08' => '外国语学院',
        '10' => '文理学院',
        '20' => '继续教育学院',
    ];

    protected $table   = 'users';
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->activation_token = str_random(30);
        });
    }

    public function gravatar($size = '100')
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

//    关注的用户 所发布的状态
    public function feed()
    {
        $user_ids = Auth::user()->followings->pluck('id')->toArray();
        array_push($user_ids, Auth::user()->id);
        return Status::whereIn('user_id', $user_ids)
                              ->with('user')
                              ->orderBy('created_at', 'desc');
    }

    public function followers()
    {
        return $this->belongsToMany(User::Class, 'followers', 'user_id', 'follower_id')->withTimestamps();
    }

    public function followings()
    {
        return $this->belongsToMany(User::Class, 'followers', 'follower_id', 'user_id')->withTimestamps();
    }

    public function follow($user_ids)
    {
        if (!is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        $this->followings()->sync($user_ids, false);
    }

    public function unfollow($user_ids)
    {
        if (!is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        $this->followings()->detach($user_ids);
    }

    //判断是否在关注人列表上
    public function isFollowing($user_id)
    {
        return $this->followings->contains($user_id);
    }

    // 性别

    // 学院名称
    public function getAcademyName($academy_id = null)
    {
        if($academy_id !== null){
            return array_key_exists($academy_id, self::academys) ? self::academys[$academy_id] : academys['00'];
        }

        return self::academys;
    }

    // 部门名称
    public function getDepartmentName($department_id = null)
    {
        if($department_id !== null){
            return array_key_exists($department_id, self::departments) ? self::departments[$department_id] : departments['0'];
        }

        return self::departments;
    }

    // 对书本预定
    public function orderings()
    {
        return $this->belongsToMany(Book::Class, 'book_order', 'user_id', 'book_id')->withTimestamps();
    }
    //判断是否在自己已经预定的图书列表上
    public function isOrdering($book_id)
    {
        return $this->orderings->contains($book_id);
    }

    public function order($book_ids)
    {
        if (!is_array($book_ids)) {
            $book_ids = compact('book_ids');
        }
        $this->orderings()->sync($book_ids);
    }

    public function unorder($book_ids)
    {
        if (!is_array($book_ids)) {
            $book_ids = compact('book_ids');
        }
        $this->orderings()->detach($book_ids);
    }

//    praise
    public function praisedTopics()
    {
        return $this->morphedByMany(Topic::class, 'praisable', 'praises')->withPivot('created_at');
    }

    public function praisedArticles()
    {
        return $this->morphedByMany(Article::class, 'praisable', 'praises')->withPivot('created_at');
    }
}
