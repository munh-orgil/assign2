<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    use HasFactory;
    protected $table = "book_user";

    public function scopeFilter($query, int $userId)
    {
        if ($userId ?? false) {
            $query->where('user_id', '=', $userId);
        }
    }
}
