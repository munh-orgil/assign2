<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

// use Illuminate\Support\Facades\Cache;


class BookController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->has('page') ? $request->query('page') : 1;
        $books = Book::latest()->filter(request(['search']))->paginate(5);
        if (Redis::get('books' . $page) == null) {
            Redis::set('books' . $page, serialize($books));
            return view('book.index', ['books' => $books]);
        } else {
            $books = unserialize(Redis::get('books' . $page));
            return view('book.index', ['books' => $books]);
        }
    }
    public function show(Book $book)
    {
        if (Auth::check()) {
            $bookUser = BookUser::where("user_id", auth()->user()->id)->where("book_id", $book->id)->first();
            if ($bookUser == null) {
                $book['can_purchase'] = true;
            } else {
                $book['can_purchase'] = false;
            }
        }
        return view('book.show', ['book' => $book]);
    }
}
