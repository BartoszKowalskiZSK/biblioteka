<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Wypożycz książki') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session()->has('koszyk') && count(session()->get('koszyk')) > 0)
                        <form method="POST" action="{{ route('borrow.store') }}">
                            @csrf
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">Tytuł</th>
                                        <th class="px-4 py-2">Autor</th>
                                        <th class="px-4 py-2">Ilość</th>
                                        <th class="px-4 py-2">Wypożycz</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session()->get('koszyk') as $ksiazka)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $ksiazka['tytul'] }}</td>
                                            <td class="border px-4 py-2">{{ $ksiazka['autor'] }}</td>
                                            <td class="border px-4 py-2">{{ $ksiazka['ilosc'] }}</td>
                                            <td class="border px-4 py-2">
                                                <input type="checkbox" name="ksiazki[]" value="{{ $ksiazka['id'] }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                                Wypożycz
                            </button>
                        </form>
                    @else
                        <p>Koszyk jest pusty.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>