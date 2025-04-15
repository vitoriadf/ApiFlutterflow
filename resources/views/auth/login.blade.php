<x-guest-layout>
    <!-- Session Status -->

    <x-auth-session-status class="mb-4" :status="session('status')" />


    <form method="POST" action="{{ route('login') }}">
        <h3 class="text-5xl text-fuchsia-900 font-semibold mb-10">Login</h3>
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full border" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full border"
                type="password"
                name="password"
                required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-fuchsia-200 border-fuchsia-300 dark:border-fuchsia-300 text-fuchsia-900 shadow-sm focus:ring-fuchsia-500 dark:focus:ring-fuchsia-900 dark:focus:ring-offset-fuchsia-800" name="remember">
                <span class="ms-2 text-sm text-fuchsia-900 dark:text-fuchsia-900">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
    @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 dark:text-fuchsia-900 hover:text-fuchsia-600 dark:hover:text-fuchsia-600 rounded-md"
           href="{{ route('password.request') }}">
            {{ __('Esqueceu sua senha') }}
        </a>
    @endif

    <div class="flex items-center space-x-4">
        <a class="underline text-sm text-gray-600 dark:text-fuchsia-900 hover:text-fuchsia-600 dark:hover:text-fuchsia-600 rounded-md"
           href="{{ route('register') }}">
            {{ __('Não registrado?') }}
        </a>

        <x-primary-button class="ms-3">
            {{ __('Log in') }}
        </x-primary-button>
    </div>
</div>
    </form>
</x-guest-layout>