<?php

namespace App\Http\Middleware;

use Closure;
//use App\Constanats\UserRoles;

class SuperAdmin
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
        if ($request->user() && $request->user()->role === \App\Constanats\UserRoles::SuperAdmin){
            return $next($request);
        }
    }
}
