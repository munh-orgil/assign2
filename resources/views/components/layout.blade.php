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
                        primary: "#052432",
                        secondary: "#779556",
                        onHover: "#dedede",
                        neutral: "#f0f0f0",
                    },
                    fontFamily: {
                        'roboto': ['Roboto'],
                    }
                },
            },
        }
    </script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        @php
            $userId = auth()->check() ? auth()->user()->id : 0;
        @endphp

        Pusher.logToConsole = true;

        var pusher = new Pusher('11856c344a210392e6fe', {
            cluster: 'ap3'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind("Illuminate\\Notifications\\Events\\BroadcastNotificationCreated", function(data) {

            if (data.user_id == {{ $userId }}) {

                alert(`Таны ном ${data.comment}-н хугацааг сунгалаа!`)
            }
        });
    </script>
    <title>Номын сан</title>
</head>


<?php
if (auth()->user() != null) {
    $loggedIn = true;
    if (isset($_GET['selected_role'])) {
        $selectedRole = $_GET['selected_role'];
        setcookie('selected_role', $selectedRole);
    } elseif (isset($_COOKIE['selected_role'])) {
        $selectedRole = $_COOKIE['selected_role'];
    } else {
        $selectedRole = auth()->user()->role;
        setcookie('selected_role', $selectedRole);
    }
} else {
    $loggedIn = false;
    $selectedRole = 0;
}
?>

<body class="text-[#303030] font-roboto">
    <nav class="fixed flex justify-between items-center h-16 border-b-2 z-30 w-full bg-white">
        <a class="flex items-center font-bold" href="/"><img class="w-12 ml-6"
                src="{{ asset('assets/logo.png') }}" alt="" class="logo" />Номын сан</a>
        <ul class="flex space-x-6 mr-6 text-md items-center">
            @auth
                @if (auth()->user()->role > 0)
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
                    <li>
                        <form action="/" method="GET">
                            @csrf
                            <select name="selected_role" class="border-2 rounded-lg p-2" onchange="this.form.submit()">
                                @foreach ($options as $item)
                                    @if ($item['value'] <= auth()->user()->role)
                                        <option value="{{ $item['value'] }}"
                                            @if ($selectedRole == $item['value']) {
                                            @selected(true)
                                        } @endif>
                                            {{ $item['label'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </form>
                    </li>
                @endif
                <li class="flex items-center p-2">
                    <div class="flex gap-2 items-center">
                        <span class="font-bold">
                            {{ auth()->user()->first_name }}
                        </span>

                        <img class="hidden w-10 md:block rounded-full border-2 border-solid border-gray-300"
                            src="{{ auth()->user()->picture ? asset('storage/' . auth()->user()->picture) : asset('/assets/no-avatar.jpg') }}" />
                    </div>
                </li>
            @endauth
        </ul>
    </nav>

    <?php
    $sideBarItems = [[], [], []];
    $userId = '';
    if (auth()->user() != null) {
        $userId = auth()->user()->id;
    }
    array_push($sideBarItems[0], ['Нүүр', '/', 'house', true]);
    array_push($sideBarItems[0], ['Миний номнууд', '/my_books/' . $userId, 'book-open', $loggedIn]);
    array_push($sideBarItems[0], ['Тохиргоо', '/profile', 'gear', $loggedIn]);
    
    array_push($sideBarItems[1], ['Нүүр', '/', 'house', true]);
    array_push($sideBarItems[1], ['Захиалга', '/librarian', 'book', true]);
    array_push($sideBarItems[1], ['Тохиргоо', '/profile', 'gear', $loggedIn]);
    
    array_push($sideBarItems[2], ['Нүүр', '/', 'house', true]);
    array_push($sideBarItems[2], ['Хэрэглэгч', '/user', 'user', true]);
    array_push($sideBarItems[2], ['Ном', '/manager', 'book', true]);
    array_push($sideBarItems[2], ['Тохиргоо', '/profile', 'gear', $loggedIn]);
    ?>

    <aside id="default-sidebar"
        class="fixed top-16 left-0 z-40 w-56 h-screen transition-transform -translate-x-full sm:translate-x-0 border-r-2"
        aria-label="Sidebar">
        <div class="h-full px-2 py-4 overflow-y-auto bg-gray-50 light:bg-gray-800">
            <ul class="text-sm h-full flex flex-col gap-1">
                @foreach ($sideBarItems[$selectedRole] as $item)
                    @if ($item[3])
                        <li class="px-2 rounded-lg">
                            <a href="{{ $item[1] }}"
                                class="flex items-center p-3 hover:bg-onHover rounded-lg group">
                                <i class="fa-solid fa-{{ $item[2] }} pr-2"></i>
                                <span>
                                    {{ $item[0] }}
                                </span>
                            </a>
                        </li>
                    @endif
                @endforeach
                @auth
                    <li class="mt-auto mb-14 px-2">
                        <a href="/logout" class="flex justify-center p-2 rounded-lg hover:bg-onHover group">
                            <i class="fa-solid fa-arrow-right-from-bracket my-auto pr-2"></i>
                            <span>
                                Гарах
                            </span>
                        </a>
                    </li>
                @else
                    <li class="mt-auto mb-14">
                        <div class="flex">
                            <a href="/register" class="flex text-sm hover:bg-onHover group items-center p-2 rounded-lg">
                                <i class="fa-solid fa-user-plus pr-2"></i>
                                <span>
                                    Бүртгүүлэх
                                </span>
                            </a>
                            <a href="/login" class="flex text-sm hover:bg-onHover group items-center p-2 rounded-lg">
                                <i class="fa-solid fa-right-to-bracket pr-2"></i>
                                <span>
                                    Нэвтрэх
                                </span>
                            </a>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </aside>
    <main>
        <div {{ $attributes->merge(['class' => 'pt-4 absolute top-16 left-56 right-0 h-max bg-neutral']) }}>
            {{ $slot }}
        </div>
    </main>

    <x-success />
    <x-alert />
    <x-warning />
</body>

</html>
