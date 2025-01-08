<x-layout>
    <h1 class="text-3xl font-bold text-center text-white mb-8">Home</h1>

    <!-- Top Users Section -->
    <div class="outline flex flex-col justify-center mx-auto p-6 rounded-lg w-[300px] bg-gray-800 shadow-lg">
        <h2 class="text-lg font-semibold text-center text-white mb-8">
            If you've made more then 5 posts you will also end up on this list!
        </h2>

        <!-- Top Users -->
        <div class="flex flex-col justify-center">
            @if(count($topUsers) > 0)
                <h2 class="text-l text-white mb-4">Top Users</h2>
                <ul class="space-y-2">
                    @foreach($topUsers as $user)
                        <li class="self-center w-36 bg-yellow-400 text-black p-3 text-center rounded-lg shadow-md hover:shadow-xl transition duration-300 ease-in-out">
                            {{ $user->name }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-400 text-center mt-4">No top users found.</p>
            @endif
        </div>
    </div>

    <!-- Confetti Button Section -->
    @if(auth()->check() && auth()->id() === $user->id)
        <div class="flex justify-center mt-8">
            <!-- Confetti Button -->
            <button onclick="confetti();"
                    class="bg-yellow-500 text-white font-bold py-3 px-8 rounded-full shadow-lg transform transition-all duration-300 hover:scale-110 hover:bg-yellow-600 active:scale-95 focus:outline-none flex items-center space-x-2">
                <span>🎉</span>
                <span>Secret Celebration Button</span>
            </button>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    @endif
</x-layout>
