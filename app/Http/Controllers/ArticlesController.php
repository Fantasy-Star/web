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
        $article = new Article;
        return view('articles.create_edit', compact('article'));
    }

    public function edit($id)
    {
        $article= Article::findOrFail($id);
        $this->authorize('edit', $article);
        return view('articles.create_edit', compact('article'));
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

    public function update($id, StoreArticleRequest $request)
    {
        $article= Article::findOrFail($id);
        $this->authorize('update', $article);

        $data = $request->except('_token');
        $article->update($data);

        session()->flash('success', '文章更新成功！');
        return redirect()->route('articles.show', $article->id);
    }

    public function destroy($id)
    {
        $article= Article::findOrFail($id);
        $this->authorize('destroy', $article);
        $article->delete();
        session()->flash('success', '成功删除文章！');
        return redirect()->route('articles.index');
    }
}
