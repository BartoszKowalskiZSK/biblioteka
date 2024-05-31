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
                        @foreach($books as $book)
                            <div class="bg-orange-400 h-64 w-full p-4 rounded-lg shadow-md relative">
                                @if ($book['image'])
                                    <img src="{{ asset('img/'. $book['image']) }}" alt="{{ $book['name'] }}" class="w-full h-48 object-cover rounded-t-lg mb-2">
                                @endif
                                <h3 class="font-bold text-lg text-gray-900 dark:text-gray-100 mt-2">{{ $book['name'] }}</h3>
                                <div class="flex justify-center mt-4 align-items-end"> <!-- added align-items-end -->
                                    <a href="#" class="inline-block bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Dodaj do koszyka</a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-8">
                        <div class="text-center">
                            <h2 class="font-bold text-2xl text-gray-900 dark:text-gray-100">Polecane produkty</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            @foreach($books as $book)
                                <div class="bg-orange-400 h-64 w-full p-4 rounded-lg shadow-md relative">
                                    @if ($book['image'])
                                        <img src="{{ asset('img/'. $book['image']) }}" alt="{{ $book['name'] }}" class="w-full h-48 object-cover rounded-t-lg mb-2">
                                    @endif
                                    <h3 class="font-bold text-lg text-gray-900 dark:text-gray-100 mt-2">{{ $book['name'] }}</h3>
                                    <div class="flex justify-center mt-4 align-items-end"> <!-- added align-items-end -->
                                        <a href="#" class="inline-block bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Dodaj do koszyka</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-8">
                        <div class="text-center">
                            <h2 class="font-bold text-2xl text-gray-900 dark:text-gray-100">Aktualności</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            @foreach($books as $book)
                                <div class="bg-orange-400 h-64 w-full p-4 rounded-lg shadow-md relative">
                                    @if ($book['image'])
                                        <img src="{{ asset('img/'. $book['image']) }}" alt="{{ $book['name'] }}" class="w-full h-48 object-cover rounded-t-lg mb-2">
                                    @endif
                                    <h3 class="font-bold text-lg text-gray-900 dark:text-gray-100 mt-2">{{ $book['name'] }}</h3>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>