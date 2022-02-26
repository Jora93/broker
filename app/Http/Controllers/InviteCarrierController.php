<?php

namespace App\Http\Controllers;

use App\Models\Carrier;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Services\Document;

class InviteCarrierController
{
    public function index($company_alias)
    {
        $company = Company::where('invite_alias', $company_alias)->first();
        if ($company) {
            return view('carrier-invite.index', ['company_id' => $company->id]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            "company_id"                => ['required'],
            "contracted_on"             => ['string', 'nullable'],
            "status"                    => ['required', 'string', Rule::in(['Pending'])],
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
            "email"                     => ['required', 'email', 'unique:carriers,email'],
            "zip_code"                  => ['required', 'string'],
            "carrier_fee"               => ['string', 'nullable'],
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

            "mc_number"  => ['string', 'nullable'],
            "dot_number" => ['string', 'nullable'],

            "insurance1_type"          => ['required', 'string'],
            "insurance1_insurer"       => ['string', 'nullable'],
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
            "insurance2_email"         => ['email', 'nullable'],

            "Mc_Authority"              => ['required', 'file', 'max:2048', 'mimes:jpeg,bmp,png,gif,svg,pdf'],
            "Insurance"                 => ['required', 'file', 'max:2048', 'mimes:jpeg,bmp,png,gif,svg,pdf'],
            "W9"                        => ['required', 'file', 'max:2048', 'mimes:jpeg,bmp,png,gif,svg,pdf'],
            "Payment_document"          => ['required', 'file', 'max:2048', 'mimes:jpeg,bmp,png,gif,svg,pdf']
        ]);

        $data = $request->all();
        $data['carrier_status'] = 'Pending';
        $data['preferred_carrier_status'] = array_key_exists('preferred_carrier_status', $data) ? true : false;
        $data['smart_way_certified'] = array_key_exists('smart_way_certified', $data) ? true : false;
        $data['carb_compliant'] = array_key_exists('carb_compliant', $data) ? true : false;
        $data['use_dba_name'] = array_key_exists('use_dba_name', $data) ? true : false;
        $data['require_carrier_agreement'] = array_key_exists('require_carrier_agreement', $data) ? true : false;
        $data['flagged'] = array_key_exists('flagged', $data) ? true : false;

        $carrier = Carrier::create($data);

        Document::create('Mc_Authority', $data['Mc_Authority'], $data['company_id'], $carrier->id);
        Document::create('Insurance', $data['Insurance'], $data['company_id'], $carrier->id);
        Document::create('W9', $data['W9'], $data['company_id'], $carrier->id);
        Document::create('Payment_document', $data['Payment_document'], $data['company_id'], $carrier->id);

        return redirect('invite-carrier-success');
    }

    public function successPage(){
        return view('carrier-invite.success');
    }
}
