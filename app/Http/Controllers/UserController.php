<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function changeRole(int $role)
    {
        auth()->user()->selected_role = $role;
        return back();
    }
}
