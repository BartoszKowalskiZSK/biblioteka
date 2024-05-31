<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dodaj książkę') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="/books/create">
                        @csrf

                        <div class="mb-6">
                            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700 dark:text-gray-400">
                                Tytuł
                            </label>
                            <input type="text" name="name" id="name" class="border border-gray-400 p-2 w-full text-black @error('name') border-red-500 @enderror" value="{{ old('name') }}" required autofocus>

                            @error('name')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block mb-2 uppercase font-bold text-xs text-gray-700 dark:text-gray-400">
                                Opis
                            </label>
                            <textarea name="description" id="description" class="border border-gray-400 p-2 w-full text-black @error('description') border-red-500 @enderror" required>{{ old('description') }}</textarea>

                            @error('description')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="ISBN" class="block mb-2 uppercase font-bold text-xs text-gray-700 dark:text-gray-400">
                                ISBN
                            </label>
                            <input type="text" name="ISBN" id="ISBN" class="border border-gray-400 p-2 w-full text-black @error('ISBN') border-red-500 @enderror" value="{{ old('ISBN') }}" required>

                            @error('ISBN')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="author" class="block mb-2 uppercase font-bold text-xs text-gray-700 dark:text-gray-400">
                                Autor
                            </label>
                            <select name="author" id="author" class="border border-gray-400 p-2 w-full text-black @error('author') border-red-500 @enderror" required>
                                @foreach ($authors as $author)
                                    <option value="{{intval($author['id'])}}">{{$author['name']." ".$author['surname']}}</option>
                                @endforeach
                                <!-- Tu normalnie wpisz opcje ręcznie lub z innej zmiennej, jeśli dostępna -->
                            </select>

                            @error('author')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <button type="submit" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Dodaj książkę
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
