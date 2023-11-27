<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookUser;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        $bookUsers = BookUser::latest()->paginate(10);
        $bookIds = [];
        $userIds = [];

        foreach ($bookUsers as $item) {
            array_push($bookIds, $item->book_id);
            array_push($userIds, $item->user_id);
        }

        $books = Book::whereIn('id', $bookIds)->get();
        $users = User::whereIn('id', $userIds)->get();
        $result = [];

        foreach ($bookUsers as $key => $item) {
            $book = $books->where('id', $item->book_id)->first();
            $user = $users->where('id', $item->user_id)->first();

            if ($user != null && $book != null) {
                $bookUsers[$key]->book = $book;
                $bookUsers[$key]->user = $user;
                $result[$key] = $bookUsers[$key];
            }
        }

        return view('librarian.index', ['results' => $result]);
    }
}
