<?php

namespace FairHub\Http\Middleware;
use \Illuminate\Http\Request;
use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //setup channel and fields depending on role
        return $next($request);
    }
}
