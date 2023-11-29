<x-layout>
    <div class="flex-2 px-8 pb-2">
        {{ $bookResults->links() }}
    </div>
    <div class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
        <div class="flex flex-col justify-center h-full">
            <div class="w-full max-w-8xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h2 class="font-semibold text-gray-800">Customers</h2>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Номны ID</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Номны нэр</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Нэр</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Утасны дугаар</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Дуусах хугацаа</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Статус</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Сунгах</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $result)
                                    <tr class="hover:bg-gray-100">
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="font-medium text-gray-800">{{ $result->book->id }}</div>
                                            </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">{{ $result->book->title }}</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium">{{ $result->user->first_name }}
                                                {{ $result->user->last_name }}</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium">{{ $result->user->phone_no }}</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium">{{ $result->expire_at }}</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <select
                                                class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-gray-200 text-slate-900 py-1 px-2 text-xs rounded-md"
                                                style="opacity: 1;">
                                                <option
                                                    class="relative grid items-center font-sans font-bold uppercase bg-slate-500 whitespace-nowrap select-none py-1 px-2 text-xs rounded-md"
                                                    style="opacity: 1;" id="">Аваагүй</option>
                                                <option
                                                    class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none py-1 px-2 text-xs rounded-md"
                                                    style="opacity: 1;">Хүлээж авсан</option>
                                                <option
                                                    class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none py-1 px-2 text-xs rounded-md"
                                                    style="opacity: 1;">Буцааж өгсөн</option>
                                                <option
                                                    class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none py-1 px-2 text-xs rounded-md"
                                                    style="opacity: 1;">Хоцорсон</option>
                                            </select>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">
                                                <button
                                                    class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-gray-900 hover:bg-gray-900/10 active:bg-gray-900/20"
                                                    type="button">
                                                    <span
                                                        class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                                        <i class="fa-solid fa-clock-rotate-left"></i>
                                                    </span>
                                                </button>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
