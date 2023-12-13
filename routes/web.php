<?php

use App\Events\TestNotification;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserBookController;
use App\Models\User;
use App\Events\TestPushNotification;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// index - show all
// show - show single
// create - show form to create
// store - store the new object
// edit - show form to edit
// update - update the edited object
// delete - delete the object

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [BookController::class, 'index']);
Route::get('/book/{book}', [BookController::class, 'show']);
Route::middleware('auth')->get('/my_books/{user_id}', [UserBookController::class, 'myBooks']);
Route::middleware('auth')->post('/order/{book}', [UserBookController::class, 'order']);

Route::middleware(['auth', 'librarian'])->prefix("librarian")->group(function () {
    Route::get('', [UserBookController::class, 'allBooks']);
    Route::put('', [UserBookController::class, 'bookStateChange']);
    Route::put('extend', [UserBookController::class, 'extend']);
});

Route::middleware(['auth', 'manager'])->prefix("manager")->group(function () {
    Route::get('', [ManagerController::class, 'index']);
    Route::get('/create', [ManagerController::class, 'create']);
    Route::post('/store', [ManagerController::class, 'store']);
    Route::get('/edit/{id}', [ManagerController::class, 'edit']);
    Route::put('/update/{book}', [ManagerController::class, 'update']);
    Route::delete('/delete/{book}', [ManagerController::class, 'delete']);
    Route::get("/user", [UserController::class, 'list']);
    Route::put("/user", [UserController::class, 'editRole']);
});

Route::post("/test", function () {
    $id = request()->name;
    $user = User::findOrFail($id);
    $user->notify(new TestPushNotification($user->id, 'Таны номыг сунгалаа'));
    // dd('notification sent');
});

require __DIR__ . '/auth.php';
