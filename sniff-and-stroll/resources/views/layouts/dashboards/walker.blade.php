<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Walker Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

@include('partials.dashboards.walker-navbar')

<main class="p-6">
    @yield('content')
</main>

</body>
</html>
