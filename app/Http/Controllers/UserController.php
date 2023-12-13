<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function changeRole(int $role)
    {
        auth()->user()->selected_role = $role;
        return back();
    }
    public function list()
    {
        $users = User::filter(request(['user']))->paginate(10);
        return view("user.list", ["users" => $users]);
    }
    public function editRole(Request $request)
    {
        $userId = $request->id;
        $role = $request->role;
        $user = User::where("id", "=", $userId)->first();
        $user->role = $role;
        $user->save();
        return back()->with("success", "Амжилттай");
    }
}
