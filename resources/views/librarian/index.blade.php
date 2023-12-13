<x-layout>
    <div class="flex px-4 pb-2">
        <div>
            <form action="/librarian" class="flex-1 min-w-fit">
                <div class="relative border border-gray-300 rounded-lg items-center w-[450px]">
                    <div class="absolute top-2 left-2">
                        <i class="fa fa-search text-primary z-20"></i>
                    </div>
                    <input type="text" name="book"
                        class="h-10 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none text-sm"
                        value="@isset($_GET['book']){{ $_GET['book'] }}@endisset"
                        placeholder="Номын нэр, дугаар" />
                    <div class="absolute top-1 right-1">
                        <button type="submit" class="h-8 w-20 text-white rounded-lg bg-primary hover:bg-slate-700">
                            Хайх
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="ml-2">
            <form action="/librarian" class="flex-1 min-w-fit">
                <div class="relative border border-gray-300 rounded-lg items-center w-[450px]">
                    <div class="absolute top-2 left-2">
                        <i class="fa fa-search text-primary z-20"></i>
                    </div>
                    <input type="text" name="user"
                        class="h-10 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none text-sm"
                        value="@isset($_GET['user']){{ $_GET['user'] }}@endisset"
                        placeholder="Хэрэглэгчийн регистерийн дугаар, и-мэйл" />
                    <div class="absolute top-1 right-1">
                        <button type="submit" class="h-8 w-20 text-white rounded-lg bg-primary hover:bg-slate-700">
                            Хайх
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="ml-auto my-auto">
            {{ $books->links() }}
        </div>
    </div>
    <div class="antialiased text-gray-600 h-screen px-4">
        <div class="flex flex-col justify-start h-full">

            <div class="w-full max-w-8xl mx-auto bg-white rounded-lg border p-4">
                <table class="p-3 table-auto w-full">
                    <thead class="text-xs font-semibold uppercase text-slate-500">
                        <tr>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Номын дугаар</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Номын нэр</div>
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
                        <?php
                        $dropdownItems = [['name' => 'Аваагүй', 'color' => 'gray-500'], ['name' => 'Хүлээж авсан', 'color' => 'blue-400'], ['name' => 'Сунгасан', 'color' => 'yellow-500'], ['name' => 'Буцааж өгсөн', 'color' => 'green-600'], ['name' => 'Хугацаа хэтэрсэн', 'color' => 'red-400']];
                        $allowed = [0 => [1], 1 => [3], 2 => [3], 3 => [], 4 => [3]];
                        ?>
                        @foreach ($books as $book)
                            <?php
                            if ($book->status == 1 && date('Y-m-d H:m:s') > $book->expire_at) {
                                $book->status = 4;
                            }
                            ?>

                            <tr class="border-t">
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm text-gray-800 pl-8">{{ $book->book->id }}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left text-sm">{{ $book->book->title }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left text-sm">
                                        {{ mb_substr($book->user->last_name, 0, 1, 'utf-8') }}.
                                        {{ $book->user->first_name }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left text-sm">{{ $book->user->email }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left text-sm">{{ $book->expire_at }}</div>
                                </td>

                                <td class="p-2 whitespace-nowrap">
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button
                                                class="flex px-3 py-2 border-2 leading-4 text-sm rounded-md text-{{ $dropdownItems[$book->status]['color'] }} focus:outline-none transition ease-in-out duration-150 w-44 line-clamp-1"
                                                @if ($book->status == 3) @disabled(true) @endif>
                                                <div>{{ $dropdownItems[$book->status]['name'] }}</div>
                                                <div class="ml-auto fill-slate-600">
                                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg"
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
                                                @for ($i = 0; $i < count($allowed[$book->status]); $i++)
                                                    <?php
                                                    $item = $allowed[$book->status][$i];
                                                    ?>
                                                    <button type="submit" value="{{ $item }}" name="status"
                                                        class="block p-2 hover:bg-slate-200 group w-full text-{{ $dropdownItems[$item]['color'] }} text-start text-sm">
                                                        {{ $dropdownItems[$item]['name'] }}
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
            <div class="flex px-8 pt-2">
                <div class="ml-auto">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
