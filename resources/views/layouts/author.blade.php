@extends('layouts.main')
@section('content')
    <div id="app" class="bg-gray-300">
        <div class="container mx-auto">
            <div class="py-20">
                <section class="text-gray-700 body-font">
                    @if (!empty($author))

                        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                            <div
                                class="lg:flex-grow md:w-full lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $author->FirstName . ' ' . $author->lastName}}</h1>
                                <span class="text-sm block text-gray-600">{{ $author->genre }}</span>
                                <p class="mb-8 leading-relaxed">{{ $author->description }}</p>
                                @auth
                                    @if(auth()->user()->role == 'admin' or auth()->user()->id == $author->user_id)
                                        <div class="flex justify-center">
                                            <a href="{{ asset("author/update/{$author->id}") }}" type="button"
                                               class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Изменить</a>
                                        </div>
                                        <div class="flex justify-center">
                                            <a href="{{ asset("/book/add/{$author->id}") }}" type="button"
                                               class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Добавить книгу</a>
                                        </div>
                                    @endif

                                @endauth
                            </div>
                        </div>
                        @if (count($author->book) > 0 and !empty($author->book))

                            @foreach($author->book as $book)
                                <div
                                    class="hover:bg-gray-200 cursor-pointer bg-white shadow flex md:flex-nowrap flex-wrap p-5 items-center mb-5 rounded-lg">
                                    <div class="lg:w-1/2 w-full p-3">
                                        <div class="flex items-center">
                                            <img :src="contact.picture.thumbnail" class="rounded-full">
                                            <div>
                                        <span
                                            class="capitalize block text-gray-800">{{ $book->Title  }}</span>
                                                <span class="text-sm block text-gray-600">{{ $book->genre }}</span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="lg:w-1/2 w-full p-3">
                                        <span class="text-gray-600 text-sm">Автор: {{ $book->author->firstName . " " . $book->author->lastName }}</span>
                                    </div>
                                    <div class="lg:w-3/4 w-full p-3">
                                        <a href="{{ asset("book/{$book->id}") }}" type="button"
                                           class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Инфо</a>

                                        @auth
                                            @if(auth()->user()->role == 'admin' or auth()->user()->id == $book->author->user_id)
                                                <a href="{{ asset("book/update/{$book->id}") }}" type="button"
                                                   class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Изменить</a>
                                                <a href="{{ asset("book/delete/{$book->id}") }}" type="button"
                                                   class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Удалить</a>
                                            @endif

                                        @endauth
                                    </div>

                                </div>
                            @endforeach
                        @else
                            У автора нет книг
                        @endif
                    @else
                        Нет такого автора
                    @endif
                </section>
            </div>
        </div>
    </div>
@endsection
