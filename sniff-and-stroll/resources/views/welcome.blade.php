
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

    <!--Navbar-->
    @include('profile.partials.navbar')

    <!--Background pciture-->
    <section>
        <!--Computer screen -->
        <img
        src="{{ asset('pictures/frontpage-computer.jpg') }}"
        alt="Front page"
        class=" hidden md:block  w-full h-[650px] object-cover lg"/>

        <!-- Phone screen-->
          <img
        src="{{ asset('pictures/frontpage-phone.jpg') }}"
        alt="Front page"
        class=" block md:hidden w-full h-auto object-cover lg"/>
    
        <div class="absolute" > </div>
    </section>

    <!--How does it work section-->
    <section
        class="mt-[100px]" 
        id="how-it-works">
        <div class=" max-w-8xl mx-auto flex flex-col lg:flex-row gap-20 px-20">

    
        <div class="mt-[20px    ]">
            <h2 class=" ls-pt-[100px]"
                data-aos="fade-right">
                How does it work?
            </h2>

            <ol class="list-decimal pl-[25px] text-xl pt-[40px] space-y-5 text-[#2F4730] font-medium"
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
            class=" pt-[120px] w-[650px] h-[auto] rounded-xl hidden md:block"
            data-aos="fade-left">
        </div>
    </section>

    <!-- Our top walkers heading -->
    <div class="flex justify-center pt-[110px]">
        <h2>
            Our top walkers:
        </h2>
    </div>

    <!-- Profiles with our top walkers -->
    <section class="flex justify-between items-center pt-[60px] gap-10 px-20 max-w-7xl mx-auto" >
        <div class=" bg-[#6B8E6E] w-[320px] h-[500px] rounded-xl ">
            <div class="bg-[#E8DFC8] w-[320px] h-[100px] rounded-t-xl"></div>
            <img
            src="{{ asset('pictures/person1.jpg') }}"
            class="z-1 w-[250px] h-[250px] rounded-full object-cover mx-auto -mt-[65px]">
            <h3 class="text-center text-[#E8DFC8] text-[20px] mt-2 ">
                Doreen Green
            </h3>
            <p class="text-center text-[#2F4730] font-semibold mt-2">"Enjoys Long walks with active dogs and outdoor adventures"</p>
            <button class="block px-4 py-2 mx-auto mt-[50px] bg-[#E8DFC8] rounded-full text-[#2F4730] hover:bg-[#C9A27E] transition duration-300] ">Book now</button>
        </div>

        <div class="bg-[#6B8E6E] w-[320px] h-[500px] rounded-xl">
            <div class=" bg-[#E8DFC8] w-[320px] h-[100px] rounded-t-xl"></div>
                <img
                    src="{{ asset('pictures/person2.jpg') }}"
                    class="z-1 w-[250px] h-[250px] rounded-full object-cover mx-auto -mt-[65px]">
                <h3 class="text-center text-[#E8DFC8] text-[20px] mt-2 ">
                    Peni Parker
                </h3>
                <p class="text-center text-[#2F4730] font-semibold mt-2  ">"Patient and caring walker for puppies and senior dogs"</p>
                <button class="block px-4 py-2 mx-auto mt-[50px] bg-[#E8DFC8] rounded-full text-#2F4730 hover:bg-[#C9A27E] transition duration-300] ">Book now</button>
        </div>

        <div class="bg-[#6B8E6E] w-[320px] h-[500px] rounded-xl">
            <div class=" bg-[#E8DFC8] w-[320px] h-[100px] rounded-t-xl"></div>
                <img
                    src="{{ asset('pictures/person3.jpg') }}"
                    class=" w-[250px] h-[250px] rounded-full object-cover mx-auto -mt-[65px]">
                <h3 class="text-center text-[#E8DFC8] text-[20px] mt-2">
                    Susan Richards
                </h3>
                <p class="text-center text-[#2F4730] font-semibold mt-2">"Experienced with all breeds, from tiny companions to large dogs"</p>
                
                <button class="block px-4 py-2 mx-auto mt-[50px] bg-[#E8DFC8] rounded-full text-[#2F4730] hover:bg-[#C9A27E] transition duration-300 ">Book now</button>

        </div>
    </section>

    <section class ="w-full">
        <div class=" w-full flex justify-center items-center mt-[150px]">
            <div class="w-1/2 h-[500px]">
                <img 
                    class="w-full h-full object-cover"
                    src="{{ asset('pictures/join_our_team.jpg') }}">
            </div>  

            <div class= "bg-[#E8DFC8] w-1/2 h-[500px]">
                <div>
                    <h2 class="text-center mt-[20px] text-[#6B8E6E]">
                        Join today
                    </h2>
                    <p class="text-center text-[24px] mx-10 text-[#2F4730] font-semibold mt-4   ">
                        Turn your love for dogs into flexible work.
                        Set your own schedule, meet amazing pets,
                        and earn money doing what you enjoy.
                    </p>

                    <button class="block px-[200px] py-4 mx-auto mt-[70px] bg-[#6B8E6E] rounded-xl text-[20px] text-white font-semibold hover:bg-[#2F4730] transition duration-300">
                        Become a walker
                    </button>
                
                </div>
            </div>
        </div>

    </section>

    <footer class="bg-[#2F4730] text-white py-6 text-center mt-20">
    <h3 class="font-bold text-lg">Sniff & Stroll</h3>
    <p class="mt-2">Making every walk a tail-wagging adventure.</p>
    <p class="mt-4 text-sm">© 2026 Sniff & Stroll</p>
</footer>


   
    


</body>
</html>