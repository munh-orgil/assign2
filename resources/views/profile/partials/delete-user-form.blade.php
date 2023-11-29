<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Бүртгэл устгах') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Хэрэв та бүртгэлээ устгавал таны бүх мэдээлэл устах тул чухал мэдээллүүдээ татаж аваарай.') }}
        </p>
    </header>

    <x-danger-button x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Устгах') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Бүртгэлээ устгахдаа итгэлтэй байна уу?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Хэрэв та бүртгэлээ устгавал таны бүх мэдээлэл устах тул чухал мэдээллүүдээ татаж аваарай.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Нууц үг') }}" class="sr-only border" />

                <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4 border"
                    placeholder="{{ __('Нууц үг') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 border" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Болих') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Бүртгэл устгах') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
