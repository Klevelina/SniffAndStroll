<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function dashboard()
    {
        $walks = auth()->user()
            ->ownedWalkSessions()
            ->with(['dog', 'walker'])
            ->latest()
            ->get();

        return view(
            'owner.dashboard',
            compact('walks')
        );
    }
}
