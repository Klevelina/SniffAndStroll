@extends('layouts.app')

@section('content')
    <h1>Your Profile</h1>

    <p>Name: {{ auth()->user()->name }}</p>
    <p>Email: {{ auth()->user()->email }}</p>

    <a href="{{ route('profile.edit') }}">Edit Profile</a>
@endsection
