<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/author/show', [AuthorController::class, 'show'])->name('layouts.authors');
Route::get('/book/show', [BookController::class, 'show'])->name('book.show');
Route::get('/author/{id}', [AuthorController::class, 'showOne'])->name('layouts.author');
Route::get('/book/{id}', [BookController::class, 'showOne'])->name('layouts.book');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'author'])->name('profile.author');
    Route::get('/author/add/new', [AuthorController::class, 'add'])->name('layouts.add');
    Route::post('/author/add', [AuthorController::class, 'insert'])->name('insert');
    Route::get('/author/delete/{id}', [AuthorController::class, 'delete'])->name('author.delete');
    Route::get('/author/update/{id}', [AuthorController::class, 'updatePage'])->name('author.updatePage');
    Route::post('/author/update/{id}', [AuthorController::class, 'update'])->name('author.update');
    Route::get('/book/add/{id}', [BookController::class, 'addPage'])->name('book.add');
    Route::post('/book/add/{id}', [BookController::class, 'add'])->name('addBook');
    Route::get('/book/delete/{id}', [BookController::class, 'delete'])->name('book.delete');
    Route::get('/book/update/{id}', [BookController::class, 'updatePage'])->name('book.updatePage');
    Route::post('/book/update/{id}', [BookController::class, 'update'])->name('book.update');
    Route::get('/book/my/{id}', [BookController::class, 'myBooks'])->name('book.my');
});

require __DIR__.'/auth.php';
