<?php

namespace App\Http\Middleware;

use App\Models\LogAccess;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->server->get("REMOTE_ADDR");
        $rote = $request->getRequestUri();
        LogAccess::create(['log' => "$ip requested the route $rote"]);
        
        $resposta = $next($request);

        return $resposta;
    }
}
