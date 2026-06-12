<h1>Available Walkers</h1>

<ul>

    @foreach($walkers as $walker)

        <li>

            {{ $walker->name }}

        </li>

    @endforeach

</ul>
