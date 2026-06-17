<nav x-data="{ open: false }" class="bg-[#2F4730] shadow px-6 py-4">

    <div class="flex justify-between items-center">

        <!-- Home -->
        <div class="text-white font-bold">
            <a href="/">Home</a>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-6 text-white">
            <a href="{{ route('owner.dashboard') }}">Dashboard</a>
            <a href="{{ route('dogs.index') }}">Dogs</a>
            <a href="{{ route('walk-sessions.create') }}">Book Walk</a>

            @if(auth()->user()->role === 'owner')
                <a href="{{ route('walker.index') }}">Find Walkers</a>
            @endif

            @include('profile.partials.profile-dropdown')
        </div>

        <!-- Mobile Hamburger -->
        <button
            @click="open = !open"
            class="md:hidden text-white text-3xl"
        >
            ☰
        </button>

    </div>

    <!-- Mobile Menu -->
    <div
        x-show="open"
        x-cloak
        class="md:hidden flex flex-col gap-5 mt-6 text-white text-lg"
    >
        <a href="{{ route('owner.dashboard') }}">Dashboard</a>

        <a href="{{ route('dogs.index') }}">Dogs</a>

        <a href="{{ route('walk-sessions.create') }}">Book Walk</a>

        @if(auth()->user()->role === 'owner')
            <a href="{{ route('walker.index') }}">Find Walkers</a>
        @endif

        <a href="{{ route('profile.edit') }}">Profile</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                type="submit"
                class="text-left"
            >
                Log Out
            </button>
        </form>
    </div>

</nav>