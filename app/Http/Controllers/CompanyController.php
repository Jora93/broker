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
            "adress"              => ['required', 'unique:companies,adress,'.$company->id],
            "mc_number"           => ['required', 'unique:companies,mc_number,'.$company->id],
            "phone_one"           => ['required', 'unique:companies,phone_one,'.$company->id],
            "invoice_last_number" => ['required', 'unique:companies,invoice_last_number,'.$company->id],
            "load_last_number"    => ['required', 'unique:companies,load_last_number,'.$company->id],
            "logo"                => ['required', 'image', 'mimes:pdf|max:2048'],
        ]);
        $data = $request->all();
        $imageName = time().'.'.$request->logo->getClientOriginalExtension();

        $image = $data['logo'];
        if (Storage::disk('s3')->exists($company->logo)) {
//            dump('s3://american-success//'.$imageName);
            Storage::disk('s3')->delete($imageName); //todo dont work
        }
        Storage::disk('s3')->put($imageName, file_get_contents($image), 'public');

        $data['logo'] = $imageName;
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
//<div class="form-group">
//          <label>Document Type</label>
//          <select name="doc_type" id="doc-type" class="form-control"><option value="">Select a doc type</option><option value="Carrier Agreement">Carrier Agreement</option>
//<option value="Carrier Confirmation">Carrier Confirmation</option>
//<option value="Carrier Freight Bill">Carrier Freight Bill</option>
//<option value="Claim">Claim</option>
//<option value="Customer Agreement">Customer Agreement</option>
//<option value="Customer Confirmation">Customer Confirmation</option>
//<option value="Customer Invoice">Customer Invoice</option>
//<option value="Customer Packet">Customer Packet</option>
//<option value="Bill of Lading">Bill of Lading</option>
//<option value="Customs Paperwork">Customs Paperwork</option>
//<option value="Insurance">Insurance</option>
//<option value="Load Sheet">Load Sheet</option>
//<option value="MC Authority">MC Authority</option>
//<option value="Notice of Assignment">Notice of Assignment</option>
//<option value="Payment Documents">Payment Documents</option>
//<option value="Picture">Picture</option>
//<option value="Proof of Delivery">Proof of Delivery</option>
//<option value="Purchase Order">Purchase Order</option>
//<option value="Rate Quote">Rate Quote</option>
//<option value="Receipt">Receipt</option>
//<option value="References">References</option>
//<option value="Release">Release</option>
//<option value="W9 Form">W9 Form</option>
//<option value="Weight Ticket">Weight Ticket</option>
//<option value="Other">Other</option>
//<option value="Unknown">Unknown</option></select>
//        </div>
