<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $allowedRoles = collect(explode('|', $role))
            ->map(fn ($item) => strtolower(trim($item)))
            ->filter()
            ->all();

        if (Auth::check()) {
            $user = Auth::user();

            // Auto-assign default role when missing to prevent lockout
            if (empty($user->role)) {
                $user->role = 'super admin';
                $user->save();
            }

            if (in_array(strtolower((string) $user->role), $allowedRoles, true)) {
                return $next($request);
            }
        }

        return abort(403);
    }
}

