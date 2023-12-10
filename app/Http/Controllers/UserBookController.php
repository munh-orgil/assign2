<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookUser;
use App\Models\User;
use Carbon\Carbon;
use Clockwork\Request\UserDataItem;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\TestPushNotification;

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
        $bookUsers = BookUser::orderBy('expire_at', 'DESC')->filter(request(['book', 'user']))->paginate(10);

        foreach ($bookUsers as $bookUser) {
            $bookUser->book = Book::where("id", "=", $bookUser->book_id)->first();
            $bookUser->user = User::where("id", "=", $bookUser->user_id)->first();
        }

        return view('librarian.index', ['books' => $bookUsers]);
    }

    public function bookStateChange(Request $request)
    {
        DB::transaction(function () use ($request) {
            $bookUser = BookUser::where("id", "=", $request->id)->first();
            if ($bookUser->status == 0) {
                $user = User::where("id", "=", $bookUser->user_id)->first();
                if ($user->balance < 3500) {
                    return back()->with("warning", "Хэрэглэгчийн үлдэгдэл хүрэлцэхгүй байна");
                }
                $user->balance -= 3500;
                $user->save();
            }
            $now = Carbon::now();
            if ($request->status == 1) {
                $bookUser->received_at = $now;
            }
            $bookUser->status = $request->status;
            $bookUser->expire_at = $now->addDays(7);
            $bookUser->save();
        });
        return back()->with("success", "Амжилттай");
    }

    public function extend(Request $request)
    {
        $bookUser = BookUser::where("id", "=", $request->id)->first();
        $bookUser->status = 2;
        $expireTime = Carbon::createFromFormat('Y-m-d H:i:s', $bookUser->expire_at);
        $bookUser->expire_at = $expireTime->addDay();
        $bookUser->save();
        $user = User::findOrFail($bookUser->user_id);
        $book = Book::findOrFail($bookUser->book_id);
        $user->notify(new TestPushNotification($user->id, $book->title));
        return back()->with("success", "Амжилттай");
    }

    public function order(Book $book)
    {
        if ($book->remaining_count < 1) {
            return back()->with("alert", "Ном дууссан байна");
        }
        if (auth()->user()->email_verified_at == null) {
            return redirect("profile")->with("alert", "Та и-мэйл ээ баталгаажуулна уу");
        }
        if (auth()->user()->balance < 3500) {
            return back()->with("alert", "Таны үлдэгдэл хүрэлцэхгүй байна");
        }
        if (BookUser::where("user_id", "=", auth()->user()->id)->where("book_id", "=", $book->id)->where("status", "!=", 3)->exists()) {
            return back()->with("alert", "Та энэ номыг захиалсан байна");
        }
        $now = Carbon::now();
        $userBook = BookUser::create([
            'user_id' => auth()->user()->id,
            'book_id' => $book->id,
            'expire_at' => $now->addDay(),
        ]);
        if ($userBook == null) {
            return back()->with("warning", "Захиалга хийх үед алдаа гарлаа");
        }

        return back()->with("success", "Захиалга амжилттай хийгдлээ. Та номын сан дээр очиж номоо хүлээж авна уу.");
    }
}
