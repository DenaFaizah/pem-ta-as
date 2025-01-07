<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleUser
{
    public function handle(Request $request, Closure $next, $role)
    {
        if ($request->user()->hasRole($role)) {
            return $next($request);
        }

        return response()->json(['error' => 'Anda tidak memiliki akses'], 403);
    }
}
