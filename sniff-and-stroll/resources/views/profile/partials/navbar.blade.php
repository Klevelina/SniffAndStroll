<div x-data="{ open: false }" class="sticky top-0 z-50">

    <nav class="w-full bg-[#2F4730] flex justify-between items-center py-6 px-4 text-white">

        <h1 class="font-bold">
            Sniff and Stroll
        </h1>

        <!-- Desktop links -->
        <div class="hidden md:flex gap-6">
            <a href="/">Home</a>
            <a href="#how-it-works">How it works</a>
            <a href="/about">About us</a>
            <a href="/contact">Contact</a>
        </div>

        <!-- Desktop login/register -->
        <div class="hidden md:flex gap-4">
            @if(auth()->check())
                <div>
                    Logged in as {{ auth()->user()->name }}
                </div>

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display:none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endif
        </div>

        <!-- Phone hamburger -->
        <button class="md:hidden text-3xl" @click="open = !open">
            ☰
        </button>

    </nav>

    <!-- Phone menu -->
    <div x-show="open" class="md:hidden bg-[#2F4730] px-4 pb-4 text-white">
        <a href="/" class="block py-2">Home</a>
        <a href="#how-it-works" class="block py-2">How it works</a>
        <a href="/about" class="block py-2">About us</a>
        <a href="/contact" class="block py-2">Contact</a>

        <hr class="my-2 border-white/20">

        <!-- Login status checking for mobile -->
        @if(auth()->check())
            <div>
                Logged in as {{ auth()->user()->name }}
            </div>

            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display:none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endif
    </div>

</div>
