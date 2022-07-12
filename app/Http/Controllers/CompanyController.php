<?php

namespace App\Http\Controllers;

use App\Constanats\UserRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use App\Models\Company;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
//
//    public function setAppCompany(Request $request)
//    {
//        $request->validate([
//            "id" => ['required', 'exists:companies,id'],
//        ]);
//
//        if (Auth::user()->role === \App\Constanats\UserRoles::SuperAdmin) {
//            return redirect('/');
//        }
//    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function profileSettings($company_id)
    {
        $company = \App::make('currentCompany');
        $generalSettings = GeneralSetting::where('company_id', $company_id)->first();

        return View('company.profile')->with(['company' => $company, "generalSettings" => $generalSettings]);
    }

    public function UpdateProfileSettings($company_id, Request $request)
    {
        $request->validate([
            "generalSettings.name"             => ['required', 'string'],
            "generalSettings.phone"            => ['required', 'string'],
            "generalSettings.mc_number"        => ['required', 'string'],
            "generalSettings.time_zone"        => ['required', 'string'],
            "generalSettings.first_name"       => ['required', 'string'],
            "generalSettings.last_name"        => ['required', 'string'],
            "generalSettings.address1"         => ['required', 'string'],
            "generalSettings.address2"         => ['nullable', 'string'],
            "generalSettings.city"             => ['required', 'string'],
            "generalSettings.toll_free_phone"  => ['nullable', 'string'],
            "generalSettings.state"            => ['required', 'string'],
            "generalSettings.fax"              => ['nullable', 'string'],
            "generalSettings.zip_code"         => ['required', 'string'],
            "generalSettings.email"            => ['required', 'string'],
            "generalSettings.website"          => ['nullable', 'string'],
            "generalSettings.default_currency" => ['required', 'string'],
            "generalSettings.fed_id"           => ['nullable', 'string'],
            "generalSettings.scac"             => ['nullable', 'string']
        ]);

        $data = $request->all();
        $generalSetting = GeneralSetting::where('company_id', $company_id)->first();

        if (Auth::user()->role === \App\Constanats\UserRoles::SuperAdmin) {
            $generalSetting->update($data['generalSettings']);
        }

        return redirect()->back()->with('success', 'Data Updated successfully');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::get();

        return View('welcome')->with(['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($customer_id, Company $company)
    {
        return response()->view('company.edit', ['company' => $company], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($company_id, Request $request, Company $company)
    {
        $validator = Validator::make($request->all(), [
            "name"                => ['required', 'unique:companies,name,'.$company->id],
            "address"              => ['required', 'unique:companies,address,'.$company->id],
            "mc_number"           => ['required', 'unique:companies,mc_number,'.$company->id],
            "phone_one"           => ['required', 'unique:companies,phone_one,'.$company->id],
            "invoice_last_number" => ['required', 'unique:companies,invoice_last_number,'.$company->id],
            "load_last_number"    => ['required', 'unique:companies,load_last_number,'.$company->id],
        ]);
        $data = $request->all();
        $company->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
