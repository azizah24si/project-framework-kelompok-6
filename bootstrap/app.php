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
        // Use custom CSRF middleware for hosting compatibility
        if (app()->environment('production')) {
            $middleware->replace(
                \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class, 
                \App\Http\Middleware\VerifyCsrfTokenHosting::class
            );
        }
        
        $middleware->alias([
            'checkislogin' => CheckIsLogin::class,
            'checkrole' => CheckRole::class,
            'disable.csrf.auth' => \App\Http\Middleware\DisableCsrfForAuth::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
