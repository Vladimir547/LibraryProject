@extends('layouts.main')
@section('content')
    <div id="app" class="bg-gray-300">
        <div class="container mx-auto">
            <div class="py-20">
                @if (count($authors) > 0)

                    @foreach($authors as $author)
                        <div
                            class="hover:bg-gray-200 cursor-pointer bg-white shadow flex md:flex-nowrap flex-wrap p-5 items-center mb-5 rounded-lg">
                            <div class="lg:w-1/2 w-full p-3">
                                <div class="flex items-center">
                                    <img :src="contact.picture.thumbnail" class="rounded-full">
                                    <div>
                                        <span
                                            class="capitalize block text-gray-800">{{ $author->firstName . ' ' . $author->lastName }}</span>
                                        <span class="text-sm block text-gray-600">{{ $author->genre }}</span>
                                    </div>

                                </div>
                            </div>

                            <div class="lg:w-1/2 w-full p-3">
                                <span class="text-gray-600 text-sm">Количество Книг: {{ count($author->book) }}</span>
                            </div>
                            <div class="lg:w-3/4 w-full p-3">
                                <a href="{{ asset("author/{$author->id}") }}" type="button"
                                   class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Инфо</a>

                                @auth
                                    @if(auth()->user()->role == 'admin' or auth()->user()->id == $author->user_id)
                                        <a href="{{ asset("author/update/{$author->id}") }}" type="button"
                                           class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Изменить</a>
                                        <a href="{{ asset("book/add/{$author->id}") }}" type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Добавит книгу автору</a>

                                    @if(auth()->user()->role == 'admin')
                                            <a href="{{ asset("author/delete/{$author->id}") }}" type="button"
                                               class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Удалить</a>
                                        @endif
                                    @endif

                                @endauth
                            </div>

                        </div>
                    @endforeach
                    {{ $authors->onEachSide(0)->links() }}
                @else
                    Нет автора
                @endif
            </div>
        </div>

@stop
