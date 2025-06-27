<?php

use App\Http\Middleware\BasicAdminAuth;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckBanner;

require_once __DIR__.'/../app/Helpers/helper.php';

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            CheckBanner::class,
        ]);
        
        $middleware->appendToGroup('basic.admin',[ BasicAdminAuth::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
