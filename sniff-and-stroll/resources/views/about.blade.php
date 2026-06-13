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
    
        @include('profile.partials.navbar')

        <!--Background Image-->
        <section class="relative w-full h-[350px] overflow-hidden">
            <img
                class="w-full h-full object-cover object-center"
                src="{{ asset('pictures/about-us-background.jpg') }}"
                alt="Dogs walking outdoors"> 

            <div class="absolute inset-0 bg-black/50"></div>

            <div class="absolute inset-0  text-[40px] flex items-center justify-center">
                <h2 class="text-[#F6F3E8]">
                    About us
                </h2>
            </div>
        </section>

        <!-- About Sniff and Roll section-->
        <section class="flex-col w-full lg:mt-[100px] lg:ml-[120px]">
            <div class ="lg:text-left text-center mt-4 text-[30px] lg:text-[36px]">
                <h2>About Sniff and Roll</h2>
            </div>

            <div class="mt-6 px-7 lg:px-0 text-[18px] lg:text-left lg:text-[20px] max-w-6xl text-[#2F4730] leading-relaxed">
                <p>
                    Sniff & Stroll is a platform designed to connect dog owners with trusted local dog walkers. We understand that busy schedules can make it difficult to give pets the time and exercise they need every day.
                    Our goal is to make finding a reliable dog walker simple and convenient. Through our platform, owners can browse available walkers, learn more about them, and choose the best match for their dog's needs.
                    Whether it's a quick walk around the neighborhood or a longer outdoor adventure, Sniff & Stroll helps ensure that every dog receives the care, attention, and exercise they deserve.    
                </p>

            </div>
        </section>

        <!--Our mission section-->
        <section class="flex-col lg:mt-[100px] lg:ml-[120px]">
            <div class ="lg:text-left text-center mt-4 text-[30px] lg:text-[36px]">
                <h2>Our mission</h2>
            </div>

            <div class="mt-6 px-7 lg:px-0 text-[18px] lg:text-[20px] max-w-6xl text-[#2F4730] leading-relaxed">
                <p>
                    To create a trusted community where dogs receive the care they deserve and owners can confidently find support whenever they need it.
                </p>
            </div>
        </section>

        @include('profile.partials.footer')
</body>
