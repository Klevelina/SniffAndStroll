@extends('layouts.app')

@section('content')
    <h2 class="text-xl text-white font-bold mb-4">Profile</h2>

    <img
        src="{{ $user->profilePhotoUrl() }}"
        alt="{{ $user->name }}"
        width="120"
    >

    <div class="space-y-12">

        <div class="p-4 bg-[#2F4730] rounded-lg text-white">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="p-4 bg-[#2F4730] rounded-lg text-white">
            @include('profile.partials.update-password-form')
        </div>

        <div class="p-4 bg-[#2F4730] rounded-lg text-white">
            @include('profile.partials.delete-user-form')
        </div>

    </div>
@endsection
