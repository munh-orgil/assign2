<x-layout>
    
    <div class="lg:grid lg:grid-cols-2 gap-2 space-y-2 md:space-y-0 mx-4">
        @foreach ($books as $book)
            <x-book :book="$book" />
        @endforeach
    </div>
    <div class="mt-6 p-4">
        {{ $books->links() }}
    </div>
</x-layout>
