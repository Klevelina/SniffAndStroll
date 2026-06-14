<h1>Edit Availability</h1>

<form method="POST" action="{{ route('availabilities.update', $availability) }}">
    @csrf
    @method('PUT')

    <label>Start time</label>
    <input type="datetime-local"
           name="start_time"
           value="{{ $availability->start_time }}">

    <label>End time</label>
    <input type="datetime-local"
           name="end_time"
           value="{{ $availability->end_time }}">

    <button type="submit">Update</button>
</form>
