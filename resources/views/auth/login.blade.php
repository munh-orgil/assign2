<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- И-мэйл -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('И-мэйл')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" oninvalid="this.setCustomValidity('И-Мэйл оруулна уу.')"
                oninput="this.setCustomValidity('')" />
        </div>

        <!-- Нууц үг -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Нууц үг')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" oninvalid="this.setCustomValidity('Нууц үг оруулна уу.')"
                oninput="this.setCustomValidity('')" />
        </div>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <!-- Сануулах -->
        <div class="block mt-4 relative">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Сануулах') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a class="absolute underline right-0 text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Нууц үг мартсан') }}
                </a>
            @endif
        </div>

        <div class="mt-8 mx-16">
            <x-primary-button class="flex w-full justify-center" href="{{ route('login') }}">
                Нэвтрэх
            </x-primary-button>
        </div>
        <div class="mt-2 mx-16">
            <x-secondary-button
                class="flex w-full justify-center items-center bg-white text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 pl-1"
                onclick="document.location.href='/register'">
                Бүртгүүлэх
            </x-secondary-button>
        </div>
    </form>
</x-guest-layout>
