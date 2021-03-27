<?php

namespace App\Http\Controllers;

use App\Constanats\UserRoleConstants;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Company;
use App\GeneralSetting;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function setAppCompany(Request $request)
    {
        $request->validate([
            "id" => ['required', 'exists:companies,id'],
        ]);

        if (Auth::user()->role === UserRoleConstants::SuperAdmin) {
            return redirect('/');
        }
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function profileSettings()
    {
        $company = \App::make('currentCompany');
        $generalSettings = GeneralSetting::first();

        return View('company.profile')->with(['company' => $company, "generalSettings" => $generalSettings]);
    }

    public function UpdateProfileSettings($company_id, Request $request)
    {
        $request->validate([
            "company.phone_one" => ['required', 'string', 'max:255', 'unique:companies,phone_one,'.$company_id],
            "company.phone_two" => ['nullable', 'string', 'max:255', 'unique:companies,phone_two,'.$company_id],
            "company.mc_number" => ['required', 'string', 'max:255'],

            "generalSettings.name"             => ['required', 'string'],
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
        $company = Company::find($company_id);
        $company->update($data['company']);

        if (Auth::user()->role === UserRoleConstants::SuperAdmin) {
            $generalSetting = GeneralSetting::first();
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
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
