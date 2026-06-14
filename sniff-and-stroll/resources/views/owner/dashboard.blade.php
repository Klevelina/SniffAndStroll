@extends('layouts.dashboards.owner')

@section('content')
    <h1>Owner Dashboard</h1>

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

        @if($walk->status === 'completed')

            @if($walk->review)
                <div>
                    <p>Review submitted ✔</p>
                    <p>⭐ {{ $walk->review->rating }}/5</p>
                    <p>{{ $walk->review->comment }}</p>
                </div>
            @else
                <form method="POST" action="{{ route('reviews.store') }}">
                    @csrf

                    <input type="hidden" name="walk_session_id" value="{{ $walk->id }}">

                    <label>Rating</label>
                    <input type="number" name="rating" min="1" max="5" required>

                    <label>Comment</label>
                    <textarea name="comment"></textarea>

                    <button type="submit">Submit Review</button>
                </form>
            @endif

        @endif

        <hr>

    @empty

        <p>No walks booked.</p>

    @endforelse
@endsection
