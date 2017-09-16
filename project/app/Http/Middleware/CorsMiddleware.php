<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($response instanceof Response) {
            $response->headers->add([
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Headers' => 'authorization, allow',
                'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS'
            ]);
        }

        return $response;
    }
}
