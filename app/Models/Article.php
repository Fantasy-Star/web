<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    //    praise
    public function praises()
    {
        return $this->morphMany(Praise::class, 'praisable');
    }
    public function praisedUsers()
    {
        $user_ids = Praise::where('praisable_type', Topic::class)
            ->where('praisable_id', $this->id)
            ->where('is', 'praise')
            ->lists('user_id')
            ->toArray();
        return User::whereIn('id', $user_ids)->get();
    }
}
