<h1>Your Availability</h1>

<a href="{{ route('availabilities.create') }}">
    Add Availability
</a>

@foreach($availabilities as $slot)

    <div>
        <p>Day: {{$slot->day_of_week}}</p>
        <p>Start: {{ $slot->start_time }}</p>
        <p>End: {{ $slot->end_time }}</p>

        <a href="{{ route('availabilities.edit', $slot) }}">
            Edit
        </a>

        <form method="POST" action="{{ route('availabilities.destroy', $slot) }}">
            @csrf
            @method('DELETE')

            <button type="submit">
                Delete
            </button>
        </form>
    </div>

@endforeach
