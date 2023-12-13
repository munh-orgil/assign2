@props(['book'])

{{-- @dd($book) --}}
<?php
$statusItems = [['Аваагүй', 'gray-500'], ['Хүлээж авсан', 'blue-400'], ['Сунгасан', 'yellow-500'], ['Буцааж өгсөн', 'green-600'], ['Хугацаа хэтэрсэн', 'red-400']];
// dd($book);
// dd($book->pivot->status);
if ($book->pivot->status != 3 && date('Y-m-d H:m:s') > $book->pivot->expire_at) {
    $book->pivot->status = 4;
}
$statusObject = $statusItems[$book->pivot->status];
?>

<x-card class=" bg-white cursor-pointer">
    <div class="flex h-48">
        <img class="hidden w-32 mr-6 md:block rounded-sm object-cover"
            src="{{ $book->picture ? asset('storage/' . $book->picture) : asset('/assets/no-picture.png') }}"
            onclick="document.location.href='/book/' + {{ $book->id }}" />
        <div class="flex-1-row relative">
            <span class="text-xl font-bold line-clamp-1 py-2">
                <a href="/book/{{ $book->id }}">{{ $book->title }}</a>
            </span>
            <div class="text-sm font-bold pt-1">
                Төлөв: <span class="text-{{ $statusObject[1] }}">
                    {{ $statusObject[0] }} </span>
            </div>
            <div class="text-sm pt-2 font-bold ">
                Хүлээж авсан: {{ $book->published_date }}
            </div>
            <div class="text-sm pt-2 font-bold ">
                Дуусах: {{ $book->pivot->expire_at }}
            </div>
            <ul
            @if ($book->pivot->status != 1) hidden="hidden" @endif
            >
                <li class="mt-6 mb-14 px-2">
                    <a href="/extendTime/{{$book->pivot->book_id}}" class="flex justify-center p-2 rounded-lg bg-primary text-white hover:bg-slate-700 group">
                        <i class="fa-solid fa-clock-rotate-left my-auto pr-2"></i>
                        <span>
                            Хугацаа сунгах
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</x-card>
