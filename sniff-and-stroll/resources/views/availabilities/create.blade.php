<form method="POST"
      action="{{ route('availabilities.store') }}">

    @csrf

    <select name="day_of_week">
        <option>Monday</option>
        <option>Tuesday</option>
        <option>Wednesday</option>
        <option>Thursday</option>
        <option>Friday</option>
        <option>Saturday</option>
        <option>Sunday</option>
    </select>

    <input
        type="time"
        name="start_time">

    <input
        type="time"
        name="end_time">

    <button type="submit">
        Save Availability
    </button>

</form>
