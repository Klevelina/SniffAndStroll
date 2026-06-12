<h1>Book Walk</h1>

<form method="POST" action="{{ route('walk-sessions.store') }}">
    @csrf

    <label>Dog</label>

    <select name="dog_id">
        @foreach($dogs as $dog)
            <option value="{{ $dog->id }}">
                {{ $dog->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <label>Walker</label>

    <select name="walker_id">
        @foreach($walkers as $walker)
            <option value="{{ $walker->id }}">
                {{ $walker->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <label>Date & Time</label>

    <input
        type="datetime-local"
        name="scheduled_at">

    <br><br>

    <label>Duration (minutes)</label>

    <input
        type="number"
        name="duration_minutes">

    <br><br>

    <button type="submit">
        Create Walk
    </button>
</form>
