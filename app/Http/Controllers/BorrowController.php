<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Book;
use Auth;

class BorrowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Book $book)
    {
        if (!Auth::user()->isOrdering($book->id)) {
            Auth::user()->order($book->id);
        }
        session()->flash('success', '已成功预约本书！');
        return redirect()->route('books.show', $book->id);
    }

    public function destroy(Book $book)
    {
        if (Auth::user()->isOrdering($book->id)) {
            Auth::user()->unorder($book->id);
        }
        session()->flash('danger', '已取消预约本书！');
        return redirect()->route('books.show', $book->id);
    }
}
