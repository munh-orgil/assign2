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
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class ManagerController extends Controller
{

    public function index(Request $request)
    {
        if (auth()->user()->role > 1) {
            $page = $request->has('page') ? $request->query('page') : 1;
            $books = Book::latest()->filter(request(['book']))->paginate(10);
            if (Redis::get('booksManager' . $page) == null) {
                Redis::set('booksManager' . $page, serialize($books));
                return view('manager.index', ['books' => $books]);
            } else {
                $books = unserialize(Redis::get('booksManager' . $page));
                return view('manager.index', ['books' => $books]);
            }
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
        $formFields = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string',],
            'author' => ['required', 'string', 'max:255'],
            'picture' => 'max:500000',
            'published_date' => ['required'],
            'page_count' => ['required', 'int'],
            'remaining_count' => ['required', 'int'],
        ]);

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }
        ;

        Book::create($formFields);
        Redis::del(Redis::keys("books*"));
        return redirect('/manager/create')->with('success', "Ном бүртгэгдлээ");
    }
    public function edit(int $id)
    {
        $book = Book::where('id', '=', $id)->first();
        return view('manager.edit', ['book' => $book]);
    }

    public function update(Request $request, Book $book)
    {
        // dd($request->file("picture"));
        $formFields = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'author' => ['required', 'string', 'max:255'],
            'picture' => 'max:500000',
            'published_date' => ['required'],
            'page_count' => ['required', 'int'],
            'remaining_count' => ['required', 'int'],
        ]);

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }
        ;

        $book->update($formFields);
        Redis::del(Redis::keys("books*"));

        return redirect("/manager")->with('success', "Ном засагдлаа");
    }
    public function delete(Book $book)
    {
        $book->delete();
        Redis::del(Redis::keys("books*"));
        return redirect("/manager")->with('success', "Ном устгагдлаа");
    }
}
