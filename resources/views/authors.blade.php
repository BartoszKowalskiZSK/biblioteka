<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Autorzy') }}
        </h2>
        <a href="{{ route('author-add') }}">
            <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                {{ __('+ Dodaj autora') }}
            </button>
        </a>
    </div>
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <!-- authors.blade.php -->

<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
    @foreach($authors as $author)
    <div class="bg-gray-200 shadow-md rounded p-4">
    <h2 class="block w-full pl-10 text-lg text-gray-900 dark:text-black-300">{{ $author->name }} {{ $author->surname }}</h2>
    <a href="{{ route('delete.author', $author->id) }}" class="inline-flex justify-items-end px-4 py-2 bg-orange-500 hover:bg-orange-700 text-white font-semibold border border-transparent rounded-md shadow-sm about-button" style="float: right;">
        <button>Usuń autora</button>
    </a>
    <!-- Tutaj możesz dodać więcej informacji o autorze, np. zdjęcie, biografię itp. -->
</div>
    @endforeach
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>