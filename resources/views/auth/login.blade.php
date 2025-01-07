<x-guest-layout>
    <div class="flex justify-center items-center bg-gray-900">
        <!-- Reduced top and bottom space with margins -->
        <div class="w-full max-w-md p-8 bg-gray-800 shadow-md rounded-lg my-8">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-green-500" :status="session('status')" />
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-lg font-semibold text-gray-200" />
                    <x-text-input id="email" class="block mt-1 w-full p-2 bg-gray-700 border border-gray-600 text-gray-100 rounded focus:ring-indigo-500 focus:border-indigo-500"
                                  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-lg font-semibold text-gray-200" />
                    <x-text-input id="password" class="block mt-1 w-full p-2 bg-gray-700 border border-gray-600 text-gray-100 rounded focus:ring-indigo-500 focus:border-indigo-500"
                                  type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>
                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded bg-gray-800 border-gray-600 text-indigo-500 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-400 hover:text-gray-200" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <x-primary-button class="ms-3 bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-300">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
