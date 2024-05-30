

@handheld
<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <nav class="mobile-menu text-center">
                        <a href="/login" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded mb-4" style="margin-bottom: 20px;">{{ __("Zaloguj") }}</a>
                        <a href="/welcome" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded mb-4" style="margin-bottom: 20px;">{{ __("Informacje") }}</a>
                        <a href="/contact" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">{{ __("Kontakt") }}</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script>
    
  </script>

</x-app-layout>

@endhandheld