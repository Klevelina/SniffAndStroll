<h1>My Walks</h1>

<a href="{{ route('walk-sessions.create') }}">
    Book Walk
</a>

<ul>

    @foreach($walkSessions as $walk)

        <li>

            {{ $walk->dog->name }}

            |

            {{ $walk->scheduled_at }}

            |

            {{ $walk->status }}

        </li>

    @endforeach

</ul>
