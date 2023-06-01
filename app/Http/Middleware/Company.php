<?php

namespace App\Http\Middleware;

use App\Models\Load;
use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Psy\Util\Json;

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
        $company = is_null($company_id) ? false : \App\Models\Company::find($company_id);
        if ($company) {
            \App::instance('currentCompany', $company);
            $this->checkNOA($company);
            return $next($request);
        } else {
            if (Auth::user()->role === \App\Constanats\UserRoles::SuperAdmin) {
                return redirect('/companies');
            } else {
                return redirect('/'.Auth::user()->company_id);
            }
        }
    }

    public function checkNOA ($company){
        $loadsWithoutNOA = Load::where('shipper_payment_method', 'NET 30 FACTORING')
            ->where('company_id', $company->id)
            ->where('status', "!=" , "Voided")
            ->where('created_at', '<=', Carbon::now()->subDays(7))
            ->where('has_noa', false)
            ->get('id');

        if (!$loadsWithoutNOA->isEmpty()) {
            $loadsWithoutNOA = $loadsWithoutNOA->toArray();
        }

        if (!empty($loadsWithoutNOA)) {
            if (isset($_COOKIE['NOA'])) {
                setcookie('NOA', Json::encode([]), 0, '/');
            }
            setcookie('NOA', Json::encode($loadsWithoutNOA), 0, '/');
        } else {
            if (isset($_COOKIE['NOA'])) {
                setcookie('NOA', Json::encode([]), 0, '/');
            }
        }
    }
}
