<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Notifications\ResetPassword;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    const sex = [
        '0' => '未知',
        '1' => '♂ 男',
        '2' => '♀ 女',
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
        return $this->belongsToMany(User::Class, 'followers', 'user_id', 'follower_id');
    }

    public function followings()
    {
        return $this->belongsToMany(User::Class, 'followers', 'follower_id', 'user_id');
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
}
