<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [BookController::class, 'index']);

Route::get('/book/{book}', [BookController::class, 'show']);

Route::get('/librarian', [LibrarianController::class, 'index']);
Route::get('/manager', [ManagerController::class, 'index']);
Route::get('/manager/create', [ManagerController::class, 'create']);
Route::post('/manager/store', [ManagerController::class, 'store']);

require __DIR__ . '/auth.php';
