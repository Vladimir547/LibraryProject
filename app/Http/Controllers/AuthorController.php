<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Redirect;

class AuthorController extends Controller
{
    /**
     * вывод страницы добавления автора
     *
     *  @return \Illuminate\Contracts\Support\Renderable
     */
    public function add() {
        return view('layouts.add');
    }

    /**
     * Пост запрос на добавление автора
     *
     * @param Illuminate\Http\Request
     *
     *  @return Illuminate\Support\Facades\Redirect
     */
    public function insert(Request $request) {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required'
        ]);
        $article = Author::create([
            'firstName' => $request['firstname'],
            'lastName' => $request['lastname'],
            'genre' => $request['genre'],
            'description' => $request['description']]);
        if ($article->exists) {
            return back()->with('success', 'Автор добавлен');
        } else {
            return back()->with('error', 'Что-то пошло не так');
        }
    }

    /**
     * вывод всех авторов
     *
     *  @return \Illuminate\Contracts\Support\Renderable
     */
    public function show() {
        $authors = Author::paginate(10);
        return view('layouts.authors', ['authors' => $authors]);
    }

    /**
     * Удаление автора
     *
     * @param Illuminate\Http\Request
     *
     *  @return Illuminate\Support\Facades\Redirect
     */
    public function delete(int $id) {
        $delete = Author::where('id', $id)->first()->delete();
        if ($delete) {
            return back()->with('success', 'Автор успешно удален');
        }
        return back()->with('error', 'Что-то пошло не так(');
    }

    /**
     * страница изменения автора
     *
     *  @return \Illuminate\Contracts\Support\Renderable
     */
    public function updatePage(int $id) {
        $author = Author::where('id', $id)->first();
        return view('layouts.authorUpdate', ['author' => $author]);
    }


    /**
     * Пост запрос на изменение автора
     *
     * @param Illuminate\Http\Request
     *
     *  @return Illuminate\Support\Facades\Redirect
     */
    public function update(int $id, Request $request ) {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required'
        ]);
        $author = Author::where('id', $request->id)->first()->update([
            'firstName' => $request->firstname,
            'lastName' => $request->lastname,
            'genre' => $request->genre,
            'description' => $request->description
        ]);
        return back()->with('success', 'Автор успешно изменен');
    }

    /**
     * вывод одного книги
     *
     *  @return \Illuminate\Contracts\Support\Renderable
     */
    public function showOne(int $id) {
        $author = Author::where('id', $id)->first();
        return view('layouts.author', ['author' => $author]);
    }
}
