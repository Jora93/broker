<?php

namespace App\Http\Middleware;

use App\Constanats\UserRoleConstants;
use Closure;
use Illuminate\Support\Facades\Auth;

class Company
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
        $company_id = $request->route('company_id');
        $company = is_null($company_id) ? false : \App\Company::find($company_id);

        if ($company) {
            \App::instance('currentCompany', $company);

            //get current company
//            $currentCompany = \App::make('currentCompany');
            return $next($request);
        } else {
            if (Auth::user()->role === UserRoleConstants::SuperAdmin) {
                return redirect('/companies');
            } else {
                return redirect('/'.Auth::user()->company_id);
            }
        }
    }
}
