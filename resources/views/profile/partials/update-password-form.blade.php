<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Нууц үг солих') }}
        </h2>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Одоогийн нууц үг')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 border block w-full"
                autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Шинэ нууц үг')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 border block w-full"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Шинэ нууц үг давтах')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                class="mt-1 border block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Хадгалах') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 20000)"
                    class="text-sm text-gray-600">{{ __('Хадгалагдлаа.') }}</p>
            @endif
        </div>
    </form>
</section>
