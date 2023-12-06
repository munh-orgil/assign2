<x-layout class="min-h-full">
    <div class="mx-4">
        <x-card class="p-10 bg-white">
            <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="flex">
                {{-- @dd($book->picture) --}}
                <img class="hidden w-48 h-full mr-12 md:block rounded-lg object-cover"
                    src="{{ $book->picture ? asset('storage/' . $book->picture) : asset('/assets/no-picture.png') }}" />
                <div class="flex divide-x-2">
                    <div class="flex-1">
                        <p class="text-2xl mb-4 w-max-fit font-bold">
                            {{ $book->title }}
                        </p>
                        <hr>
                        <div class="pt-8 pr-8 w-[600px]">
                            <p class="text-xl font-bold mb-1 pb-2">Номын тайлбар</p>
                            <div class="text-md space-y-6">
                                {{ $book->description }}
                            </div>
                        </div>
                    </div>
                    <div class="flex-2">
                        <div class="pl-8">
                            <form action="/order/{{ $book->id }}" method="POST">
                                @csrf
                                <input type="submit" value="Захиалах"
                                    class="bg-slate-800 rounded-lg px-4 py-2 text-white disabled:bg-slate-700 cursor-pointer" />
                            </form>
                        </div>
                        <table class="border-separate border-spacing-2 mt-8 ml-2">
                            <tr>
                                <td>
                                    <i class="fa-solid fa-pen-nib pr-2"></i> Зохиолч:
                                </td>
                                <td class="font-bold">
                                    {{ $book->author }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa-regular fa-calendar pr-2"></i> Хэвлэгдсэн огноо:
                                </td>
                                <td class="font-bold">
                                    {{ $book->published_date }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa-regular fa-file pr-2"></i> Хуудасны тоо:
                                </td>
                                <td class="font-bold">
                                    {{ $book->page_count }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa-solid fa-check pr-2" style="color: green;"></i> Үлдэгдэл:
                                </td>
                                <td class="font-bold">
                                    @if ($book->remaining_count > 0)
                                        <span style="color: green">Байгаа</span>
                                    @else
                                        <span style="color:red">Дууссан</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </x-card>
    </div>
</x-layout>
