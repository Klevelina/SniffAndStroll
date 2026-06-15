@extends('layouts.dashboards.owner')

@section('content')

    <h1>Find a Walker</h1>

    <p>
        Browse available walkers and book your next walk.
    </p>

    {{-- FILTER --}}
    <form method="GET" style="margin: 20px 0; display:flex; gap:10px;">
        <input
            type="datetime-local"
            name="scheduled_at"
            value="{{ request('scheduled_at') }}"
        >

        <button type="submit">
            Search
        </button>
    </form>

    {{-- RESULTS --}}
    @forelse($walkers as $walker)

        <div style="border:1px solid #ddd; padding:15px; margin-bottom:15px; border-radius:6px;">

            <h3 style="margin:0;">
                {{ $walker->name }}
            </h3>

            <p style="margin:5px 0;">
                ⭐ {{ $walker->averageRating() }}
                ({{ $walker->reviewCount() }} reviews)
            </p>

            <p style="margin:5px 0; color:#666;">
                {{ $walker->walk_sessions_count }} walks completed
            </p>

            {{-- OPTIONAL INFO --}}
            @if(method_exists($walker, 'availabilities'))
                <p style="color:#666;">
                    Available slots: {{ $walker->availabilities->count() }}
                </p>
            @endif

            {{-- ACTIONS --}}
            <div style="margin-top:10px; display:flex; gap:10px;">

                <a href="#"
                   style="padding:6px 10px; background:#1d4ed8; color:white; border-radius:4px; text-decoration:none;">
                    View Profile
                </a>

                <a href="#"
                   style="padding:6px 10px; border:1px solid #ccc; border-radius:4px; text-decoration:none;">
                    Book Walk
                </a>

            </div>

        </div>

    @empty
        <p>No walkers found.</p>
    @endforelse

    {{-- PAGINATION --}}
    <div style="margin-top:20px;">
        {{ $walkers->links() }}
    </div>

@endsection
