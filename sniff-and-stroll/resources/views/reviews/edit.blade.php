<h1>Edit Review</h1>

<form method="POST" action="{{ route('reviews.update', $review) }}">
    @csrf
    @method('PUT')

    <input type="number" name="rating"
           value="{{ $review->rating }}" min="1" max="5">

    <textarea name="comment">{{ $review->comment }}</textarea>

    <button>Update</button>
</form>
