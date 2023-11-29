<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" enctype="multipart/form-data" action="{{ url("/manager/update/$book->id") }}">
        @csrf
        @method("PUT")
        <!-- Номны нэр -->
        <div>
            <x-input-label for="title" :value="__('Номны нэр')" />
            <x-text-input id="title" class="block mt-1 w-full" type="title" name="title" value="{{$book->title}}" required
                autofocus autocomplete="username"/>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Номны тайлбар -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Номны тайлбар')" />

            <x-textarea id="description" class="block mt-1 w-full" type="description" name="description" required
                autocomplete="current-description">
                @slot('slot')
                {{$book->description}}
                @endslot
            </x-textarea>

            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <!-- Зохиолч -->
        <div class="mt-4">
            <x-input-label for="author" :value="__('Зохиолч')" />

            <x-text-input id="author" class="block mt-1 w-full" type="author" name="author" value="{{$book->author}}" required
                autocomplete="current-author" />

            <x-input-error :messages="$errors->get('author')" class="mt-2" />
        </div>

        <!-- Зураг оруулах -->
        <div class="mt-4">
            <x-input-label for="picture" :value="__('Зураг оруулах')" />

            <x-file-input id="picture" class="block mt-1 w-full" type="picture" 
                autocomplete="current-picture" />

            <x-input-error :messages="$errors->get('picture')" class="mt-2" />

            <img class="hidden w-48 h-full mr-12 md:block rounded-lg"
                src="{{ $book->picture ? asset('storage/' . $book->picture) : asset('/assets/no-picture.png') }}" />
        </div>

        <!-- Хэвлэгдсэн он -->
        <div class="mt-4">
            <x-input-label for="published_date" :value="__('Хэвлэгдсэн он')" />

            <x-date-input id="published_date" class="block mt-1 w-full" type="published_date" name="published_date" value="{{$book->published_date}}" required
                autocomplete="current-published_date" />

            <x-input-error :messages="$errors->get('published_date')" class="mt-2" />
        </div>

        <!-- Хуудасны тоо -->
        <div class="mt-4">
            <x-input-label for="page_count" :value="__('Хуудасны тоо')" />

            <x-text-input id="page_count" class="block mt-1 w-full" type="page_count" name="page_count" value="{{$book->page_count}}" required
                autocomplete="current-page_count" />

            <x-input-error :messages="$errors->get('page_count')" class="mt-2" />
        </div>

        <!-- Үлдэгдэл -->
        <div class="mt-4">
            <x-input-label for="remaining_count" :value="__('Үлдэгдэл')" />

            <x-text-input id="remaining_count" class="block mt-1 w-full" type="remaining_count" name="remaining_count" value="{{$book->remaining_count}}" required
                autocomplete="current-remaining_count" />

            <x-input-error :messages="$errors->get('remaining_count')" class="mt-2" />
        </div>
        

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Засах') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
