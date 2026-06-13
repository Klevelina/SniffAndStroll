<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect('/');
        }

        $userRole = auth()->user()->role;

        // allow if user role is in allowed list
        if (!in_array($userRole, $roles)) {
            return redirect('/');
        }

        return $next($request);
    }
}
