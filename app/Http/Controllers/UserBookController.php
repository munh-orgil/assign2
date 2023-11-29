<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserBookController extends Controller
{
    public function myBooks($user_id)
    {
        $user = User::find($user_id);

        $books = $user->books()->paginate(12);

        return view('book.my_books', ['books' => $books]);
    }
    public function allBooks()
    {
        $bookUsers = BookUser::paginate(5);

        foreach ($bookUsers as $bookUser) {
            $bookUser->book = Book::where("id", "=", $bookUser->book_id)->first();
            $bookUser->user = User::where("id", "=", $bookUser->user_id)->first();
        }

        return view('librarian.index', ['books' => $bookUsers]);
    }

    public function bookStateChange($UserBookId){
        
        return null;
    }
}
