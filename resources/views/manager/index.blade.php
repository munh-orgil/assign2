<x-layout class="min-h-full">
    <div class="flex px-4 pb-2">
        <div>
            <form action="/manager" class="flex-1 min-w-fit">
                <div class="relative border border-gray-300 rounded-lg items-center w-[550px]">
                    <div class="absolute top-2 left-2">
                        <i class="fa fa-search text-primary z-20"></i>
                    </div>
                    <input type="text" name="book"
                        class="h-10 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none text-sm"
                        value="@isset($_GET['book']){{ $_GET['book'] }}@endisset"
                        placeholder="Номын нэр, зохиолч" />
                    <div class="absolute top-1 right-1">
                        <button type="submit" class="h-8 w-20 text-white rounded-lg bg-primary hover:bg-slate-700">
                            Хайх
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="ml-auto">
            <ul>
                <li class="mt-auto mb-14 px-2 w-60 ">
                    <a href="/manager/create"
                        class="flex justify-center p-2 rounded-lg bg-primary text-white hover:bg-slate-700 group">
                        <i class="fa-solid fa-plus my-auto pr-2"></i>
                        <span>
                            Ном нэмэх
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="antialiased text-gray-600 h-full px-4">
        <div class="flex flex-col justify-start h-full">
            <div class="w-full max-w-8xl mx-auto bg-white rounded-lg border h-full p-4">
                <table class="p-3 table-auto w-full">
                    <div>
                        <tr class="text-xs uppercase text-slate-500">
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Номын нэр</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Зохиолч</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Хэвлэгдсэн огноо</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Үлдэгдэл</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Нээсэн огноо</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Шинэчилсэн огноо</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Засах</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Устгах</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dropdownItems = ['Хэрэглэгч', 'Номын санч', 'Менежер'];
                            ?>
                            @foreach ($books as $book)
                                <tr class="border-t">
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm text-gray-800">{{ $book->title }}</div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left text-sm">{{ $book->author }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left text-sm">{{ $book->published_date }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left text-sm">{{ $book->remaining_count }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left text-sm">{{ $book->created_at }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left text-sm">{{ $book->updated_at }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-lg text-center">
                                            <button
                                                onclick="document.location.href='/manager/edit/' + {{ $book->id }}"
                                                class="relative align-middle select-none font-sans text-sm text-white bg-yellow-400 border border-1 rounded-lg text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[40px] h-8 max-h-[40px] hover:opacity-60 active:bg-gray-900/20"
                                                type="button">
                                                <span
                                                    class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-lg text-center">
                                            <form method="POST" action="/manager/delete/{{ $book->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="relative align-middle select-none font-sans text-sm text-white bg-red-500 border border-1 rounded-lg text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[40px] h-8 max-h-[40px] hover:opacity-60 active:bg-gray-900/20"
                                                    type="submit">
                                                    <span
                                                        class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
            <div class="flex pt-2">
                <div class="ml-auto">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
