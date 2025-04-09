<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrSupportMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user || (!$user->isAdmin() && !$user->isSupport())) {
            return redirect()->route('forbidden');
        }

        return $next($request);
    }
}
