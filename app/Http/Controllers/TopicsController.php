<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use App\Http\Requests\StoreTopicRequest;
use Auth;
use Flash;

class TopicsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $topics = Topic::with('user')->paginate(7);
        return view('topics.index', compact('topics', 'users'));
    }

    public function create(Request $request)
    {
        $categories = Category::get();
        $topic = new Topic;
        return view('topics.create_edit', compact('categories','topic'));
    }

    public function store(StoreTopicRequest $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = Auth::id();
        $topic = Topic::create($data);
        session()->flash('success', '话题发布成功！');
        return redirect()->route('topics.show', $topic->id);
    }

    public function show($id)
    {
        $topic= Topic::findOrFail($id);
        $user = $topic->user;
        return view('topics.show', compact('topic', 'user'));
    }

    public function destroy($id)
    {
        $topic= Topic::findOrFail($id);
        $this->authorize('destroy', $topic);
        $topic->delete();
        session()->flash('success', '成功删除话题！');
        return redirect()->route('topics.index');
    }
}
