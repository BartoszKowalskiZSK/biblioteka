<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kontakt') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">{{ __('Kontakt') }}</h3>
                    <p>{{ __('Proszę wypełnić poniższy formularz, aby skontaktować się z nami.') }}</p>
                   
                    <form method="POST" action="{{ route('message.store') }}" class="mt-6">
                        @csrf

                        <div class="mb-4">
                        <div class="mb-4">
    <label for="topic" class="block text-sm font-medium text-gray-900 dark:text-gray-300">
        {{ __('Temat') }}
    </label>
    <input type="text" id="topic" name="topic" class="block w-full pl-10 text-sm text-gray-900 dark:text-black-300">
</div>

<div class="mb-4">
    <label for="email" class="block text-sm font-medium text-gray-900 dark:text-gray-300">
        {{ __('Email') }}
    </label>
    <input type="email" id="email" name="email" class="block w-full pl-10 text-sm text-gray-900 dark:text-black-300">
</div>

<div class="mb-4">
    <label for="description" class="block text-sm font-medium text-gray-900 dark:text-gray-300">
        {{ __('Treść wiadomości') }}
    </label>
    <textarea id="description" name="description" class="block w-full pl-10 text-sm text-gray-900 dark:text-black-300"></textarea>
</div>

                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-orange-500 hover:bg-orange-700 text-white font-semibold border border-transparent rounded-md shadow-sm">
                            {{ __('Wyślij wiadomość') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <style>
 .navbar {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
  padding: 10px;
  background-color: #333;
  color: #fff;
}

.navbar a {
  color: #fff;
  text-decoration: none;
  margin-right: 20px;
}

.navbar a:hover {
  color: #ccc;
}

@media (max-width: 640px) {
 .navbar {
    flex-direction: column;
  }

 .navbar a {
    margin-bottom: 10px;
  }
}
</style>
    </div>
</x-app-layout>