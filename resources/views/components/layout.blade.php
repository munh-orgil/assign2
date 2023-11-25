<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="assets/favicon.ico" />
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
                        secondary: "#84938E",
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

<body class="text-[#303030]">
    <nav class="flex justify-between items-center h-20 border-b">
        <a href="/"><img class="w-20 ml-6" src="{{ asset('assets/logo.png') }}" alt="" class="logo" />
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                    <li>
                        <span class="font-bold">
                            Сайн байна уу {{ auth()->user()->first_name }}?
                        </span>
                    </li>
                    <li>
                        <a href="/listings/manage" class="hover:text-primary"><i class="fa fa-gear"></i> Ном засах </a>
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

    <main class="bg-neutral pt-4">
        {{ $slot }}
    </main>

    <x-message />
</body>

</html>
