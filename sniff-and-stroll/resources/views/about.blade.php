<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;600;700&display=swap" rel="stylesheet">

    <title>Sniff & Stroll</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F6F3E8] scroll-smooth">

@include('partials.navbar')

<!--Background Image-->
<section class="relative w-full h-[350px] overflow-hidden">
    <img
        class="w-full h-full object-cover object-center"
        src="{{ asset('pictures/about-us-background.jpg') }}"
        alt="Dogs walking outdoors">

    <div class="absolute inset-0 bg-black/50"></div>

    <div class="absolute inset-0  text-[40px] flex items-center justify-center">
        <h2 class="text-[#F6F3E8]">
            {{ __('messages.about_us') }}
        </h2>
    </div>
</section>

<!-- About Sniff and Roll section-->
<section class="flex-col w-full lg:mt-[100px] lg:ml-[120px]">
    <div class="lg:text-left text-center mt-4 text-[30px] lg:text-[36px]">
        <h2>{{ __('messages.about_sniff_and_stroll') }}</h2>
    </div>

    <div class="mt-6 px-7 lg:px-0 text-[18px] lg:text-left lg:text-[20px] max-w-6xl text-[#2F4730] leading-relaxed">
        <p>
            {{ __('messages.about_description') }}
        </p>

    </div>
</section>

<!--Our mission section-->
<section class="flex-col lg:mt-[100px] lg:ml-[120px]">
    <div class="lg:text-left text-center mt-4 text-[30px] lg:text-[36px]">
        <h2>{{ __('messages.our_mission') }}</h2>
    </div>

    <div class=" mb-[60px] mt-6 px-7 lg:px-0 text-[18px] lg:text-[20px] max-w-6xl text-[#2F4730] leading-relaxed">
        <p>
            {{ __('messages.mission_description') }}
        </p>
    </div>
</section>

@include('profile.partials.footer')
</body>
