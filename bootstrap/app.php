<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Application;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // login employee
        $middleware->redirectGuestsTo(function (Request $request) {
            if ($request->is('employee/*')) {
                return route('employee.login');
            }
            // untuk user biasa
            // return route('login');
        });

        // untuk employee yang sudah login
        $middleware->redirectUsersTo(function (Request $request) {
            if (Auth::guard('employee')->check()) {
                return route('employee.dashboard.index');
            }
            // dashboard user biasa
            // return route('home');
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
