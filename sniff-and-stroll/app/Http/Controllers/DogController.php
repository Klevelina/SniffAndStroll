<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\Request;

class DogController extends Controller
{
    public function index()
    {
        $dogs = Dog::where('user_id', auth()->id())->get();

        return view('dogs.index', compact('dogs'));
    }

    public function create()
    {
        return view('dogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        Dog::create([
            'user_id' => auth()->id(),
            ...$validated
        ]);

        return redirect()->route('dogs.index');
    }

    public function edit(Dog $dog)
    {
        abort_if($dog->user_id !== auth()->id(), 403);

        return view('dogs.edit', compact('dog'));
    }

    public function update(Request $request, Dog $dog)
    {
        abort_if($dog->user_id !== auth()->id(), 403);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $dog->update($validated);

        return redirect()->route('dogs.index');
    }

    public function destroy(Dog $dog)
    {
        abort_if($dog->user_id !== auth()->id(), 403);

        $dog->delete();

        return redirect()->route('dogs.index');
    }
}
