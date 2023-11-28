<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookUser;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class ManagerController extends Controller
{

    public function index()
    {
        if (auth()->user()->role > 1) {
            return view('manager.index', ['books' => Book::latest()->paginate(10)]);
        } else {
            return redirect("/unauthorized");
        }
    }

    public function create()
    {
        return view('manager.create', ['books' => Book::latest()->paginate(10)]);
    }
    public function store(Request $request)
    {
        // dd($request->file("picture"));
        $request->validate([
            'book_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'picture' => 'required|mimes:jpg,png|max:5000',
            'published_date' => ['required'],
            'page_count' => ['required', 'int'],
            'remaining_count' => ['required', 'int'],
        ]);

        $image = $request->file('picture');

        $nextId = DB::select("select AUTO_INCREMENT from information_schema.tables where table_name = 'book' AND table_schema = 'bookstore'");
        // dd($nextId);
        $nextIdStr = $nextId[0]->AUTO_INCREMENT;

        $new_name = 'book' . $nextIdStr . '.' . $image->getClientOriginalExtension();
        $image->move(storage_path('app/public/pictures'), $new_name);

        Book::create([
            'title' => $request->book_name,
            'description' => $request->description,
            'author' => $request->author,
            'picture' => $new_name,
            'published_date' => $request->published_date,
            'page_count' => $request->page_count,
            'remaining_count' => $request->remaining_count,
        ]);

        return redirect('/manager/create')->with('message', "Ном бүртгэгдлээ");
    }
    public function getBook(int $id)
    {
        return view('manager.edit', ['book' => Book::where('id', '=', $id)]);
    }

    public function update(Request $request)
    {
    }
}
