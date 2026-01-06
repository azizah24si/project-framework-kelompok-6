<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpFoundation\Response;

class VerifyCsrfTokenHosting extends VerifyCsrfToken
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Temporarily exclude auth routes for hosting compatibility
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // For hosting environment, be more lenient with CSRF
        if (app()->environment('production')) {
            try {
                return parent::handle($request, $next);
            } catch (TokenMismatchException $e) {
                // If CSRF fails, regenerate token and redirect back
                $request->session()->regenerateToken();
                
                if ($request->is('login')) {
                    return redirect()->route('login')
                        ->withInput($request->except('password', '_token'))
                        ->with('warning', 'Sesi telah berakhir. Silakan coba lagi.');
                }
                
                if ($request->is('register')) {
                    return redirect()->route('register')
                        ->withInput($request->except('password', 'password_confirmation', '_token'))
                        ->with('warning', 'Sesi telah berakhir. Silakan coba lagi.');
                }
                
                return redirect()->route('login')
                    ->with('warning', 'Sesi telah berakhir. Silakan login kembali.');
            }
        }
        
        return parent::handle($request, $next);
    }
}
