<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    use HasFactory;
    protected $table = "book_user";

    public function scopeFilter($query, array $filters)
    {
        if ($filters['book'] ?? false) {
            $books = Book::where('title', 'like', '%' . request('book') . '%')->get();
            $bookIds = [request('book')];
            foreach ($books as $book) {
                array_push($bookIds, $book->id);
            }
            $query->whereIn('book_id', $bookIds);
        }
        if ($filters['user'] ?? false) {
            $users = User::where('reg_no', 'like', '%' . request('user') . '%')
                ->orWhere('email', 'like', '%' . request('user') . '%')->get();
            $userIds = [];
            foreach ($users as $user) {
                array_push($userIds, $user->id);
            }
            $query->whereIn('user_id', $userIds);
        }
    }
}
