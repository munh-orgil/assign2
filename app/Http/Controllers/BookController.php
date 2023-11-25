<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('book.index', ['books' => Book::latest()->paginate(10)]);
    }
    public function show(Book $book)
    {
        return view('book.show', ['book' => $book]);
    }
}
