<?php

namespace FairHub\Http\Middleware;

use Closure;

class AclMiddleware
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
        if (!$request->session()->has('acl'))
            if ($request->user())
                $request->session()->put('acl', $request->user()->contexts()->get()->pluck('pivot.role_id', 'pivot.context_id'));
        return $next($request);
    }
}
