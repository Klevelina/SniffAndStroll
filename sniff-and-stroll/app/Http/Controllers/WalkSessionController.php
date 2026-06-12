<?php

namespace App\Http\Controllers;

use App\Models\WalkSession;
use App\Models\User;
use Illuminate\Http\Request;

class WalkSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $walkSessions = auth()->user()
            ->ownedWalkSessions()
            ->with('dog')
            ->latest()
            ->get();

        return view(
            'walk-sessions.index',
            compact('walkSessions')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dog_id' => 'required|exists:dogs,id',
            'walker_id' => 'required|exists:users,id',
            'scheduled_at' => 'required|date',
            'duration_minutes' => 'required|integer|min:15',
        ]);

        WalkSession::create([
            'owner_id' => auth()->id(),
            'walker_id' => $request->walker_id,
            'dog_id' => $request->dog_id,
            'scheduled_at' => $request->scheduled_at,
            'duration_minutes' => $request->duration_minutes,
            'status' => 'pending',
        ]);

        return redirect()->route('walk-sessions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(WalkSession $walkSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WalkSession $walkSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WalkSession $walkSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WalkSession $walkSession)
    {
        //
    }
}
