<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Koszyk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session()->has('cart') && count(session()->get('cart')) != null)
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Tytuł</th>
                                    <th class="px-4 py-2">Autor</th>
                                    <th class="px-4 py-2">Cena</th>
                                    <th class="px-4 py-2">Ilość</th>
                                    <th class="px-4 py-2">Suma</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session()->get('cart') as $book)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $book['title'] }}</td>
                                        <td class="border px-4 py-2">{{ $book['author'] }}</td>
                                        <td class="border px-4 py-2">{{ $book['price'] }} zł</td>
                                        <td class="border px-4 py-2">{{ $book['quantity'] }}</td>
                                        <td class="border px-4 py-2">{{ $book['price'] * $book['quantity'] }} zł</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <form method="POST" action="{{ route('order.store') }}">
                            @csrf
                            <button type="submit" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                                Zamów
                            </button>
                        </form>
                    @else
                        <p>Twój koszyk jest pusty.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>