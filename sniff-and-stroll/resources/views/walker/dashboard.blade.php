<h1>Walker Dashboard</h1>

<p>
    Welcome,
    {{ auth()->user()->name }}
</p>

@forelse($walks as $walk)

    <div>

        <h3>{{ $walk->dog->name }}</h3>

        <p>
            Owner:
            {{ $walk->owner->name }}
        </p>

        <p>
            Date:
            {{ $walk->scheduled_at }}
        </p>

        <p>
            Duration:
            {{ $walk->duration_minutes }} minutes
        </p>

        <p>Status: {{ ucfirst($walk->status) }}</p>

        @if($walk->status === 'pending')

            <form
                method="POST"
                action="{{ route('walk-sessions.accept', $walk) }}">

                @csrf
                @method('PATCH')

                <button type="submit">
                    Accept Walk
                </button>

            </form>

            <form
                method="POST"
                action="{{ route('walk-sessions.decline', $walk) }}">

                @csrf
                @method('PATCH')

                <button type="submit">
                    Decline Walk
                </button>

            </form>

        @endif

        @if($walk->status === 'accepted')

            <form method="POST"
                  action="{{ route('walk-sessions.start', $walk) }}">
                @csrf
                @method('PATCH')

                <button type="submit">
                    Start Walk
                </button>
            </form>

        @endif

        @if($walk->status === 'active')

            <form method="POST"
                  action="{{ route('walk-sessions.complete', $walk) }}">
                @csrf
                @method('PATCH')

                <button type="submit">
                    Complete Walk
                </button>
            </form>

        @endif

    </div>

    <hr>

@empty

    <p>No assigned walks.</p>

@endforelse
