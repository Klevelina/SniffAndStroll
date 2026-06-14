<div x-show="open" class="md:hidden bg-[#2F4730] px-4 pb-4 text-white">

    <a href="/" class="block py-2">Home</a>
    <a href="/#how-it-works" class="block py-2">How it works</a>
    <a href="/about" class="block py-2">About us</a>
    <a href="/contact" class="block py-2">Contact</a>

    <a href="{{ route('language.switch', 'en') }}" class="block py-2">EN</a>
    <a href="{{ route('language.switch', 'lv') }}" class="block py-2">LV</a>

    <hr class="my-2 border-white/20">

    @auth

        <div class="py-2">
            Logged in as {{ auth()->user()->name }}
        </div>

        @if(auth()->user()->role === 'owner')
            <a href="{{ route('owner.dashboard') }}" class="block py-2">
                Dashboard
            </a>
            <a href="{{ route('dogs.index') }}" class="block py-2">
                Dogs
            </a>
            <a href="{{ route('walk-sessions.create') }}" class="block py-2">
                Book Walk
            </a>
        @else
            <a href="{{ route('walker.dashboard') }}" class="block py-2">
                Dashboard
            </a>
            <a href="{{ route('availabilities.index') }}" class="block py-2">
                Availability
            </a>
        @endif

        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="block py-2">
            Logout
        </a>

        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
            @csrf
        </form>

    @else

        <a href="{{ route('login') }}" class="block py-2">Login</a>
        <a href="{{ route('register') }}" class="block py-2">Register</a>

    @endauth

</div>
