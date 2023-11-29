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

        $books = $user->books()->paginate(10);

        return view('book.my_books', ['books' => $books]);
    }
}
