@props(['book'])

{{-- @dd($book) --}}
<?php
$statusItems = [['Аваагүй', 'yellow'], ['Хүлээж авсан', 'gray'], ['Сунгасан', '#052432'], ['Буцааж өгсөн', 'green'], ['Хугацаа хэтэрсэн', 'red']];
// dd($book);
// dd($book->pivot->status);
if ($book->pivot->status != 3 && date('Y-m-d H:m:s') > $book->pivot->expire_at) {
    $book->pivot->status = 4;
}
$statusObject = $statusItems[$book->pivot->status];
?>

<x-card class="hover:bg-onHover bg-white cursor-pointer" onclick="document.location.href='/book/' + {{ $book->id }}">
    <div class="flex h-48">
        <img class="hidden w-32 mr-6 md:block rounded-sm object-cover"
            src="{{ $book->picture ? asset('storage/' . $book->picture) : asset('/assets/no-picture.png') }}" />
        <div class="flex-1 relative">
            <span class="text-xl font-bold line-clamp-1 py-2">
                <a href="/book/{{ $book->id }}">{{ $book->title }}</a>
            </span>
            <div class="text-sm font-bold pt-1">
                Төлөв: <span class="" style="color: {{ $statusObject[1] }}">
                    {{ $statusObject[0] }} </span>
            </div>
            <div class="text-sm pt-2 font-bold ">
                Хүлээж авсан: {{ $book->published_date }}
            </div>
            <div class="text-sm pt-2 font-bold ">
                Дуусах: {{ $book->pivot->expire_at }}
            </div>
        </div>
    </div>
</x-card>
