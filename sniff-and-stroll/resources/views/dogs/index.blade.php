<h1>My Dogs</h1>

<a href="{{ route('dogs.create') }}">Add Dog</a>

@foreach($dogs as $dog)
    <div>
        <h3>{{ $dog->name }}</h3>
        <p>{{ $dog->breed }}</p>

        <a href="{{ route('dogs.edit', $dog) }}">Edit</a>

        <form method="POST" action="{{ route('dogs.destroy', $dog) }}">
            @csrf
            @method('DELETE')
            <button>Remove</button>
        </form>
    </div>
@endforeach
