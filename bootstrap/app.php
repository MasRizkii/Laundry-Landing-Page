<?php

use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustProxies(at: '*');
        $middleware->web(append: [
            HandleInertiaRequests::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();

if (isset($_ENV['VERCEL']) || isset($_SERVER['VERCEL']) || env('VERCEL')) {
    $storage = '/tmp/storage';
    if (! is_dir($storage.'/framework/views')) {
        @mkdir($storage.'/framework/views', 0777, true);
        @mkdir($storage.'/framework/cache', 0777, true);
        @mkdir($storage.'/framework/sessions', 0777, true);
        @mkdir($storage.'/logs', 0777, true);
    }
    $app->useStoragePath($storage);
}

return $app;
