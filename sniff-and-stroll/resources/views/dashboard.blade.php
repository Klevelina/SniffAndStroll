<x-app-layout>
    <x-slot name="header">
        <h1>Owner Dashboard</h1>
    </x-slot>

        <p>
            Welcome,
            {{ auth()->user()->name }}
        </p>

        <hr>

        <ul>

            <li>
                <a href="{{ route('dogs.index') }}">
                    My Dogs
                </a>
            </li>

            <li>
                <a href="{{ route('walk-sessions.index') }}">
                    My Walk Sessions
                </a>
            </li>

            <li>
                <a href="{{ route('walk-sessions.create') }}">
                    Book Walk
                </a>
            </li>

        </ul>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit">
                Logout
            </button>
        </form>
</x-app-layout>
