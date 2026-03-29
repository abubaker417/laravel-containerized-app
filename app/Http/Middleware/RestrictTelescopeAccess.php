<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictTelescopeAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedIps = array_filter(
            array_map('trim', explode(',', env('TELESCOPE_ALLOWED_IPS', '')))
        );

        // If no IPs configured, block everyone
        if (empty($allowedIps)) {
            abort(403, 'Telescope access not configured.');
        }

        if (!in_array($request->ip(), $allowedIps)) {
            abort(403, 'You are not allowed to access Telescope.');
        }

        return $next($request);
    }
}
