<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIsLogin
{
    public function handle(Request $request, Closure $next)
    {
        // Cek session login manual
        if (!session()->has('user')) {
            return redirect('/login')->withErrors('Silahkan login terlebih dahulu!');
        }

        return $next($request);
    }
}
