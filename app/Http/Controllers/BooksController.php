<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Book;
use App\Models\User;
use Auth;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['index','show']
        ]);

    }
    public function index()
    {
        $books = Book::with('Keeper')->paginate(10);
        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function destroy(Book $book)
    {
        $this->authorize('destroy', $book);
        $book->delete();
        session()->flash('success', '成功删除该书！');
        return back();
    }

    public function order(Book $book)
    {
        $this->authorize('order', $book);
        if (!Auth::user()->isOrdering($book->id)) {
            Auth::user()->order($book->id);
            session()->flash('success', '已成功预约本书！');
        }
        return redirect()->route('books.show', $book->id);
    }
}
