<?php

use App\Http\Middleware\CheckIsLogin;
use App\Http\Middleware\CheckRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'checkislogin' => CheckIsLogin::class,
            'checkrole' => CheckRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Handle CSRF Token Mismatch (419 error)
        $exceptions->render(function (\Illuminate\Session\TokenMismatchException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'CSRF token mismatch'], 419);
            }
            
            // Redirect berdasarkan URL yang diakses
            if ($request->is('register') || $request->is('login')) {
                $route = $request->is('register') ? 'register' : 'login';
                return redirect()->route($route)
                    ->withErrors(['csrf' => 'Halaman sudah expired. Silakan refresh dan coba lagi.'])
                    ->withInput($request->except(['password', 'password_confirmation', '_token']));
            }
            
            // Default redirect ke login
            return redirect()->route('login')
                ->withErrors(['message' => 'Sesi Anda telah berakhir. Silakan login kembali.']);
        });
    })->create();
