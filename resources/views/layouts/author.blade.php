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
                                @endif

                            @endauth
                        </div>
                    </div>
                    @else
                        Нет такого автора
                    @endif
                </section>
            </div>
        </div>
    </div>
@endsection
