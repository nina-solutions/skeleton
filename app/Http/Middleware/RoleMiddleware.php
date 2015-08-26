<?php

namespace FairHub\Http\Middleware;
use \Illuminate\Http\Request;
use Closure;

class RoleMiddleware
{

    private $channels =[
        'journalist' =>20,
        'giornalista' => 20,
        'photographer' => 23,
        'fotografo' => 23,
        'collaborator' => 24,
        'collaboratore' => 24,
        'journalist_en' => 33,
        'giornalista_en' => 33,
    ];

    //channel related fields
    //channel 0 is ALL THE CHANNELS
    //a channel can override his common configuration

    //fields with 0 as value are optional
    //fields with 1 as value as mandatory
    private $fields = [
        0  => [],
        20 => [],
        23 => [],
        24 => [],
        33 => [],
    ];

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
        $request->merge(array('channel' => $this->channels[$request->role]));
        return $next($request);
    }
}
