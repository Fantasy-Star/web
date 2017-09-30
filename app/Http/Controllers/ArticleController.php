<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
use Auth;
use Flash;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $article = new Article;
        return view('articles.create_edit', compact('article', 'user'));
    }
}
