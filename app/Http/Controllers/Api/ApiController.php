<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function show () {
        $books = Book::all();
        return response()->json([
            "status" => true,
            "books" => $books,
        ]);
    }
    public function update (Request $request) {
        $request->validate([
            'id' => 'required|int'
        ]);
        $book = Book::where('id', $request->id)->first();
        if(!empty($book)) {
            $book->update([
                'Title' => !empty($request->title) ? $request->title : $book->Title,
                'genre' => !empty($request->genre) ? $request->genre : $book->genre,
                'description' => !empty($request->description) ? $request->description : $book->description,
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Что-то пошло не так"
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => "Запись обновленна",
            "books" => $book
        ]);
    }
    public function showOne (Request $request) {
        $book = Book::where('id', $request->id)->first();
        return response()->json([
            "status" => true,
            "books" => $book
        ]);
    }
    public function delete (Request $request) {
        $request->validate([
            'id' => 'required|int'
        ]);
        $book = Book::where('id', $request->id)->first();
        if(!empty($book)) {
            $book->delete();
        } else {
            return response()->json([
                "status" => false,
                "message" => "Такой книги нет"
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => "Книга удаленна"
        ]);
    }
}
