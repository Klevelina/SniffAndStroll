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
<body  class="bg-[#F6F3E8]">

    <nav class="sticky top-0 w-full  bg-[#2F4730] flex justify-between items-center  py-6 px-4 text-white"> 
        <h1 class="font-bold">
            Sniff and Stroll
        </h1>
        <div class = "flex gap-6 text-white" > 
            <a href="#">Home</a>
            <a href="#">How it works</a>
            <a href="#">About us</a>
            <a href="#">Contact</a>
        </div>  

        <div class = "flex gap-4">
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
    </nav>

    <section
        class="h-[650px] bg-cover bg-center"
        style="background-image: url('{{ asset('pictures/frontpage.jpg') }}');">
        <div class="absolute" > </div>
    </section>

    <section 
        class="relative top-[190px] bg-[#F6F3E8]">
        <div class=" max-w-8xl mx-auto flex gap-20 px-20">

        <!-- Text on left -->
        <div class="">
            <h2 class=" relative font-bold text-[52px] text-[#538338] top-[-100px]"
                style="font-family: 'Fraunces', sans-serif;"
                data-aos="fade-right">
                How does it work?
            </h2>

            <ol class="relative list-decimal pl-[25px] text-xl top-[-70px] space-y-5 text-[#2F4730] font-medium">
            <li> Browse trusted dog walkers in your area and find the perfect match for your pet</li>
            <li> Select a convenient date and time, then send a booking request in just a few clicks</li>
            <li> Track your dog's walk, receive updates, and know they're in safe hands</li>
        </ol>

        </div>  

        <!-- Image on right -->
        <img
            src="{{ asset('pictures/person.jpg') }}"
            alt="Person"
            class=" top-[-120px] w-[650px] h-[auto] rounded-xl"
            data-aos="fade-left">
        </div>
    </section>

    <section >
        <div>
            
        </div>
        <div></div>
        <div></div>

    </section>


   
    


</body>
</html>