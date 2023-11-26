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
    // protected $fillable = [
    //     'title',
    //     'description',
    //     'author',
    //     'picture',
    //     'published_date',
    //     'page_count',
    //     'remaining_count',
    // ];
    public $timestamps = false;
}
