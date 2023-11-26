<?php

namespace App\Http\Controllers;

use App\Models\resultsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibrarianController extends Controller
{

    public function index(){
       $result = DB::table('book_user')->latest()->paginate(10);

       $bookIds = $result->pluck('book_id')->toArray();
       $userIds = $result->pluck('user_id')->toArray();

       // Retrieve books and users using the retrieved IDs
       $books = DB::table('books')->whereIn('id', $bookIds)->get();
       $users = DB::table('user')->whereIn('id', $userIds)->get();

       // You can now associate books and users with each result
       foreach ($result as $key => $item) {
           $book = $books->where('id', $item->book_id)->first();
           $user = $users->where('id', $item->user_id)->first();

           $result[$key]->book = $book;
           $result[$key]->user = $user;
       }

       // You can now pass the paginated results, books, and users to your view
       return view('librarian.index', ['results' => $result]);
    }
}
