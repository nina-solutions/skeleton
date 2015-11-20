<?php

namespace FairHub\Http\Middleware;

use Closure;

class ContentsMiddleware
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
        if (!$request->session()->has('contents'))
            if ($request->user())
                $request->session()->put('contents', config('hub-contents'));
        return $next($request);
    }
}
