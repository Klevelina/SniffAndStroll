<nav class="bg-white shadow px-6 py-4 flex justify-between items-center">

    <div class="font-bold">
        <a href="/">Home</a>
    </div>

    <div class="flex gap-6 items-center">

        <a href="{{ route('owner.dashboard') }}">Dashboard</a>
        <a href="{{ route('dogs.index') }}">Dogs</a>
        <a href="{{ route('walk-sessions.create') }}">Book Walk</a>

        @include('profile.partials.profile-dropdown')
    </div>

</nav>
