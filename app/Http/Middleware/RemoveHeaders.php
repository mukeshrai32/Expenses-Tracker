<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemoveHeaders
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
        // dd(config('headers.remove'));
        foreach ((array) config('headers.remove') as $header) {
            $response->headers->remove($header);
        }
        return $response;
    }
}
