<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
use App\Models\ArticleCategory;
use Auth;
use Flash;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Request $request)
    {

        if( $request->get('category_id') ){
            $articles = Article::where('category_id' , $request->get('category_id') )->with('user')->paginate(8);
            $current_category = $request->get('category_id');
        }else{
            $articles = Article::with('user')->paginate(8);
            $current_category = 0;
        }
        $categories = ArticleCategory::get();
        return view('articles.index', compact('articles', 'categories'))->with('current_category', $current_category);
    }

    public function create(Request $request)
    {
        $categories = ArticleCategory::get();
        $article = new Article;
        return view('articles.create_edit', compact('article', 'categories'));
    }

    public function edit($id)
    {
        $categories = ArticleCategory::get();
        $article= Article::findOrFail($id);
        $this->authorize('edit', $article);
        return view('articles.create_edit', compact('article', 'categories'));
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
        $article->increment('view_count', 1);
        $praisedUsers = $article->praises()->orderBy('id', 'desc')->with('user')->get()->pluck('user');
        return view('articles.show', compact('article', 'user', 'praisedUsers'));
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

    /**
     * ----------------------------------------
     * User Article Praise function
     * ----------------------------------------
     */

    public function praise($id)
    {
        $article = Article::find($id);
        $article->praises()->create(['user_id' => Auth::user()->id, 'is' => 'praise']);
        $article->increment('praise_count', 1);
        return redirect()->back();
    }

    public function unpraise($id)
    {
        $article = Article::find($id);
        $article->praises()->ByWhom(Auth::id())->WithType('praise')->delete();
        $article->decrement('praise_count', 1);
        return redirect()->back();
    }
}
