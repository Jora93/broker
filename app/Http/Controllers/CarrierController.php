<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrier;
use Illuminate\Validation\Rule;

class CarrierController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'adminAndSupport']);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carriers = Carrier::get();

        return response()->view('carrier.index', ['carriers' => $carriers], 200);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carrier.create');
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
        $request->validate([
            "contracted_on"             => ['string', 'nullable'],
            "status"                    => ['required', 'string', Rule::in(['Active', 'Inactive'])],
            "company"                   => ['required', 'string', 'max:255', 'unique:carriers,company'],
            "phone"                     => ['required', 'string', 'max:255', 'unique:carriers,phone'],
            "dba_name"                  => ['string', 'nullable', 'max:255'],
            "phone_extension"           => ['string', 'nullable', 'max:255'],
            "address1"                  => ['required', 'string', 'max:255', 'unique:carriers,address1'],
            "cell_phone"                => ['string', 'nullable', 'max:255'],
            "address2"                  => ['string', 'nullable', 'max:255', 'unique:carriers,address2'],
            "fax"                       => ['string', 'nullable', 'max:255', 'unique:carriers,fax'],
            "city"                      => ['required', 'string'],
            "state"                     => ['required', 'string'],
            "email"                     => ['required', 'email', 'unique:customers,email'],
            "zip_code"                  => ['required', 'string'],
            "carrier_fee"               => ['string', 'nullable'],
//            "preferred_carrier_status"  => ['integer', 'nullable'],
//            "smart_way_certified"       => ['integer', 'nullable'],
//            "carb_compliant"            => ['integer', 'nullable'],
//            "use_dba_name"              => ['integer', 'nullable'],
//            "require_carrier_agreement" => ['integer', 'nullable'],
//            "flagged"                   => ['integer', 'nullable'],
            "flag"                      => ['string', 'nullable', 'max:255'],
            "note"                      => ['string', 'nullable', 'max:255'],

            "payee_company"         => ['string', 'nullable', 'max:255', 'unique:carriers,payee_company'],
            "payee_phone"           => ['string', 'nullable', 'max:255', 'unique:carriers,payee_phone'],
            "payee_dba_name"        => ['string', 'nullable', 'max:255'],
            "payee_phone_extension" => ['string', 'nullable', 'max:255'],
            "payee_address1"        => ['string', 'nullable', 'max:255', 'unique:carriers,payee_address1'],
            "payee_cell_phone"      => ['string', 'nullable', 'max:255'],
            "payee_address2"        => ['string', 'nullable', 'max:255', 'unique:carriers,payee_address2'],
            "payee_fax"             => ['string', 'nullable', 'max:255', 'unique:carriers,payee_fax'],
            "payee_city"            => ['string', 'nullable'],
            "payee_state"           => ['string', 'nullable'],
            "payee_fed_id"          => ['string', 'nullable'],
            "payee_zip_code"        => ['string', 'nullable'],

            "factoring_company_name"   => ['string', 'nullable'],
            "factoring_phone"          => ['string', 'nullable'],
            "factoring_remit_address"  => ['string', 'nullable'],
            "factoring_remit_email"    => ['email', 'nullable'],
            "factoring_remit_address2" => ['string', 'nullable'],
            "factoring_remit_city"     => ['string', 'nullable'],
            "factoring_remit_zipcode"  => ['string', 'nullable'],
            "factoring_state"          => ['string', 'nullable'],

            "mc_number"  => ['string'],
            "dot_number" => ['string'],

            "insurance1_type"          => ['required', 'string'],
            "insurance1_insurer"       => ['string'], 'nullable',
            "insurance1_amount"        => ['required', 'string'],
            "insurance1_policy_number" => ['string', 'nullable'],
            "insurance1_effective_on"  => ['string', 'nullable'],
            "insurance1_expires_on"    => ['required', 'string'],
            "insurance1_phone"         => ['string', 'nullable'],
            "insurance1_email"         => ['email', 'nullable'],

            "insurance2_type"          => ['required', 'string'],
            "insurance2_insurer"       => ['string', 'nullable'],
            "insurance2_amount"        => ['required', 'string'],
            "insurance2_policy_number" => ['string', 'nullable'],
            "insurance2_effective_on"  => ['string', 'nullable'],
            "insurance2_expires_on"    => ['required', 'string'],
            "insurance2_phone"         => ['string', 'nullable'],
            "insurance2_email"         => ['email', 'nullable']
        ]);

        $data = $request->all();
        $data['preferred_carrier_status'] = array_key_exists('preferred_carrier_status', $data) ? true : false;
        $data['smart_way_certified'] = array_key_exists('smart_way_certified', $data) ? true : false;
        $data['carb_compliant'] = array_key_exists('carb_compliant', $data) ? true : false;
        $data['use_dba_name'] = array_key_exists('use_dba_name', $data) ? true : false;
        $data['require_carrier_agreement'] = array_key_exists('require_carrier_agreement', $data) ? true : false;
        $data['flagged'] = array_key_exists('flagged', $data) ? true : false;

        $carrier = Carrier::create($data);

        return redirect('carriers/'.$carrier->id)->withInput()->with('success', 'Carrier Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Carrier $carrier)
    {
        return response()->view('carrier.show', ['carrier' => $carrier], 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Carrier $carrier
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrier $carrier)
    {
        return response()->view('carrier.edit', ['carrier' => $carrier], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Carrier             $carrier
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrier $carrier)
    {
        $request->validate([
            "contracted_on"             => ['string', 'nullable'],
            "status"                    => ['required', 'string', Rule::in(['Active', 'Inactive'])],
            "company"                   => ['required', 'string', 'max:255', 'unique:carriers,company,'.$carrier->id],
            "phone"                     => ['required', 'string', 'max:255', 'unique:carriers,phone,'.$carrier->id],
            "dba_name"                  => ['string', 'nullable', 'max:255'],
            "phone_extension"           => ['string', 'nullable', 'max:255'],
            "address1"                  => ['required', 'string', 'max:255', 'unique:carriers,address1,'.$carrier->id],
            "cell_phone"                => ['string', 'nullable', 'max:255'],
            "address2"                  => ['string', 'nullable', 'max:255', 'unique:carriers,address2,'.$carrier->id],
            "fax"                       => ['string', 'nullable', 'max:255', 'unique:carriers,fax,'.$carrier->id],
            "city"                      => ['required', 'string'],
            "state"                     => ['required', 'string'],
            "email"                     => ['required', 'email', 'unique:customers,email,'.$carrier->id],
            "zip_code"                  => ['required', 'string'],
            "carrier_fee"               => ['string', 'nullable'],
//            "preferred_carrier_status"  => ['integer', 'nullable'],
//            "smart_way_certified"       => ['integer', 'nullable'],
//            "carb_compliant"            => ['integer', 'nullable'],
//            "use_dba_name"              => ['integer', 'nullable'],
//            "require_carrier_agreement" => ['integer', 'nullable'],
//            "flagged"                   => ['integer', 'nullable'],
            "flag"                      => ['string', 'nullable', 'max:255'],
            "note"                      => ['string', 'nullable', 'max:255'],

            "payee_company"         => ['string', 'nullable', 'max:255', 'unique:carriers,payee_company,'.$carrier->id],
            "payee_phone"           => ['string', 'nullable', 'max:255', 'unique:carriers,payee_phone,'.$carrier->id],
            "payee_dba_name"        => ['string', 'nullable', 'max:255'],
            "payee_phone_extension" => ['string', 'nullable', 'max:255'],
            "payee_address1"        => ['string', 'nullable', 'max:255', 'unique:carriers,payee_address1,'.$carrier->id],
            "payee_cell_phone"      => ['string', 'nullable', 'max:255'],
            "payee_address2"        => ['string', 'nullable', 'max:255', 'unique:carriers,payee_address2,'.$carrier->id],
            "payee_fax"             => ['string', 'nullable', 'max:255', 'unique:carriers,payee_fax,'.$carrier->id],
            "payee_city"            => ['string', 'nullable'],
            "payee_state"           => ['string', 'nullable'],
            "payee_fed_id"          => ['string', 'nullable'],
            "payee_zip_code"        => ['string', 'nullable'],

            "factoring_company_name"   => ['string', 'nullable'],
            "factoring_phone"          => ['string', 'nullable'],
            "factoring_remit_address"  => ['string', 'nullable'],
            "factoring_remit_email"    => ['email', 'nullable'],
            "factoring_remit_address2" => ['string', 'nullable'],
            "factoring_remit_city"     => ['string', 'nullable'],
            "factoring_remit_zipcode"  => ['string', 'nullable'],
            "factoring_state"          => ['string', 'nullable'],

            "mc_number"  => ['string'],
            "dot_number" => ['string'],

            "insurance1_type"          => ['required', 'string'],
            "insurance1_insurer"       => ['string'], 'nullable',
            "insurance1_amount"        => ['required', 'string'],
            "insurance1_policy_number" => ['string', 'nullable'],
            "insurance1_effective_on"  => ['string', 'nullable'],
            "insurance1_expires_on"    => ['required', 'string'],
            "insurance1_phone"         => ['string', 'nullable'],
            "insurance1_email"         => ['email', 'nullable'],

            "insurance2_type"          => ['required', 'string'],
            "insurance2_insurer"       => ['string', 'nullable'],
            "insurance2_amount"        => ['required', 'string'],
            "insurance2_policy_number" => ['string', 'nullable'],
            "insurance2_effective_on"  => ['string', 'nullable'],
            "insurance2_expires_on"    => ['required', 'string'],
            "insurance2_phone"         => ['string', 'nullable'],
            "insurance2_email"         => ['email', 'nullable']
        ]);
        $data = $request->all();
        $data['preferred_carrier_status'] = array_key_exists('preferred_carrier_status', $data) ? true : false;
        $data['smart_way_certified'] = array_key_exists('smart_way_certified', $data) ? true : false;
        $data['carb_compliant'] = array_key_exists('carb_compliant', $data) ? true : false;
        $data['use_dba_name'] = array_key_exists('use_dba_name', $data) ? true : false;
        $data['require_carrier_agreement'] = array_key_exists('require_carrier_agreement', $data) ? true : false;
        $data['flagged'] = array_key_exists('flagged', $data) ? true : false;

        $carrier->update($data);

        return redirect('carriers/'.$carrier->id)->withInput()->with('success', 'Carrier Edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Carrier $carrier
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Carrier $carrier)
    {
        $carrier->delete();

        return back();
    }
}
