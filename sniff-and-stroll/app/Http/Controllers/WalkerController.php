<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\WalkSession;
use Carbon\Carbon;
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

    public function index(Request $request)
    {
        $query = User::where('role', User::ROLE_WALKER)
            ->withCount('walkSessions');

        if ($request->filled('scheduled_at')) {
            $start = Carbon::parse($request->scheduled_at);
            $end = (clone $start)->addMinutes(60);

            $query->whereHas('availabilities', function ($q) use ($start, $end) {
                $q->where('start_time', '<=', $start)
                    ->where('end_time', '>=', $end);
            });
        }

        $walkers = User::where('role', 'walker')
            ->withCount([
                'walkSessions as completed_walks_count' => function ($query) {
                    $query->where('status', 'completed');
                }
            ])
            ->paginate(8);

        return view('walker.index', compact('walkers'));
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
