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

        <section class="relative w-full h-[350px] overflow-hidden">

            <div class="relative h-full">
                <img
                    class="w-full h-full object-cover object-center"
                    src="{{ asset('pictures/about-us-background.jpg') }}"
                    alt="about-us-background"> 
                <div class="absolute inset-0 bg-black/50"></div>

                <div class="absolute inset-0 flex items-center justify-center">
                    <h2 class="text-[#F6F3E8]">
                        About us
                    </h2>

                </div>
            
            </div>
            


        </section>
    

       
       

        
        
</body>

    

            <!-- style="background-image: url('{{ asset('pictures/about-us-background.jpg') }}');"> 
