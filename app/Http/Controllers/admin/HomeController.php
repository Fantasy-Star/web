<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    //
    public function index(User $user)
    {
        $this->authorize('admin', $user);
        return view('admin.home');
    }
}
