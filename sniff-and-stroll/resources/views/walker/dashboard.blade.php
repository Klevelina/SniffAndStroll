@forelse($walks as $walk)

    <div>
        <h3>{{ $walk->dog->name }}</h3>

        <p>Owner: {{ $walk->owner->name }}</p>
        <p>Date: {{ $walk->scheduled_at }}</p>
        <p>Duration: {{ $walk->duration_minutes }} minutes</p>
        <p>Status: {{ ucfirst($walk->status) }}</p>

        {{-- REVIEW SECTION --}}
        @if($walk->status === 'completed')

            @if($walk->review)
                <div>
                    <h4>Review</h4>
                    <p>⭐ {{ $walk->review->rating }}/5</p>
                    <p>{{ $walk->review->comment }}</p>
                </div>
            @else
                <p><em>No review yet</em></p>
            @endif

        @endif

        {{-- ACTION BUTTONS --}}
        @if($walk->status === 'pending')
            <form method="POST" action="{{ route('walk-sessions.accept', $walk) }}">
                @csrf
                @method('PATCH')
                <button>Accept</button>
            </form>

            <form method="POST" action="{{ route('walk-sessions.decline', $walk) }}">
                @csrf
                @method('PATCH')
                <button>Decline</button>
            </form>
        @endif

        @if($walk->status === 'accepted')
            <form method="POST" action="{{ route('walk-sessions.start', $walk) }}">
                @csrf
                @method('PATCH')
                <button>Start Walk</button>
            </form>
        @endif

        @if($walk->status === 'active')
            <form method="POST" action="{{ route('walk-sessions.complete', $walk) }}">
                @csrf
                @method('PATCH')
                <button>Complete Walk</button>
            </form>
        @endif

    </div>

    <hr>

@empty
    <p>No assigned walks.</p>
@endforelse
