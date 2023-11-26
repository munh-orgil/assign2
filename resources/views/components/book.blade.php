@props(['book'])

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var mainHeight = document.getElementById("main-picture-" + {{ $book->id }}).clientHeight;
        document.getElementById("blank-layer-" + {{ $book->id }}).style.height = (mainHeight - 20) + "px";
    });
</script>

<x-card class="hover:bg-onHover bg-white cursor-pointer" onclick="document.location.href='/book/' + {{ $book->id }}">
    <div class="flex h-72">
        <img class="hidden w-48 h-full mr-6 md:block rounded-lg"
            src="{{ $book->picture ? asset('storage/' . $book->picture) : asset('/assets/no-picture.png') }}" />
        <div class="flex-1 relative">
            <span class="text-xl font-bold line-clamp-1 py-2">
                <a href="/book/{{ $book->id }}">{{ $book->title }}</a>
            </span>
            <div class="text-m font-bold pt-1">
                <i class="fa-solid fa-pen-nib pr-2"></i> Зохиолч: {{ $book->author }}
            </div>
            <div class="text-m pt-2 font-bold ">
                <i class="fa-regular fa-calendar pr-2"></i> Хэвлэгдсэн огноо: {{ $book->published_date }}
            </div>
            <div class="line-clamp-6 text-justify pt-2">
                {{-- <div class="text-sm text-gray-600 h-36 w-min-full truncate ... pt-4"> --}}
                {{ $book->description }}
            </div>

        </div>
    </div>
</x-card>
