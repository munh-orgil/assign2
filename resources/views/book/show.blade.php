<x-layout>
    <div class="mx-4">
        <x-card class="p-10 bg-white">
            <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="flex">
                <img class="hidden w-48 h-full mr-12 md:block rounded-lg"
                    src="{{ $book->picture ? asset('storage/' . $book->picture) : asset('/assets/no-picture.png') }}" />
                {{-- <div class="flow">
                    <div class="flex-1">
                        <button class="bg-secondary rounded-lg px-4 py-2 mr-40" style="float: right">Захиалах</button>
                        <h3 class="text-2xl mb-2 w-max-fit">
                            {{ $book->title }}
                        </h3>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-3xl font-bold mb-4">Book Description</h3>
                        <div class="text-lg space-y-6">
                            {{ $book->description }}
                        </div>
                    </div>
                </div> --}}
                <div class="grid grid-cols-3 gap-4 w-full divide-y-2">
                    <div class="col-span-2">
                        <h1 class="text-3xl mb-2">
                            {{ $book->title }}
                        </h1>
                    </div>

                    <div class="col-span-2 pt-8 pr-8">
                        <h3 class="text-3xl font-bold mb-4">Book Description</h3>
                        <div class="text-lg space-y-6">
                            {{ $book->description }}
                        </div>
                    </div>
                    <div class="mt-16">
                        <table class="border-separate border-spacing-2">
                            <tr>
                                <td>
                                    Зохиолч:
                                </td>
                                <td class="font-bold">
                                    {{ $book->author }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Хэвлэгдсэн огноо:
                                </td>
                                <td class="font-bold">
                                    {{ $book->published_date }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Хуудасны тоо:
                                </td>
                                <td class="font-bold">
                                    {{ $book->page_count }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Үлдэгдэл:
                                </td>
                                <td class="font-bold">
                                    @if ($book->page_count > 0)
                                        байна
                                    @else
                                        дууссан
                                    @endif
                                </td>
                            </tr>

                        </table>
                        {{-- <ul>
                            <li>
                                Зохиолч: <div class="font-bold"> {{ $book->author }} </div>
                            </li>
                            <li>
                                Зохиолч: <div class="font-bold"> {{ $book->author }} </div>
                            </li>
                            <li>
                                Зохиолч: <div class="font-bold"> {{ $book->author }} </div>
                            </li>
                            <li>
                                Зохиолч: <div class="font-bold"> {{ $book->author }} </div>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </x-card>
    </div>
</x-layout>
