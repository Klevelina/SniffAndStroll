@extends('layouts.dashboards.owner')

@section('content')

{{-- Welcome banner --}}
<div class="bg-[#E8DFC8] rounded-3xl p-8 w-full flex items-center gap-8 shadow-md mb-10">

    <img
        src="{{ asset('pictures/default-profile.jpg') }}"
        alt="Profile Picture"
        class="w-40 h-40 rounded-full object-cover border-4 border-white">

    <div class="flex flex-col">
        <h1 class="text-5xl font-bold text-[#2F4730]">
            Hi, {{ Auth::user()->name }}!
        </h1>

        <h2 class="mt-2 text-[20px] text-[#2F4730]">
            Ready to schedule a walk?
        </h2>
    </div>
</div>

{{-- Ongoing walks --}}
<h2 class="text-3xl font-bold text-[#2F4730] mb-4">
    Ongoing Walks
</h2>

@foreach($walks as $walk)
    @if($walk->status !== 'completed')
        <div class="bg-white rounded-xl p-5 mb-4 shadow">
            <h3 class="text-xl font-bold text-[#2F4730]">
                {{ $walk->dog->name }}
            </h3>

            <p>Walker: {{ $walk->walker->name }}</p>
            <p>Date: {{ $walk->scheduled_at }}</p>
            <p>Status: {{ $walk->status }}</p>
        </div>
    @endif
@endforeach

{{-- Completed walks --}}
<h2 class="text-3xl font-bold text-[#2F4730] mt-10 mb-4">
    Completed Walks
</h2>

@foreach($walks as $walk)
    @if($walk->status === 'completed')
        <div class="bg-white rounded-xl p-5 mb-4 shadow">
            <h3 class="text-xl font-bold text-[#2F4730]">
                {{ $walk->dog->name }}
            </h3>

            <p>Walker: {{ $walk->walker->name }}</p>
            <p>Date: {{ $walk->scheduled_at }}</p>
            <p>Status: {{ $walk->status }}</p>

            @if($walk->review)
                <p class="mt-2">Review submitted ✔</p>
                <p>⭐ {{ $walk->review->rating }}/5</p>
                <p>{{ $walk->review->comment }}</p>
            @else
                <form method="POST" action="{{ route('reviews.store') }}" class="mt-4 flex flex-col gap-2">
                    @csrf

                    <input type="hidden" name="walk_session_id" value="{{ $walk->id }}">

                    <label>Rating</label>
                    <input type="number" name="rating" min="1" max="5" required>

                    <label>Comment</label>
                    <textarea name="comment"></textarea>

                    <button type="submit" class="bg-[#2F4730] text-white px-4 py-2 rounded-lg mt-2">
                        Submit Review
                    </button>
                </form>
            @endif
        </div>
    @endif
@endforeach

@endsection