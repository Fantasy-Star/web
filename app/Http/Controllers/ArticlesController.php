<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
use Auth;
use Flash;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $articles = Article::with('user')->paginate(10);
        return view('articles.index', compact('articles', 'users'));
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $article = new Article;
        return view('articles.create_edit', compact('article', 'user'));
    }

    public function store(StoreArticleRequest $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = Auth::id();
        $article = Article::create($data);
        session()->flash('success', '文章发布成功！');
        return redirect()->route('articles.show', $article->id);
    }

    public function show($id)
    {
        $article= Article::findOrFail($id);
        $user = $article->user;
        return view('articles.show', compact('article', 'user'));
    }
}
