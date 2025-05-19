<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // middleware global
    ];

    protected $middlewareGroups = [
        'web' => [
            // middleware grup web
        ],
    ];

    protected $routeMiddleware = [
        'admin' => \App\Http\Middleware\IsAdmin::class,
    ];
}
