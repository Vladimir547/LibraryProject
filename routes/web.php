<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthorController;
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
Route::get('/author/{id}', [AuthorController::class, 'showOne'])->name('layouts.author');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'author'])->name('profile.author');
    Route::get('/author/add', [AuthorController::class, 'add'])->name('layouts.add');
    Route::post('/author/add', [AuthorController::class, 'insert'])->name('insert');
    Route::get('/author/delete/{id}', [AuthorController::class, 'delete'])->name('author.delete');
    Route::get('/author/update/{id}', [AuthorController::class, 'updatePage'])->name('author.updatePage');
    Route::post('/author/update/{id}', [AuthorController::class, 'update'])->name('author.update');

});

require __DIR__.'/auth.php';
