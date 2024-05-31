<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Wiadomości') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-6">Dodaj nową wiadomość</h3>

                    <form method="POST" action="{{ route('message.store') }}">
                        @csrf
                        <div class="mb-6">
                            <label for="topic" class="block mb-2 uppercase font-bold text-xs text-gray-700 dark:text-gray-400">
                                Temat
                            </label>
                            <input type="text" name="topic" id="topic" class="border border-gray-400 p-2 w-full @error('topic') border-red-500 @enderror" value="{{ old('topic') }}" required autofocus>
                            @error('topic')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block mb-2 uppercase font-bold text-xs text-gray-700 dark:text-gray-400">
                                Opis
                            </label>
                            <textarea name="description" id="description" class="border border-gray-400 p-2 w-full @error('description') border-red-500 @enderror" required>{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700 dark:text-gray-400">
                                Email
                            </label>
                            <input type="email" name="email" id="email" class="border border-gray-400 p-2 w-full @error('email') border-red-500 @enderror" value="{{ old('email') }}" required>
                            @error('email')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Dodaj
                            </button>
                        </div>
                    </form>
                    @if(Auth::check() && Auth::user()->hasPrivillages(5))
                    <h3 class="text-lg font-semibold mb-6">Wiadomości</h3>

                    @if(session('success'))
                        <div class="mb-4 text-green-500">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-4 text-red-500">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('blank'))
                        <div class="mb-4 text-yellow-500">
                            {{ session('blank') }}
                        </div>
                    @endif
                    

                    
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Temat</th>
                                <th class="px-4 py-2">Opis</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Data</th>
                                <th class="px-4 py-2">Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($message as $msg)
                                <tr>
                                    <td class="border px-4 py-2">{{ $msg->id }}</td>
                                    <td class="border px-4 py-2">{{ $msg->topic }}</td>
                                    <td class="border px-4 py-2">{{ $msg->description }}</td>
                                    <td class="border px-4 py-2">{{ $msg->email }}</td>
                                    <td class="border px-4 py-2">{{ $msg->time }}</td>
                                    <td class="border px-4 py-2">
                                        <form method="POST" action="{{ route('message.delete', $msg->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline">
                                                Usuń
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>