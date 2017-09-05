<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Auth;

//畅言评论
class ChangyanController extends Controller
{
    public static function getuserinfo(){
        //    global $wgUser; //全局变量
        //    (注意：$wgUser变量用来表示用户在您网站登录信息，该变量得开发者自己实现，
        //    实现方式一般是通过cookie或session原理)
        if(Auth::check()){
            $ret=array(
                "is_login"=>1, //已登录，返回登录的用户信息
                "user"=>array(
                    "user_id"=> Auth::user()->id ,
                    "nickname"=> Auth::user()->name,
                    "img_url"=> Auth::user()->gravatar(),
                    "profile_url"=> route('users.show', Auth::user()->id) ,
                    "sign"=>"abadon" //注意这里的sign签名验证已弃用，任意赋值即可
                )
            );
        }else{
            $ret=array("is_login"=>0);//未登录
        }
        echo $_GET['callback'].'('.json_encode($ret).')';
    }

    public static function changyan_logout(){
        if(Auth::check()){
            $return=array(
                'code'=>1,
                'reload_page'=>0
            );
        }else{
            $mwuser->logout();
            $return=array(
                'code'=>1,
                'reload_page'=>1
            );
        }
    }
}
