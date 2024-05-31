<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Strona główna biblioteki') }}
        </h2>
    </x-slot>
    <!-- dodać formularz dla indexu dla admina -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
                        <div>
                            <div class="font-semibold text-gray-700 dark:text-gray-400">{{ __('Numer telefonu') }}</div>
                            <div class="text-gray-600 dark:text-gray-300">{{$info['nrtel']}}</div>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-700 dark:text-gray-400">{{ __('Adres') }}</div>
                            <div class="text-gray-600 dark:text-gray-300">{{$info['adres']}}</div>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-700 dark:text-gray-400">{{ __('Email') }}</div>
                            <div class="text-gray-600 dark:text-gray-300">{{$info['email']}}</div>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-700 dark:text-gray-400">{{ __('Godziny otwarcia') }}</div>
                            <div class="text-gray-600 dark:text-gray-300">Poniedziałek - Piątek: {{$info['otwarcienormal']}}, Sobota: {{$info['otwarcieweekend']}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>