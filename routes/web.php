<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LibrarianController;
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

Route::get('/', [BookController::class, 'index']);

Route::get('/book/{book}', [BookController::class, 'show']);

Route::get('/librarian',[LibrarianController::class, 'index'] );

Route::get('/manager');
