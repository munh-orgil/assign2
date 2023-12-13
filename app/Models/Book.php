<?php

namespace App\Models;

use Clockwork\Request\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'book';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('author', 'like', '%' . request('search') . '%');
        }
        if ($filters['book'] ?? false) {
            $query->where('title', 'like', '%' . request('book') . '%')
                ->orWhere('author', 'like', '%' . request('book') . '%');
        }
    }
    public function user()
    {
        return $this->belongsToMany(User::class, "book_user");
    }
}
