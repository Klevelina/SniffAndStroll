<h1>My Dogs</h1>

<a href="{{ route('dogs.create') }}">
    Add Dog
</a>

<ul>
    @foreach($dogs as $dog)
        <li>
            {{ $dog->name }}
        </li>
    @endforeach
</ul>
