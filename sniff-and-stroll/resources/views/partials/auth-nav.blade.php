<div class="hidden md:flex gap-4 items-center">

    @auth

        {{-- ROLE NAVIGATION --}}
        @if(auth()->user()->role === 'owner')
            <a href="{{ route('owner.dashboard') }}" class="font-semibold">
                Dashboard
            </a>
            <a href="{{ route('dogs.index') }}">
                Dogs
            </a>
            <a href="{{ route('walk-sessions.create') }}">
                Book Walk
            </a>

        @elseif(auth()->user()->role === 'walker')
            <a href="{{ route('walker.dashboard') }}" class="font-semibold">
                Dashboard
            </a>
            <a href="{{ route('availabilities.index') }}">
                Availability
            </a>
        @endif

        {{-- PROFILE DROPDOWN --}}
        @include('profile.partials.profile-dropdown')

    @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endauth

</div>
