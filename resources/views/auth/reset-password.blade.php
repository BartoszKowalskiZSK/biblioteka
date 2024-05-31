<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Zapomniałeś hasła? Bez problemu. Podaj nam swój adres e-mail, a my wyślemy Ci link do zresetowania hasła, który pozwoli Ci wybrać nowe.') }}
    </div>

    <!-- Status sesji -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Adres e-mail -->
        <div>
            <x-input-label for="email" :value="__('Adres e-mail')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Wyślij link do resetowania hasła') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>