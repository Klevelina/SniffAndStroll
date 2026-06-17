<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Normal profile update (name, email, bio)
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'bio' => ['nullable', 'string', 'max:1000'],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return back()->with('status', 'profile-updated');
    }

    /**
     * AJAX avatar upload
     */
    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => ['required', 'image', 'max:2048'],
        ]);

        $user = auth()->user();

        // delete old image if exists
        if ($user->profile_photo) {
            \Storage::disk('public')->delete($user->profile_photo);
        }

        $path = $request->file('profile_photo')
            ->store('profile-photos', 'public');

        $user->profile_photo = $path;
        $user->save();

        return response()->json([
            'url' => $user->profilePhotoUrl(),
        ]);
    }

    public function deletePhoto()
    {
        $user = auth()->user();

        if ($user->profile_photo) {
            \Storage::disk('public')->delete($user->profile_photo);
        }

        $user->profile_photo = null;
        $user->save();

        return response()->json([
            'url' => $user->profilePhotoUrl(),
        ]);
    }
}
