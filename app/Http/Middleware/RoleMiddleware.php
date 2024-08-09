<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        Log::info('RoleMiddleware called with role: ' . $role);

        
        if ($role === 'admin') {
            return $next($request);
        }

        return redirect('/no-access');
    }
}
