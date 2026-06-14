<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Owner Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F6F3E8]">

@include('partials.dashboards.owner-navbar')

<main class="p-6">
    @yield('content')
</main>

</body>
</html>
