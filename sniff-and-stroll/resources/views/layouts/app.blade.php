<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>Sniff and Stroll</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

@include('partials.navbar')

<main class="max-w-1/2 px- bg-[#4A654A]">
    @yield('content')
</main>

</body>
</html>
