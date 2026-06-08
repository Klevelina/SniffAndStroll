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

    <!--Navbar-->
    <nav class="sticky z-50 top-0 w-full  bg-[#2F4730] flex justify-between items-center py-6 px-4 text-white"> 
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

    <!--Background pciture-->
    <section
        class="h-[650px] bg-cover bg-center"
        style="background-image: url('{{ asset('pictures/frontpage.jpg') }}');">
        <div class="absolute" > </div>
    </section>

    <!--How does it work section-->
    <section 
        class=" bg-[#F6F3E8]">
        <div class=" max-w-8xl mx-auto flex gap-20 px-20">

    
        <div class="">
            <h2 class="font-bold text-[52px] text-[#538338] pt-[100px]"
                style="font-family: 'Fraunces', sans-serif;"
                data-aos="fade-right">
                How does it work?
            </h2>

            <ol class="list-decimal pl-[25px] text-xl pt-[70px] space-y-5 text-[#2F4730] font-medium"
                data-aos="fade-right">
            <li> Browse trusted dog walkers in your area and find the perfect match for your pet</li>
            <li> Select a convenient date and time, then send a booking request in just a few clicks</li>
            <li> Track your dog's walk, receive updates, and know they're in safe hands</li>
        </ol>

        </div>  

        <!-- Image on right -->
        <img
            src="{{ asset('pictures/person.jpg') }}"
            alt="Person"
            class=" pt-[120px] w-[650px] h-[auto] rounded-xl"
            data-aos="fade-left">
        </div>
    </section>

    <!-- Our top walkers heading -->
    <div class="flex justify-center pt-[110px] font-bold text-[52px] text-[#538338]" 
        style="font-family: 'Fraunces', sans-serif;">
        <h1>
            Our top walkers:
        </h1>
    </div>

    <!-- Profiles with our top walkers -->
    <section class="flex justify-between items-center pt-[90px] gap-10 px-20 max-w-7xl mx-auto" >
        <div class=" bg-[#6B8E6E] w-[320px] h-[500px] rounded-xl ">
            <div class="bg-[#E8DFC8] w-[320px] h-[100px] rounded-t-xl"></div>
            <img
            src="{{ asset('pictures/person1.jpg') }}"
            class="z-1 w-[250px] h-[250px] rounded-full object-cover mx-auto -mt-[65px]">
            <h2 class="text-center text-[#E8DFC8] text-[20px] mt-2 ">
                Doreen Green
            </h2>
            <p class="text-center text-[#2F4730] font-semibold mt-2">"Enjoys Long walks with active dogs and outdoor adventures"</p>
            <button class="block px-4 py-2 mx-auto mt-[50px] bg-[#E8DFC8] rounded-full text-#2F4730 hover:bg-[#C9A27E] transition duration-300 ] ">Book now</button>
        </div>

        <div class="bg-[#6B8E6E] w-[320px] h-[500px] rounded-xl">
            <div class=" bg-[#E8DFC8] w-[320px] h-[100px] rounded-t-xl"></div>
                <img
                    src="{{ asset('pictures/person2.jpg') }}"
                    class="z-1 w-[250px] h-[250px] rounded-full object-cover mx-auto -mt-[65px]">
                <h2 class="text-center text-[#E8DFC8] text-[20px] mt-2 ">
                    Peni Parker
                </h2>
                <p class="text-center text-[#2F4730] font-semibold mt-2  ">"Patient and caring walker for puppies and senior dogs"</p>
                <button class="block px-4 py-2 mx-auto mt-[50px] bg-[#E8DFC8] rounded-full text-#2F4730 hover:bg-[#C9A27E] transition duration-300 ] ">Book now</button>
        </div>

        <div class="bg-[#6B8E6E] w-[320px] h-[500px] rounded-xl">
            <div class=" bg-[#E8DFC8] w-[320px] h-[100px] rounded-t-xl"></div>
                <img
                    src="{{ asset('pictures/person3.jpg') }}"
                    class=" w-[250px] h-[250px] rounded-full object-cover mx-auto -mt-[65px]">
                <h2 class="text-center text-[#E8DFC8] text-[20px] mt-2">
                    Susan Richards
                </h2>
                <p class="text-center text-[#2F4730] font-semibold mt-2">"Experienced with all breeds, from tiny companions to large dogs"</p>
                
                <button class="block px-4 py-2 mx-auto mt-[50px] bg-[#E8DFC8] rounded-full text-[#2F4730] hover:bg-[#C9A27E] transition duration-300 ">Book now</button>

        </div>

    </section>


   
    


</body>
</html>