<h1>Walker Dashboard</h1>

<p>
    Welcome,
    {{ auth()->user()->name }}
</p>

<p>
    Role:
    {{ auth()->user()->role }}
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

        <p>
            Status:
            {{ $walk->status }}
        </p>

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

        @endif

    </div>

    <hr>

@empty

    <p>No assigned walks.</p>

@endforelse
