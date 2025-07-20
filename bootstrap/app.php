
<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php', //  Habilitar rutas API
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //  REGISTRAR EL MIDDLEWARE validate.api 
        $middleware->alias([
            'validate.api' => \App\Http\Middleware\ValidateApiKey::class,
        ]);
        
        // $middleware->append(\App\Http\Middleware\OtroMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Manejo de excepciones personalizado si lo necesitas
        //
    })->create();