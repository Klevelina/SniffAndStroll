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

    <!--Contact section-->
    <section class="w-full h-full flex flex-col lg:flex-row">
        <div class="w-full lg:w-2/5 lg:h-screen">
            <img
                src="{{ asset('pictures/contact.jpg') }}"
                alt="contact-page"
                class="w-full h-[400px] lg:h-full object-cover  ">
        </div>

        <div class="lg:w-3/5 w-full flex items-center justify-center">
            <form class="w-full max-w-xl space-y-6 mx-10 pb-10 lg:pb-0">

                <div class="text-center mt-4 text-[30px] lg:text-[50px]">
                <h2>Get in touch</h2></div>
                <div class="text-center text-[20px] lg:text-[30px] text-[#2F4730]">
                <h3> Have a question about our services? We'd love to hear from you.</h3>
                </div>

                <div>
                    <label class="block mb-2 font-semibold">
                        Name
                    </label>
                    <input
                        type="text"
                        class="w-full p-3 border rounded-lg">
                </div>

                <div>
                    <label class="block mb-2 font-semibold">
                        Email
                    </label>
                    <input
                        type="email"
                        class="w-full p-3 border rounded-lg">
                </div>

                <div>
                    <label class="block mb-2 font-semibold">
                        Subject
                    </label>
                    <input
                        type="text"
                        class="w-full p-3 border rounded-lg">
                </div>

                <div>
                    <label class="block mb-2 font-semibold">
                        Message
                    </label>
                    <textarea
                        rows="5"
                        class="w-full p-3 border rounded-lg"></textarea>
                </div>

                <button
                    type="submit"
                    class="block mx-auto bg-[#6B8E6E] text-white px-8 py-4 rounded-xl hover:bg-[#2F4730] transition">
                    Send Message
                </button>  
            
            </form>
        </div>
    </section>

    @include('profile.partials.footer')

</body>