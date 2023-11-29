<x-layout>
    <div class="flex-2 px-8 pb-2">
        {{ $books->links() }}
    </div>
    <x-managerTable :books="$books">

    </x-managerTable>
</x-layout>