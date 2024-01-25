<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;


class BookController extends Controller
{
    public function show() {
        $books = Book::paginate(10);
        return view('layouts.books', ['books' => $books]);
    }
    public function showOne(int $id) {
        $book = Book::where('id', $id)->first();
        return view('layouts.book', ['book' => $book]);
    }
    public function addPage (int $id) {
        $author = Author::where('id', $id)->first();
        return view('layouts.bookAdd', [
            'author' => $author,
            'id' => $author->id,

        ]);
    }
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
    public function myBooks () {
        $author = Author::where('user_id', auth()->user()->id)->first();
        $books = Book::where('author_id', $author->id)->paginate(10);
        return view('layouts.books', ['books' => $books]);
    }
}
