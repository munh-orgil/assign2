@props(['book'])

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var mainHeight = document.getElementById("main-picture-" + {{ $book->id }}).clientHeight;
        document.getElementById("blank-layer-" + {{ $book->id }}).style.height = (mainHeight - 20) + "px";
    });
</script>

<x-card class="hover:bg-onHover bg-white cursor-pointer" onclick="document.location.href='/book/' + {{ $book->id }}">
    <div class="flex h-48">
        <img class="hidden w-32 mr-6 md:block rounded-sm object-cover"
            src="{{ $book->picture ? asset('storage/' . $book->picture) : asset('/assets/no-picture.png') }}" />
        <div class="flex-1 relative">
            <span class="text-xl font-bold line-clamp-1 py-2">
                <a href="/book/{{ $book->id }}">{{ $book->title }}</a>
            </span>
            <div class="text-sm font-bold pt-1">
                <i class="fa-solid fa-pen-nib pr-1"></i> Зохиолч: {{ $book->author }}
            </div>
            <div class="text-sm pt-2 font-bold ">
                <i class="fa-regular fa-calendar pr-1"></i> Хэвлэгдсэн: {{ $book->published_date }}
            </div>
            <div class="line-clamp-4 text-justify pt-2 text-xs text-slate-600">
                {{ $book->description }}
            </div>

        </div>
    </div>
</x-card>
