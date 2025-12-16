<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpFoundation\Response;

class VerifyCsrfTokenCustom extends VerifyCsrfToken
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'login',
        'register',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        try {
            return parent::handle($request, $next);
        } catch (TokenMismatchException $e) {
            // Generate new token
            $request->session()->regenerateToken();
            
            // Redirect back with error message and preserve input
            if ($request->is('register')) {
                return redirect()->route('register')
                    ->withErrors(['csrf' => 'Halaman sudah expired. Token telah diperbaharui, silakan coba lagi.'])
                    ->withInput($request->except(['password', 'password_confirmation', '_token']));
            }
            
            if ($request->is('login')) {
                return redirect()->route('login')
                    ->withErrors(['csrf' => 'Halaman sudah expired. Token telah diperbaharui, silakan coba lagi.'])
                    ->withInput($request->except(['password', '_token']));
            }
            
            return redirect()->route('login')
                ->withErrors(['message' => 'Sesi telah berakhir. Silakan login kembali.']);
        }
    }
}
