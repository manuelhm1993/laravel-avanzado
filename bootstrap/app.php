<?php

use App\Http\Middleware\AdminLogin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware(['web', 'admin-login'])// Se agrega el middleware creado para verificar el auth
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin-login' => AdminLogin::class, // Registrar un alias para el middleware creado
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
