<h1>Owner Dashboard</h1>

<p>Welcome {{ auth()->user()->name }}</p>

<ul>

    <li>
        <a href="{{ route('dogs.index') }}">
            My Dogs
        </a>
    </li>


    <li>
        <a href="{{ route('walk-sessions.create') }}">
            Book Walk
        </a>
    </li>

</ul>

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <button type="submit">
        Logout
    </button>
</form>

@forelse($walks as $walk)

    <div>

        <h3>{{ $walk->dog->name }}</h3>

        <p>
            Walker:
            {{ $walk->walker->name }}
        </p>

        <p>
            Date:
            {{ $walk->scheduled_at }}
        </p>

        <p>
            Status:
            {{ $walk->status }}
        </p>

    </div>

    <hr>

@empty

    <p>No walks booked.</p>

@endforelse
