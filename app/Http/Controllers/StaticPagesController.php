<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Status;
use App\Models\Role;
use Auth;

class StaticPagesController extends Controller
{
    public function home()
    {
        $feed_items = [];
        if (Auth::check()) {
            $feed_items = Auth::user()->feed()->paginate(20);
        }

        return view('static_pages/home', compact('feed_items'));
    }

    public function help()
    {
        return view('static_pages/help');
    }

    public function about()
    {
        return view('static_pages.about');
    }

    public function contact()
    {
        $YunYouJun = User::find(1);
        return view('static_pages.contact', compact('YunYouJun'));
    }

    public function valhalla()
    {
        $heros = Role::getAllHero();
        return view('static_pages.valhalla', compact('heros'));
    }

    public function bug()
    {
        return view('static_pages.bug');
    }

    public function advice()
    {
        return view('static_pages.advice');
    }

    public function sponsor()
    {
        return view('static_pages.sponsor');
    }
}
