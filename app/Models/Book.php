<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $guarded = ['id'];

//    保管者
    function getKeeper(){
        $user = User::find($this->user_id);
        return $user;
    }
}
