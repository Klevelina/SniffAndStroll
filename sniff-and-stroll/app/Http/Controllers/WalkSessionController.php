<?php

namespace App\Http\Controllers;
use App\Models\Dog;
use App\Models\User;
use App\Models\WalkSession;
use App\Models\Availability;
use Illuminate\Http\Request;
use Carbon\Carbon;

class WalkSessionController extends Controller
{
    public function create()
    {
        $dogs = auth()->user()->dogs;

        $walkers = User::where('role', 'walker')
            ->get();

        return view(
            'walk-sessions.create',
            compact('dogs', 'walkers')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'dog_id' => 'required|exists:dogs,id',
            'walker_id' => 'required|exists:users,id',
            'scheduled_at' => 'required|date',
            'duration_minutes' => 'required|integer|min:15|max:480',
        ]);

        $ownerId = auth()->id();

        // Ensure strict types
        $start = \Carbon\Carbon::parse($validated['scheduled_at']);
        $duration = (int) $validated['duration_minutes'];
        $end = (clone $start)->addMinutes($duration);

        /*
        |--------------------------------------------------------------------------
        | 1. Check walker availability (time window overlap-safe)
        |--------------------------------------------------------------------------
        */
        $isAvailable = \App\Models\Availability::where('walker_id', $validated['walker_id'])
            ->where('start_time', '<=', $start)
            ->where('end_time', '>=', $end)
            ->exists();

        if (!$isAvailable) {
            return back()
                ->withErrors(['walker_id' => 'Walker is not available for the selected time slot.'])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | 2. Prevent overlapping bookings
        |--------------------------------------------------------------------------
        */
        $hasConflict = \App\Models\WalkSession::where('walker_id', $validated['walker_id'])
            ->whereIn('status', ['pending', 'accepted', 'active'])
            ->where(function ($query) use ($start, $end) {
                $query->where('scheduled_at', '<', $end)
                    ->whereRaw(
                        'DATE_ADD(scheduled_at, INTERVAL duration_minutes MINUTE) > ?',
                        [$start]
                    );
            })
            ->exists();

        if ($hasConflict) {
            return back()
                ->withErrors(['walker_id' => 'Walker already has a conflicting booking.'])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | 3. Create booking
        |--------------------------------------------------------------------------
        */
        \App\Models\WalkSession::create([
            'dog_id' => (int) $validated['dog_id'],
            'walker_id' => (int) $validated['walker_id'],
            'owner_id' => $ownerId,
            'scheduled_at' => $start,
            'duration_minutes' => $duration,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('owner.dashboard')
            ->with('success', 'Walk booked successfully.');
    }

    public function show(WalkSession $walkSession)
    {
        return view('walk-sessions.show', compact('walkSession'));
    }

    public function destroy(WalkSession $walkSession)
    {
        // Optional: add authorization check later
        $walkSession->delete();

        return back()->with('success', 'Walk cancelled.');
    }
}
