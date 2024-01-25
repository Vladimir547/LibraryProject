<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Информация автора') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Обновление информации автора.") }}
        </p>
    </header>
    @isset($author)
        <form class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10" action="{{ route('profile.author') }}"
              method="POST">
            @csrf
            <input type="hidden"  name="id" value="{{$author->id}}">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-first-name">
                        Имя
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        required id="grid-first-name" name="firstname" type="text" placeholder="Jane" value="{{ $author->firstName }}">
                    <p class="text-red-500 text-xs italic">Обязательное поле.</p>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-last-name">
                        Фамилия
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        required name="lastname" id="grid-last-name" type="text" placeholder="Doe"  value="{{ $author->lastName }}">
                    <p class="text-red-500 text-xs italic">Обязательное поле.</p>

                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-first-name">
                        Жанр
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" name="genre" placeholder="Фантастика"  value="{{ $author->genre }}">
                </div>
                <div class="w-full px-3">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Описание</label>
                    <textarea id="message" rows="4"
                              class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 bg-gray-200 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="Write your thoughts here..." name="description"> {{ $author->description }}</textarea>
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
    @else
        Вас удалили как автора
    @endisset

</section>
