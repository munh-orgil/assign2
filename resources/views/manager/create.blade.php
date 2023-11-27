
    <x-guest-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" enctype="multipart/form-data" action="{{ url("/manager/store") }}">
            @csrf

            <!-- Номны нэр -->
            <div>
                <x-input-label for="book_name" :value="__('Номны нэр')" />
                <x-text-input id="book_name" class="block mt-1 w-full" type="book_name" name="book_name" :value="old('book_name')" required
                    autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('book_name')" class="mt-2" />
            </div>

            <!-- Номны тайлбар -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Номны тайлбар')" />

                <x-textarea id="description" class="block mt-1 w-full" type="description" name="description" required
                    autocomplete="current-description" />

                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- Зохиолч -->
            <div class="mt-4">
                <x-input-label for="author" :value="__('Зохиолч')" />

                <x-text-input id="author" class="block mt-1 w-full" type="author" name="author" required
                    autocomplete="current-author" />

                <x-input-error :messages="$errors->get('author')" class="mt-2" />
            </div>

            <!-- Зураг оруулах -->
            <div class="mt-4">
                <x-input-label for="picture" :value="__('Зураг оруулах')" />

                <x-file-input id="picture" class="block mt-1 w-full" type="picture" name="picture" required
                    autocomplete="current-picture" />

                <x-input-error :messages="$errors->get('picture')" class="mt-2" />
            </div>

            <!-- Хэвлэгдсэн он -->
            <div class="mt-4">
                <x-input-label for="published_date" :value="__('Хэвлэгдсэн он')" />

                <x-date-input id="published_date" class="block mt-1 w-full" type="published_date" name="published_date" required
                    autocomplete="current-published_date" />

                <x-input-error :messages="$errors->get('published_date')" class="mt-2" />
            </div>

            <!-- Хуудасны тоо -->
            <div class="mt-4">
                <x-input-label for="page_count" :value="__('Хуудасны тоо')" />

                <x-text-input id="page_count" class="block mt-1 w-full" type="page_count" name="page_count" required
                    autocomplete="current-page_count" />

                <x-input-error :messages="$errors->get('page_count')" class="mt-2" />
            </div>

            <!-- Үлдэгдэл -->
            <div class="mt-4">
                <x-input-label for="remaining_count" :value="__('Үлдэгдэл')" />

                <x-text-input id="remaining_count" class="block mt-1 w-full" type="remaining_count" name="remaining_count" required
                    autocomplete="current-remaining_count" />

                <x-input-error :messages="$errors->get('remaining_count')" class="mt-2" />
            </div>
            

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-3">
                    {{ __('Үүсгэх') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
