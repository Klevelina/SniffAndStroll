<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $availabilities = auth()
            ->user()
            ->availabilities;

        return view(
            'availabilities.index',
            compact('availabilities')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('availabilities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'day_of_week' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        auth()
            ->user()
            ->availabilities()
            ->create($validated);

        return redirect()
            ->route('availabilities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Availability $availability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Availability $availability)
    {
        // safety check: only own availability
        abort_unless($availability->walker_id === auth()->id(), 403);


        return view('availabilities.edit', compact('availability'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Availability $availability)
    {
        abort_unless($availability->walker_id === auth()->id(), 403);

        $validated = $request->validate([
            'start_time' => ['required', 'date'],
            'end_time' => ['required', 'date', 'after:start_time'],
        ]);

        $availability->update($validated);

        return redirect()->route('availabilities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Availability $availability)
    {
        abort_unless($availability->walker_id === auth()->id(), 403);

        $availability->delete();

        return redirect()->route('availabilities.index');
    }
}
