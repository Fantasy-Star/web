<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Role extends Model
{
    protected $table = 'valhalla';

    //英灵殿
    public static function getAllHero()
    {
        $heros = Role::orderBy('id', 'asc')->get();
        return $heros;
    }

    public function getHeroInfo(){
        $user = User::find($this->user_id);
        return $user;
    }

}
