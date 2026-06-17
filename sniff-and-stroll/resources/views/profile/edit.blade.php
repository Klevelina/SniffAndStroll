@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6 space-y-6 text-white">

        {{-- PROFILE HEADER --}}
        <div class="bg-[#2F4730] p-6 rounded-xl flex flex-col md:flex-row items-center md:items-start gap-6">

            {{-- AVATAR --}}
            <div class="flex flex-col items-center md:items-start gap-2">

                <label for="profile_photo" class="cursor-pointer block">
                    <img
                        id="avatar-preview"
                        src="{{ $user->profile_photo
                        ? $user->profilePhotoUrl()
                        : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=2F4730&color=fff&size=256'
                    }}"
                        class="w-28 h-28 rounded-full object-cover border-2 border-[#E8DFC8]"
                    >
                </label>

                <input
                    type="file"
                    id="profile_photo"
                    class="hidden"
                    accept="image/*"
                >

                {{-- remove photo --}}
                <button
                    type="button"
                    id="remove-photo-btn"
                    class="text-xs text-red-300 hover:text-red-200"
                >
                    Remove photo
                </button>

            </div>

            {{-- INFO --}}
            <div class="flex-1 text-center md:text-left">

                <h1 class="text-2xl font-bold">
                    {{ $user->name }}
                </h1>

                <p class="text-sm text-gray-300">
                    Walker Profile
                </p>

                <p class="mt-2">
                    ⭐ {{ $user->averageRating() }}
                    ({{ $user->reviewCount() }} reviews)
                </p>

            </div>
        </div>

        {{-- FORM --}}
        <form id="profile-form"
              method="post"
              action="{{ route('profile.update') }}"
              class="space-y-6">

            @csrf
            @method('patch')

            {{-- BIO --}}
            <div class="bg-[#2F4730] p-4 rounded-lg">
                <label class="block mb-2 font-semibold">Bio</label>

                <textarea
                    name="bio"
                    rows="4"
                    class="w-full text-black rounded p-2"
                    placeholder="Tell clients about yourself..."
                >{{ old('bio', $user->bio) }}</textarea>
            </div>

            {{-- NAME / EMAIL --}}
            <div class="bg-[#2F4730] p-4 rounded-lg space-y-4">

                <div>
                    <x-input-label for="name" value="Name" />
                    <x-text-input id="name" name="name" type="text"
                                  class="mt-1 block w-full"
                                  :value="old('name', $user->name)" />
                </div>

                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" name="email" type="email"
                                  class="mt-1 block w-full"
                                  :value="old('email', $user->email)" />
                </div>

            </div>

            {{-- SAVE --}}
            <button type="submit"
                    class="px-6 py-3 bg-[#E8DFC8] text-[#2F4730] rounded-lg font-bold">
                Save Changes
            </button>

        </form>

        {{-- OTHER SECTIONS --}}
        <div class="space-y-6">

            <div class="p-4 bg-[#2F4730] rounded-lg">
                @include('profile.partials.update-password-form')
            </div>

            <div class="p-4 bg-[#2F4730] rounded-lg">
                @include('profile.partials.delete-user-form')
            </div>

        </div>

    </div>

    {{-- AJAX SCRIPT --}}
    <script>
        document.getElementById('profile_photo').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append('profile_photo', file);

            fetch("{{ route('profile.photo.upload') }}", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Accept': 'application/json'
                },
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    document.getElementById('avatar-preview').src = data.url;
                })
                .catch(() => alert('Upload failed'));
        });

        document.getElementById('remove-photo-btn').addEventListener('click', function () {

            fetch("{{ route('profile.photo.delete') }}", {
                method: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Accept': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {
                    document.getElementById('avatar-preview').src = data.url;
                })
                .catch(() => alert('Delete failed'));
        });
    </script>

@endsection
