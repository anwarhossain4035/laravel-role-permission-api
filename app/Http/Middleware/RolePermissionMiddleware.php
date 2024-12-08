<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolePermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permission
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        $user = Auth::user();

        // Check if user is authenticated
        if (!$user) {
            return response()->json(['message' => 'Unauthorized.'], 401);
        }

        // Check if the user has the required permission
        if (!$user->can($permission)) {
            return response()->json(['message' => 'Forbidden: Insufficient permissions.'], 403);
        }

        return $next($request);
    }
}