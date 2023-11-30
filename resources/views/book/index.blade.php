<x-layout>
    <form action="/" class="flex-1 min-w-fit">
        <div class="relative border-2 border-gray-300 mx-4 mb-4 rounded-lg items-center">
            <div class="absolute top-3 left-3">
                <i class="fa fa-search text-primary z-20"></i>
            </div>
            <input type="text" name="search"
                class="h-12 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none text-sm"
                value="@isset($_GET['search']){{ $_GET['search'] }}@endisset"
                placeholder="Номын нэр, тайлбар, эсвэл зохиогчоор хайх..." />
            <div class="absolute top-1 right-1">
                <button type="submit" class="h-10 w-20 text-white rounded-lg bg-primary hover:bg-slate-700">
                    Хайх
                </button>
            </div>
        </div>
    </form>
    <div class="flex-2 mt-6 px-8 pb-2">
        {{ $books->links() }}
    </div>

    <div class="lg:grid lg:grid-cols-3 gap-2 space-y-2 md:space-y-0 mx-4">
        @foreach ($books as $book)
            <x-book :book="$book" />
        @endforeach
    </div>
    <div class="flex-2 mt-6 px-8 pb-2">
        {{ $books->links() }}
    </div>
</x-layout>
