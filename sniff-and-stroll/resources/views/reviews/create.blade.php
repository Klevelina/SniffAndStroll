<h1>Create Review</h1>

<form method="POST" action="{{ route('reviews.store') }}">
    @csrf

    <select name="walk_session_id">
        @foreach($walks as $walk)
            <option value="{{ $walk->id }}">
                Walk #{{ $walk->id }} - {{ $walk->dog->name }}
            </option>
        @endforeach
    </select>

    <input type="number" name="rating" min="1" max="5">

    <textarea name="comment"></textarea>

    <button>Submit</button>
</form>
