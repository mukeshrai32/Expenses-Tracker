<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        /**
         * @var Response $response
         */
        $response = $next($request);

        /**
         * @var string $header
         */
        // dd(config('headers.set-headers'));
        foreach ((array) config('headers.set-headers') as $key => $value) {
            // dd($key, $value);
            $response->headers->set($key, $value);
        }

        return $response;
    }
}
