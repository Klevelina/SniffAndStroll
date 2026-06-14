<h1>Reviews</h1>

<a href="{{ route('reviews.create') }}">Create Review</a>

@foreach($reviews as $review)
    <div>
        <p>Walker: {{ $review->walker->name }}</p>
        <p>Owner: {{ $review->reviewer->name }}</p>
        <p>Rating: {{ $review->rating }}</p>
        <p>{{ $review->comment }}</p>

        <a href="{{ route('reviews.edit', $review) }}">Edit</a>

        <form method="POST" action="{{ route('reviews.destroy', $review) }}">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
    </div>
@endforeach
