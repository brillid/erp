<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;


class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $permission)
    {
        if (auth()->user()->hasPermission($permission)) {
            return $next($request);
        }
        // Unauthorized action, hadnle it as needed (e.g., redirect or return an error)
        return abort(403);
    }
}
