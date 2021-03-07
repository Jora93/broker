<?php

namespace App\Http\Middleware;

use App\Constanats\UserRoleConstants;
use Closure;

class AdminAndSupport
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
        if ($request->user() && ($request->user()->role === UserRoleConstants::SuperAdmin || $request->user()->role === UserRoleConstants::CompanyAdmin || $request->user()->role === UserRoleConstants::Support)){
            return $next($request);
        }
    }
}
