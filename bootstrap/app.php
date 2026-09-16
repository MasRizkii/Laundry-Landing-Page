<?php

use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Contracts\Foundation\MaintenanceMode;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\ArrayMaintenanceMode;
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

        $exceptions->render(function (Throwable $e, Request $request) {
            if (config('app.debug')) {
                return response(
                    "<div style='font-family:sans-serif;padding:24px;background:#fff1f2;border:1px solid #fda4af;border-radius:8px;margin:20px;'>".
                    "<h2 style='color:#be123c;margin-top:0;'>Application Error: ".htmlspecialchars($e->getMessage()).'</h2>'.
                    '<p><strong>Location:</strong> '.htmlspecialchars($e->getFile()).':'.$e->getLine().'</p>'.
                    "<details open style='margin-top:16px;'><summary style='cursor:pointer;font-weight:600;'>Stack Trace</summary>".
                    "<pre style='background:#1e293b;color:#f8fafc;padding:16px;border-radius:6px;overflow-x:auto;font-size:13px;line-height:1.5;margin-top:8px;'>".
                    htmlspecialchars($e->getTraceAsString()).
                    '</pre></details></div>',
                    500
                );
            }
        });
    })->create();

$app->singleton(
    MaintenanceMode::class,
    fn () => new ArrayMaintenanceMode
);

if (isset($_ENV['VERCEL']) || isset($_SERVER['VERCEL']) || env('VERCEL') || ! is_writable(dirname(__DIR__).'/storage')) {
    $storage = '/tmp/storage';
    if (! is_dir($storage.'/framework/views')) {
        @mkdir($storage.'/framework/views', 0777, true);
        @mkdir($storage.'/framework/cache/data', 0777, true);
        @mkdir($storage.'/framework/sessions', 0777, true);
        @mkdir($storage.'/logs', 0777, true);
    }
    $app->useStoragePath($storage);
}

return $app;
