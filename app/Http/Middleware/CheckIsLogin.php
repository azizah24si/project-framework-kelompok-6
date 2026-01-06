<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIsLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        // BIARKAN halaman login & register TANPA redirect
        if (
            ! $request->routeIs('login') &&
            ! $request->routeIs('login.process') &&
            ! $request->routeIs('register') &&
            ! Auth::check()
        ) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
