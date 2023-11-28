<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Овог -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Овог')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                autofocus />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Нэр -->
        <div>
            <x-input-label for="first_name" :value="__('Нэр')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"
                autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>


        <!-- И-мэйл -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('И-мэйл')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Нууц үг -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Нууц үг')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Нууц үг давтах -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Нууц үг давтах')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <div class="block mt-4 mx-16">
            <x-primary-button class="flex w-full items-center justify-center">
                {{ __('Бүртгүүлэх') }}
            </x-primary-button>
        </div>
        <div class="block mt-2 mx-16">
            <x-secondary-button class="flex w-full items-center justify-center"
                onclick="document.location.href='/login'">
                Нэвтрэх
            </x-secondary-button>
            {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 pl-1"
                href="{{ route('login') }}">
                {{ __('Нэвтрэх') }}
            </a> --}}
        </div>
    </form>
</x-guest-layout>
