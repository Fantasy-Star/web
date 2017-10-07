<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use App\Models\ShareLink;
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
        $msg = '话题发布成功！';

        if ($data['category_id'] == config('fantasystar.share_category_id')) {
            $a = '<a class="label label-info" href=" ' . $data['link'] . ' "> ' . $data['link'] . ' </a>';
            $data['body'] = colorful_label('primary','分享链接') . ' ' . $a . "<br><hr>" . $data['body'];
            $msg = '链接分享成功！';
        }

        $topic = Topic::create($data);

        if($topic->isShareLink()){
            ShareLink::create([
                'topic_id' => $topic->id,
                'link' => $data['link'],
                'site' => domain_from_url($data['link']),
            ]);
        }
        session()->flash('success', $msg );
        return redirect()->route('topics.show', $topic->id);
    }

    public function show($id)
    {
        $topic= Topic::findOrFail($id);
        $user = $topic->user;
        return view('topics.show', compact('topic', 'user'));
    }

    public function edit($id)
    {
        $categories = Category::get();
        $topic= Topic::findOrFail($id);
        $this->authorize('edit', $topic);
        return view('topics.create_edit', compact('categories', 'topic'));
    }

    public function update($id, StoreTopicRequest $request)
    {
        $topic= Topic::findOrFail($id);
        $this->authorize('update', $topic);

        $data = $request->except('_token');

        if ($topic->isShareLink()) {
            $topic->share_link->link = $data['link'];
            $topic->share_link->site = domain_from_url($data['link']);
            $topic->share_link->save();
        }
        $topic->update($data);
        session()->flash('success', '话题更新成功！');
        return redirect()->route('topics.show', $topic->id);
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
