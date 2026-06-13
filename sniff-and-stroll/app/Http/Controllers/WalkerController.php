<?php

namespace App\Http\Controllers;
use App\Models\WalkSession;

use Illuminate\Http\Request;

class WalkerController extends Controller
{
    public function dashboard()
    {
        $walks = auth()->user()
            ->walkingSessions()
            ->with(['dog', 'owner'])
            ->latest()
            ->get();

        return view(
            'walker.dashboard',
            compact('walks')
        );
    }

    public function accept(WalkSession $walkSession)
    {
        if ($walkSession->walker_id !== auth()->id()) {
            abort(403);
        }

        $walkSession->update([
            'status' => 'accepted'
        ]);

        return redirect()
            ->route('walker.dashboard');
    }

    public function decline(WalkSession $walkSession)
    {
        if ($walkSession->walker_id !== auth()->id()) {
            abort(403);
        }

        $walkSession->update([
            'status' => 'cancelled'
        ]);

        return redirect()
            ->route('walker.dashboard');
    }
}
