<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/assets/favicon.ico" />
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#312E2D",
                        secondary: "#dedede",
                        neutral: "#F8F4EF",
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Roboto';
        }
    </style>
    <title>Bookstore</title>
</head>


@auth
    {{ $loggedIn = true }}
@else
    {{ $loggedIn = false }}
@endauth

<body class="text-[#303030]">
    <nav class="fixed flex justify-between items-center h-20 border-b z-30 w-full bg-white">
        <a href="/"><img class="w-20 ml-6" src="{{ asset('assets/logo.png') }}" alt=""
                class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <li>
                    <span class="font-bold">
                        Сайн байна уу {{ auth()->user()->first_name }}?
                    </span>
                </li>

                <li>
                    <?php
                    $options = [
                        [
                            'value' => (string) 2,
                            'label' => (string) 'Менежер',
                        ],
                        [
                            'value' => (string) 1,
                            'label' => (string) 'Номын санч',
                        ],
                        [
                            'value' => (string) 0,
                            'label' => (string) 'Хэрэглэгч',
                        ],
                    ];
                    ?>
                    <form action="" method="POST">
                        @csrf
                        <select name="dropdown" id="dropdown" class="border-2 rounded-lg p-2">
                            @foreach ($options as $item)
                                @if ($item['value'] <= auth()->user()->role)
                                    <option value="{{ $item['value'] }}">{{ $item['label'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </form>
                </li>

                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa fa-door-closed"></i> Гарах
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="/register" class="hover:text-secondary"><i class="fa fa-user-plus"></i> Бүртгүүлэх </a>
                </li>
                <li>
                    <a href="/login" class="hover:text-secondary"><i class="fa fa-arrow-right-to-bracket"></i>
                        Нэвтрэх</a>
                </li>
            @endauth
        </ul>
    </nav>

    <?php
    $sideBarItems = [];
    array_push($sideBarItems, ['Нүүр', 'book', 'house', true]);
    array_push($sideBarItems, ['Хайх', 'search', 'magnifying-glass', true]);
    array_push($sideBarItems, ['Миний номнууд', 'book/user', 'list-check', $loggedIn]);
    array_push($sideBarItems, ['Тохиргоо', 'user/edit', 'gear', $loggedIn]);
    ?>

    <aside id="default-sidebar"
        class="fixed top-20 left-0 z-40 w-56 h-screen transition-transform -translate-x-full sm:translate-x-0 border-r"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 light:bg-gray-800">
            <ul class="space-y-2 font-medium">
                @foreach ($sideBarItems as $item)
                    @if ($item[3])
                        <li>
                            <a href="{{ $item[1] }}"
                                class="flex items-center p-2 rounded-lg hover:bg-secondary group">
                                <i class="fa-solid fa-{{ $item[2] }} pr-2"></i>
                                <span>
                                    {{ $item[0] }}
                                </span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </aside>
    <main>
        <div {{ $attributes->merge(['class' => 'pt-4 absolute top-20 left-56 right-0 bottom-0 bg-neutral']) }}>
            {{ $slot }}
        </div>
    </main>

    <x-message />
</body>

</html>
