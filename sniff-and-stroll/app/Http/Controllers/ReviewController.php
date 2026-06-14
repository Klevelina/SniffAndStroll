<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\WalkSession;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'walk_session_id' => ['required', 'exists:walk_sessions,id'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['nullable', 'string'],
        ]);

        $walk = WalkSession::findOrFail($request->walk_session_id);

        if ($walk->status !== 'completed') {
            abort(403);
        }

        if ($walk->owner_id !== auth()->id()) {
            abort(403);
        }

        // hard stop duplicate
        Review::firstOrCreate(
            [
                'walk_session_id' => $walk->id,
                'reviewer_id' => auth()->id(),
            ],
            [
                'walker_id' => $walk->walker_id,
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]
        );

        $review = Review::create([
            'walk_session_id' => $walk->id,
            'reviewer_id' => auth()->id(),
            'walker_id' => $walk->walker_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
