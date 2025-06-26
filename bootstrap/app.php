<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\is_user;
use App\Http\Middleware\is_admin;
use App\Http\Middleware\is_kepala;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'is_admin' => is_admin::class,
            'is_user' => is_user::class,
            'is_kepala' => is_kepala::class 
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
