<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Нэр -->
        <div>
            <x-input-label for="first_name" :value="__('Нэр')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"
                required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Овог -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Овог')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- И-мэйл -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('И-мэйл')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Нууц үг -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Нууц үг')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Нууц үг давтах -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Нууц үг давтах')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4"> Бүртгэлтэй юу?
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 pl-1"
                href="{{ route('login') }}">
                {{ __('Нэвтрэх') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Бүртгүүлэх') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
