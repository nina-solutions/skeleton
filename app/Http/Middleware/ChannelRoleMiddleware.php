<?php

namespace FairHub\Http\Middleware;
use \Illuminate\Http\Request;
use Closure;

class ChannelRoleMiddleware
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
        $channels = config('press-accreditation.channels');
        $fields = config('press-accreditation.fields');
        $roleFields = array_merge($fields[0], $fields[$channels[$request->role]]);
        //setup channel and fields depending on role
        $request->merge([
            'channel' => $channels[$request->role],
            'fields' => $roleFields,

        ]);
        return $next($request);
    }
}
