<x-layout>
    <div class="container mx-auto mt-8 max-w-md">
        <h1 class="text-3xl font-bold text-white mb-6">Mijn Profiel</h1>

        @if(session('status'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('user.profile.update') }}" method="POST" class="space-y-4 bg-gray-800 p-6 rounded-lg shadow-lg">
            @csrf

            <div>
                <label for="name" class="block text-white mb-1">Naam</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}"
                       class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none" required>
            </div>

            <div>
                <label for="email" class="block text-white mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}"
                       class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none" required>
            </div>

            <div>
                <label for="password" class="block text-white mb-1">Nieuw Wachtwoord (optioneel)</label>
                <input type="password" name="password" id="password"
                       class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none">
            </div>

            <div>
                <button type="submit"
                        class="w-full py-2 bg-blue-600 hover:bg-blue-700 text-white rounded transition duration-300">
                    Profiel bijwerken
                </button>
            </div>
        </form>
    </div>
</x-layout>
