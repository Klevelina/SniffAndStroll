<nav class="bg-[#2F4730] shadow px-6 py-4 flex justify-between items-center">

    <div class="text-white font-bold">
        <a href="/">Home</a>
    </div>

    <div class=" text-white flex gap-6 items-center">

        <a href="{{ route('owner.dashboard') }}">Dashboard</a>
        <a href="{{ route('dogs.index') }}">Dogs</a>
        <a href="{{ route('walk-sessions.create') }}">Book Walk</a>

        @if(auth()->user()->role === 'owner')
            <a href="{{ route('walker.index') }}" class="text-sm">
                Find Walkers
            </a>
        @endif

        @include('profile.partials.profile-dropdown')
    </div>

</nav>
