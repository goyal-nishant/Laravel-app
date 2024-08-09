<?php

namespace App\Http\Middleware;

use Closure;

class SecondMiddleware
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}

