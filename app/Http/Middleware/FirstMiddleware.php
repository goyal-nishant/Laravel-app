<?php

namespace App\Http\Middleware;

use Closure;

namespace App\Http\Middleware;

use Closure;

class FirstMiddleware
{
    public function handle($request, Closure $next)
    {
        // Your middleware logic...
        return $next($request);
    }
}

