<div x-data="{ open: false }" class="sticky top-0 z-50">

    <nav class="w-full bg-[#2F4730] flex items-center py-6 px-4 text-white">

        <!-- LEFT: Logo -->
        <div class="flex-1 flex items-center">
            <h1 class="font-bold">
                Sniff and Stroll
            </h1>
        </div>

        <!-- CENTER: public links -->
        <div class="hidden md:flex flex-1 justify-center gap-6">
            <a href="/">{{ __('messages.home') }}</a>
            <a href="/#how-it-works">{{ __('messages.how_it_works') }}</a>
            <a href="/about">{{ __('messages.about') }}</a>
            <a href="/contact">{{ __('messages.contact') }}</a>
        </div>

        <!-- RIGHT: auth -->
        <div class="hidden md:flex flex-1 justify-end gap-4 items-center">

            <!-- ALWAYS visible language -->
            <a href="{{ route('language.switch', 'en') }}">EN</a>
            <a href="{{ route('language.switch', 'lv') }}">LV</a>

            @auth
                @php
                    $user = auth()->user();

                    $dashboard = match($user->role) {
                        'owner' => route('owner.dashboard'),
                        'walker' => route('walker.dashboard'),
                        default => url('/'),
                    };
                @endphp

                <a href="{{ $dashboard }}">Dashboard</a>

                @include('profile.partials.profile-dropdown')
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth

        </div>

    </nav>

    <!-- MOBILE PANEL -->
    <div x-show="open" class="md:hidden bg-[#2F4730] px-4 pb-4 text-white">

        <a href="/" class="block py-2">Home</a>
        <a href="/#how-it-works" class="block py-2">How it works</a>
        <a href="/about" class="block py-2">About</a>
        <a href="/contact" class="block py-2">Contact</a>

        <a href="{{ route('language.switch', 'en') }}" class="block py-2">EN</a>
        <a href="{{ route('language.switch', 'lv') }}" class="block py-2">LV</a>

        <hr class="my-2 border-white/20">

        @auth
            @php
                $user = auth()->user();

                $dashboard = match($user->role) {
                    'owner' => route('owner.dashboard'),
                    'walker' => route('walker.dashboard'),
                    default => url('/'),
                };
            @endphp

            <a href="{{ $dashboard }}" class="block py-2">Dashboard</a>

            <div class="py-2">
                Logged in as {{ $user->name }}
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>

        @else
            <a href="{{ route('login') }}" class="block py-2">Login</a>
            <a href="{{ route('register') }}" class="block py-2">Register</a>
        @endauth

    </div>

</div>
