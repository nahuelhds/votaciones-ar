<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class RequestResponseLogger
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    /**
     * Loguea el request y la respuesta en el log.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Illuminate\Http\Response $response
     */
    public function terminate($request, $response)
    {
        Log::info("REQUEST - {$request}\n");
        // Response
        Log::info("RESPONSE - $response\n");
    }
}
