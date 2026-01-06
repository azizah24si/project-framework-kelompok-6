<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DisableCsrfForAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Disable CSRF verification for auth routes in production
        if (app()->environment('production') && 
            ($request->is('login') || $request->is('register'))) {
            
            // Skip CSRF verification
            $request->session()->regenerateToken();
            return $next($request);
        }
        
        return $next($request);
    }
}
