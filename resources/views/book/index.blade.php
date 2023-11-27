<x-layout>
    <form action="/">
        <div class="relative w-1/2 border-2 border-gray-300 mx-4 mb-4 rounded-lg items-center">
            <div class="absolute top-3 left-3">
                <i class="fa fa-search text-primary z-20"></i>
            </div>
            <input type="text" name="search"
                class="h-12 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                value="@isset($_GET['search']){{ $_GET['search'] }}@endisset"
                placeholder="Номны нэр, тайлбар, эсвэл зохиогчоор хайх..." />
            <div class="absolute top-1 right-1">
                <button type="submit" class="h-10 w-20 text-white rounded-lg bg-primary hover:bg-secondary">
                    Search
                </button>
            </div>
        </div>
    </form>
    <div class="lg:grid lg:grid-cols-2 gap-2 space-y-2 md:space-y-0 mx-4">
        @foreach ($books as $book)
            <x-book :book="$book" />
        @endforeach
    </div>
    <div class="mt-6 p-4">
        {{ $books->links() }}
    </div>
</x-layout>
