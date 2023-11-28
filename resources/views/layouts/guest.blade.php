<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-h-screen flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <img class="w-32" src="{{ asset('assets/logo.png') }}" alt="" class="logo" />
            </a>
        </div>

        <div class="w-full sm:max-w-md px-6 pb-4 bg-white border shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    <x-success />
    <x-alert />
    <x-warning />
</body>

</html>
