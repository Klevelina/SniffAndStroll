<h1>Book Walk</h1>

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <strong>Booking failed:</strong>

        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('walk-sessions.store') }}">
    @csrf

    <label>Dog</label>

    <select name="dog_id" class="border w-full p-2" required>
        <option value="">Select a dog</option>
        @foreach($dogs as $dog)
            <option value="{{ $dog->id }}">{{ $dog->name }}</option>
        @endforeach
    </select>

    <br><br>

    <label>Walker</label>

    <select name="walker_id" class="border w-full p-2" required>
        <option value="">Select a walker</option>
        @foreach($walkers as $walker)
            <option value="{{ $walker->id }}">{{ $walker->name }}</option>
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
