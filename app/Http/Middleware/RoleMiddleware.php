<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $userRole = Auth::user()->role->name;

        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        return abort(403, 'Unauthorized access.');
    }
}
