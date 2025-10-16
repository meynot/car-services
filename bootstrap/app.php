<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            \App\Http\Middleware\SetLocale::class,
        ]);
        
           $middleware->alias([
               'editor.permissions' => \App\Http\Middleware\CheckEditorPermissions::class,
               'admin.only' => \App\Http\Middleware\AdminOnly::class,
           ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
