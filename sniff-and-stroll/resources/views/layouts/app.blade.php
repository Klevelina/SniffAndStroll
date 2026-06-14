<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>Sniff and Stroll</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

@include('partials.navbar')

<main class="p-6 bg-[#4A654A]">
    @yield('content')
</main>

</body>
</html>
