<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Książki') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-center">
                        <h1 class="font-bold text-3xl text-gray-900 dark:text-gray-100 mb-4">NOWOŚCI</h1>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach(array_slice($books, 0, 6) as $book)
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg md:w-1/2 lg:w-1/4">
                                <div class="p-4">
                                    @if ($book->image)
                                        <img src="{{ asset('img/'. $book->image) }}" alt="{{ $book->title }}" class="w-full h-48 object-cover rounded-t-lg mb-2">
                                    @endif
                                    <h3 class="font-bold text-lg text-gray-900 dark:text-gray-100 mt-2">{{ $book->title }}</h3>
                                    <p class="text-gray-600 dark:text-gray-400 mt-1">{{ $book->description }}</p>
                                    <div class="mt-4">
                                        <span class="text-gray-600 dark:text-gray-400 line-through">{{ $book->price }}</span>
                                        <span class="font-bold text-lg text-gray-900 dark:text-gray-100">{{ $book->discount_price }}</span>
                                        <a href="#" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-2">Dodaj do koszyka</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-8">
                        <div class="text-center">
                            <h2 class="font-bold text-2xl text-gray-900 dark:text-gray-100">Polecane produkty</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                            @foreach(array_slice($books, 0, 6) as $book)
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg md:w-1/2 lg:w-1/4">
                                    <div class="p-4">
                                        @if ($book->image)
                                            <img src="{{ asset('img/'. $book->image) }}" alt="{{ $book->title }}" class="w-full h-48 object-cover rounded-t-lg mb-2">
                                        @endif
                                        <h3 class="font-bold text-lg text-gray-900 dark:text-gray-100 mt-2">{{ $book->title }}</h3>
                                        <p class="text-gray-600 dark:text-gray-400 mt-1">{{ $book->description }}</p>
                                        <div class="mt-4">
                                            <span class="text-gray-600 dark:text-gray-400 line-through">{{ $book->price }}</span>
                                            <span class="font-bold text-lg text-gray-900 dark:text-gray-100">{{ $book->discount_price }}</span>
                                            <a href="#" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-2">Dodaj do koszyka</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-8">
                        <div class="text-center">
                            <h2 class="font-bold text-2xl text-gray-900 dark:text-gray-100">Aktualności</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                            @foreach(array_slice($books, 0, 6) as $book)
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg md:w-1/2 lg:w-1/4">
                                    <div class="p-4">
                                        @if ($book->image)
                                            <img src="{{ asset('img/'. $book->image) }}" alt="{{ $book->title }}" class="w-full h-48 object-cover rounded-t-lg mb-2">
                                        @endif
                                        <h3 class="font-bold text-lg text-gray-900 dark:text-gray-100 mt-2">{{ $book->title }}</h3>
                                        <p class="text-gray-600 dark:text-gray-400 mt-1">{{ $book->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>