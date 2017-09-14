<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $guarded = ['id'];

//    保管者
    public function Keeper(){
        return $this->belongsTo(User::class ,'user_id');
    }

    public function display_score($score){
        if($score>=9){
            $score = colorful_label('success',$score);
        }elseif ($score>=7.5){
            $score = colorful_label('info',$score);
        }elseif($score>=6){
            $score = colorful_label('warning',$score);
        }elseif($score>0){
            $score = colorful_label('danger',$score);
        }elseif($score==0){
            $score = colorful_label('default', '无');
        }
        echo $score;
    }
}
