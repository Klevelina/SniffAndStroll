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
    <body class="font-sans text-gray-900 antialiased h-screen bg-[#F6F3E8]">
    <div class="min-h-screen flex flex-col items-center lg:pt-[100px] pt-6">
        
        <div class="mb-6">
            <a href="/">
                <img src="{{ asset('pictures/logo.png') }}" alt="Sniff & Stroll" class="w-40 object-contain">
            </a>
        </div>

        <div class="w-full flex-grow flex flex-col justify-center px-6 py-6 bg-[#2F4730] shadow-md lg:max-w-md lg:h-auto lg:flex-grow-0 lg:rounded-lg">
            <div class="w-full">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
