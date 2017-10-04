<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function create(Request $request)
    {
        $category = Category::find($request->input('category_id'));
        $categories = Category::where('id', '!=', config('phphub.blog_category_id'))
            ->where('id', '!=', config('phphub.hunt_category_id'))
            ->get();

        return view('topics.create_edit', compact('categories', 'category'));
    }
}
