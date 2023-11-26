<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        return view('book.index', ['books' => Book::latest()->filter(request(['search']))->paginate(10)]);
    }
    public function show(Book $book)
    {
        if (Auth::check()) {
            $bookUser = BookUser::where("user_id", auth()->id)->where("book_id", $book->id)->first();
            if ($bookUser == null) {
                $book['can_purchase'] = true;
            } else {
                $book['can_purchase'] = false;
            }
        }
        return view('book.show', ['book' => $book]);
    }
}
