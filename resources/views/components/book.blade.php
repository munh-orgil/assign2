@props(['book'])

<x-card class="hover:bg-secondary bg-white cursor-pointer"
    onclick="document.location.href='/book/' + {{ $book->id }}">
    <div class="flex">
        {{-- <img class="hidden w-48 mr-6 md:block"
            src="{{ $book->picture ? asset('storage/' . $book->picture) : asset('/assets/timthumb.png') }}" /> --}}

        <div class="relative min-w-48 pr-6">
            <img class="hidden w-48 mr-6 md:block rounded-xl relative z-20"
                src="{{ $book->picture != '' ? asset('storage/' . $book->picture) : asset('/assets/timthumb.png') }}" />
            <img class="hidden w-48 mr-6 md:block rounded-xl absolute top-2.5 left-2.5 min-h-[calc(100%-20px)] z-10"
                src="{{ asset('/assets/blank.png') }}" />
            <img class="hidden w-48 mr-6 md:block rounded-xl absolute top-0 left-4 z-0 opacity-90 blur-[1px] z-0"
                src="{{ $book->picture != '' ? asset('storage/' . $book->picture) : asset('/assets/timthumb.png') }}" />
        </div>
        <div class="flex-1">
            <span class="text-xl font-bold">
                <a href="/book/{{ $book->id }}">{{ $book->title }}</a>
            </span>
            <div class="text-m">{{ $book->author }}</div>
            <div class="text-m">
                <i class="fa-solid fa-calendar"></i> {{ $book->published_date }}
            </div>
            <div class="text-sm">{{ $book->description }}</div>
        </div>
    </div>
</x-card>
