<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->hasRole('admin')) {
            // Redirect or abort if user is not admin
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
