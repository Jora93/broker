<?php

namespace App\Http\Middleware;

use App\Constanats\UserRoles;
use Closure;

class SuperAdminAndAccounting
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
        if ($request->user() && ($request->user()->role === UserRoles::SuperAdmin || $request->user()->role === UserRoles::Accounting)){
            return $next($request);
        }    }
}
