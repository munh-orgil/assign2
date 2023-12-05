<x-layout>
    <div class="flex-2 px-8 pb-2">
        {{ $books->links() }}
    </div>
    <div class="antialiased text-gray-600 h-screen px-4">
        <div class="flex flex-col justify-start h-full">
            <div class="w-full max-w-8xl mx-auto bg-white rounded-lg border p-4">
                <table class="p-3 table-auto w-full">
                    <thead class="text-xs font-semibold uppercase text-gray-400">
                        <tr>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Номны дугаар</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Номны нэр</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Нэр</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">И-Мэйл</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Дуусах хугацаа</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Төлөв</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Сунгах</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr class="hover:bg-gray-200">
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="font-medium text-gray-800 pl-8">{{ $book->book->id }}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $book->book->title }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-medium">{{ $book->user->first_name }}
                                        {{ $book->user->last_name }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-medium">{{ $book->user->email }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-medium">{{ $book->expire_at }}</div>
                                </td>

                                <?php
                                $dropdownItems = [['name' => 'аваагүй', 'color' => 'gray-500'], ['name' => 'хүлээж авсан', 'color' => 'blue-400'], ['name' => 'сунгасан', 'color' => 'yellow-500'], ['name' => 'буцааж өгсөн', 'color' => 'green-600'], ['name' => 'хугацаа хэтэрсэн', 'color' => 'red-400']];
                                ?>

                                <td class="p-2 whitespace-nowrap">
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-{{ $dropdownItems[$book->status]['color'] }} bg-white focus:outline-none transition ease-in-out duration-150">
                                                <div>{{ $dropdownItems[$book->status]['name'] }}</div>

                                                <div class="ms-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <form method="POST" action="/librarian">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="id" value="{{ $book->id }}" />
                                                @for ($i = 0; $i < count($dropdownItems) - 1; $i++)
                                                    <?php
                                                    if ($i == 2) {
                                                        continue;
                                                    }
                                                    ?>
                                                    <button type="submit" value="{{ $i }}" name="status"
                                                        class="block p-2 hover:bg-slate-200 group w-full text-{{ $dropdownItems[$i]['color'] }} text-start">
                                                        {{ $dropdownItems[$i]['name'] }}
                                                    </button>
                                                @endfor
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </td>
                                <td class="p-2 whitespace-nowrap flex justify-center">
                                    <div class="text-sm text-center">
                                        <form action="/librarian/extend" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="id" value="{{ $book->id }}" />
                                            <button type="submit"
                                                class="rounded-lg border border-gray-400 p-2 enabled:hover:bg-gray-300 disabled:opacity-50 w-8 h-8 flex justify-center"
                                                @if ($book->status != 1) @disabled(true) @endif>
                                                <i class="fa-solid fa-clock-rotate-left"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex-2 px-8 pt-2">
                {{ $books->links() }}
            </div>
        </div>
    </div>
</x-layout>
