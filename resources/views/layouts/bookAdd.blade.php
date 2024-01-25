@extends('layouts.main')
@section('content')
    @auth
        @if(Auth::user()->role == 'admin' or Auth::user()->id == $author->user_id )
            <div class="min-h-screen bg-gray-100">
                <form class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10" action='{{ asset("book/add/$id") }}'
                      method="POST">
                    @csrf
                    @if($errors->any())
                        @foreach($errors->all() as $err)
                            <div
                                class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                                role="alert">
                                {{ $err }}
                            </div>
                        @endforeach
                    @endif
                    @if(session()->has('success'))
                        <div
                            class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div
                            class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <span class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Автор: {{ $author->firstName . " " . $author->lastName}}
                            </span>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-first-name">
                                Название
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                required id="grid-first-name" name="title" type="text" placeholder="Jane">
                            <p class="text-red-500 text-xs italic">Обязательное поле.</p>
                        </div>

                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-first-name">
                                Жанр
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-first-name" type="text" name="genre" placeholder="Фантастика">
                        </div>
                        <div class="w-full px-3">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Описание</label>
                            <textarea id="message" rows="4"
                                      class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 bg-gray-200 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                      placeholder="Write your thoughts here..." name="description"></textarea>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2 px-3">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0 mt-10">
                                <input type='submit'
                                       class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
                                       value="Сохранить">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        @else
            У вас нет прав!!
        @endif
    @endauth
@endsection
