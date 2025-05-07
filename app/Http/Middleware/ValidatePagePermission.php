<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Route;

class ValidatePagePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $method = $request->method();
        if ($method == 'GET') {
            $name = Route::currentRouteName(); // string
            
            if (auth()->check() && auth()->user()->hasPermission($name)) {
                return $next($request);
            }
            elseif (auth('employee')->check() && auth('employee')->user()->hasPermission($name)) {
                return $next($request);
            }
            else {
                abort(403);
            }
        }
        else {
            return $next($request);
        }

    }
}
