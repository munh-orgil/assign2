<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Хувийн мэдээлэл
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Өөрийн хувийн мэдээлэл болон и-мэйл ээ өөрчлөх:
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="last_name" :value="__('Овог')" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 border block w-full"
                :value="old('last_name', $user->last_name)" required autofocus autocomplete="last_name" />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <div>
            <x-input-label for="first_name" :value="__('Нэр')" />
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 border block w-full"
                :value="old('first_name', $user->first_name)" required autofocus autocomplete="first_name" />
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>

        <div>
            <x-input-label for="reg_no" :value="__('Регистерийн дугаар')" />
            <x-text-input id="reg_no" name="reg_no" type="text" class="mt-1 border block w-full"
                :value="old('reg_no', $user->reg_no)" required autofocus autocomplete="reg_no" />
            <x-input-error class="mt-2" :messages="$errors->get('reg_no')" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Гэрийн хаяг')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 border block w-full"
                :value="old('address', $user->address)" required autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div>
            <x-input-label for="phone_no" :value="__('Утасны дугаар')" />
            <x-phone-input id="phone_no" name="phone_no" type="text" class="mt-1 border block w-full"
                :value="old('phone_no', $user->phone_no)" required autofocus autocomplete="phone_no" />
            <x-input-error class="mt-2" :messages="$errors->get('phone_no')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('И-Мэйл')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 border block w-full"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (!$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Таны и-мэйл баталгаажаагүй байна.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Энд дарж баталгаажуулах мэйл авна уу.') }}
                        </button>
                    </p>
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Хадгалах') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Хадгалагдлаа.') }}</p>
            @endif
        </div>
    </form>
</section>
