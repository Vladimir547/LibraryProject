<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;


class BookController extends Controller
{
    /**
     * вывод книг
     *
     *  @return \Illuminate\Contracts\Support\Renderable
     */
    public function show() {
        $books = Book::paginate(10);
        return view('layouts.books', ['books' => $books]);
    }
    /**
     * вывод одной книги
     *
     *  @return \Illuminate\Contracts\Support\Renderable
     */
    public function showOne(int $id) {
        $book = Book::where('id', $id)->first();
        return view('layouts.book', ['book' => $book]);
    }
    /**
     * вывод страницы добавления книги
     *
     *
     *
     *  @return \Illuminate\Contracts\Support\Renderable
     */
    public function addPage (int $id) {
        $author = Author::where('id', $id)->first();
        return view('layouts.bookAdd', [
            'author' => $author,
            'id' => $author->id,

        ]);
    }
    /**
     * Пост запрос на добавление книги
     *
     * @param Illuminate\Http\Request
     *
     *  @return Illuminate\Support\Facades\Redirect
     */
    public function add(int $id, Request $request) {
        $request->validate([
            'title' => 'required',
        ]);
        $article = Book::create([
            'Title' => $request['title'],
            'genre' => $request['genre'],
            'description' => $request['description'],
            'author_id' => $id
            ]);
        if ($article->exists) {
            return back()->with('success', 'Книга добавленна');
        } else {
            return back()->with('error', 'Что-то пошло не так');
        }
    }

    /**
     * Удаление книги
     *
     *  @return Illuminate\Support\Facades\Redirect
     */
    public function delete(int $id) {
        $delete = Book::where('id', $id)->first()->delete();
        if ($delete) {
            return back()->with('success', 'Книга успешно удаленна');
        }
        return back()->with('error', 'Что-то пошло не так(');
    }
    public function updatePage(int $id) {
        $book = Book::where('id', $id)->first();
        return view('layouts.bookUpdate', ['book' => $book]);
    }
    /**
     * Изменение книги
     *
     * @param Illuminate\Http\Request
     *
     *  @return Illuminate\Support\Facades\Redirect
     */
    public function update(int $id, Request $request ) {
        $request->validate([
            'title' => 'required',
        ]);
        $book = Book::where('id', $id)->first()->update([
            'Title' => $request->title,
            'genre' => $request->genre,
            'description' => $request->description
        ]);
        return back()->with('success', 'Книга успешно измененна');
    }

    /**
     * Книги пользователя
     *
     *  @return \Illuminate\Contracts\Support\Renderable
     */
    public function myBooks () {
        $author = Author::where('user_id', auth()->user()->id)->first();
        $books = Book::where('author_id', $author->id)->paginate(10);
        return view('layouts.books', ['books' => $books]);
    }
}
