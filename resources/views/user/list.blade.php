<x-layout class="min-h-full">
    <div class="flex px-4 pb-2">
        <div class="">
            <form action="/manager/user" class="flex-1 min-w-fit">
                <div class="relative border border-gray-300 rounded-lg items-center w-[550px]">
                    <div class="absolute top-2 left-2">
                        <i class="fa fa-search text-primary z-20"></i>
                    </div>
                    <input type="text" name="user"
                        class="h-10 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none text-sm"
                        value="@isset($_GET['user']){{ $_GET['user'] }}@endisset"
                        placeholder="Хэрэглэгчийн и-мэйл, утасны дугаар, регистерийн дугаар" />
                    <div class="absolute top-1 right-1">
                        <button type="submit" class="h-8 w-20 text-white rounded-lg bg-primary hover:bg-slate-700">
                            Хайх
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="ml-auto my-auto">
            {{ $users->links() }}
        </div>
    </div>
    <div class="antialiased text-gray-600 h-full px-4">
        <div class="flex flex-col justify-start h-full">
            <div class="w-full max-w-8xl mx-auto bg-white rounded-lg border h-full p-4">
                <table class="p-3 table-auto w-full">
                    <div>
                        <tr class="text-xs uppercase text-slate-500">
                            <th class="p-1 whitespace-nowrap">
                                <div class="font-semibold text-left">Хэрэглэгчийн эрх</div>
                            </th>
                            <th class="p-1 whitespace-nowrap">
                                <div class="font-semibold text-left">И-Мэйл</div>
                            </th>
                            <th class="p-1 whitespace-nowrap">
                                <div class="font-semibold text-left">Регистерийн дугаар</div>
                            </th>
                            <th class="p-1 whitespace-nowrap">
                                <div class="font-semibold text-left">Овог</div>
                            </th>
                            <th class="p-1 whitespace-nowrap">
                                <div class="font-semibold text-left">Нэр</div>
                            </th>
                            <th class="p-1 whitespace-nowrap">
                                <div class="font-semibold text-left">Гэрийн хаяг</div>
                            </th>
                            <th class="p-1 whitespace-nowrap">
                                <div class="font-semibold text-left">Утасны дугаар</div>
                            </th>
                            <th class="p-1 whitespace-nowrap">
                                <div class="font-semibold text-left">Үлдэгдэл</div>
                            </th>
                            <th class="p-1 whitespace-nowrap">
                                <div class="font-semibold text-left">И-Мэйл баталгаажуулсан
                                    огноо</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dropdownItems = ['Хэрэглэгч', 'Номын санч', 'Менежер'];
                            ?>
                            @foreach ($users as $user)
                                <tr class="border-t">
                                    <td class="p-1 whitespace-nowrap">
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button
                                                    class="flex pl-3 pr-1 py-2 border-2 leading-4 text-sm rounded-md focus:outline-none transition ease-in-out duration-150 w-32 line-clamp-1">
                                                    <div>{{ $dropdownItems[$user->role] }}</div>
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
                                                <form method="POST" action="/manager/user">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" name="id" value="{{ $user->id }}" />
                                                    @for ($i = 0; $i < count($dropdownItems); $i++)
                                                        <button type="submit" value="{{ $i }}"
                                                            name="role"
                                                            class="block p-2 hover:bg-slate-200 group w-full text-start text-sm">
                                                            {{ $dropdownItems[$i] }}
                                                        </button>
                                                    @endfor
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left text-sm">{{ $user->email }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left text-sm">{{ $user->reg_no }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left text-sm">{{ $user->last_name }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left text-sm">{{ $user->first_name }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left text-sm">{{ $user->address }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left text-sm">{{ $user->phone_no }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left text-sm">{{ $user->balance }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left text-sm">{{ $user->email_verified_at }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
            <div class="flex pt-2">
                <div class="ml-auto">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
