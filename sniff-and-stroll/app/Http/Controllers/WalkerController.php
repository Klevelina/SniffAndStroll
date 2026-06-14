<?php

namespace App\Http\Controllers;
use App\Models\WalkSession;

use Illuminate\Http\Request;

class WalkerController extends Controller
{
    public function dashboard()
    {
        $walks = WalkSession::with(['dog', 'owner', 'review'])
            ->where('walker_id', auth()->id())
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

    public function start(WalkSession $walkSession)
    {
        if ($walkSession->walker_id !== auth()->id()) {
            abort(403);
        }

        if ($walkSession->status !== 'accepted') {
            return back();
        }

        $walkSession->update([
            'status' => 'active'
        ]);

        return redirect()
            ->route('walker.dashboard');
    }

    public function complete(WalkSession $walkSession)
    {
        if ($walkSession->walker_id !== auth()->id()) {
            abort(403);
        }

        if ($walkSession->status !== 'active') {
            return back();
        }

        $walkSession->update([
            'status' => 'completed'
        ]);

        return redirect()
            ->route('walker.dashboard');
    }
}
