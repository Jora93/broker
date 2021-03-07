<?php

namespace App\Http\Controllers;

use App\Customer;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['adminAndSupport']);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::where('company_id', \App::make('currentCompany')->id)->get();
        return response()->view('customer.index', ['customers' => $customers], 200);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            'status'          => ['required', 'string', Rule::in(['Active', 'Inactive'])],
            'company'         => ['required', 'string', 'max:255', 'unique:customers,company'],
            'phone'           => ['required', 'string', 'max:255', 'unique:customers,phone'],
            'address1'        => ['required', 'string', 'max:255', 'unique:customers,address1'],
            'address2'        => ['string', 'max:255', 'unique:customers,address2'],
            'phone_extension' => ['string', 'max:255'],
            'fax'             => ['string', 'max:255', 'unique:customers,fax'],
            'city'            => ['required', 'string', 'max:255'],
            'email'           => ['required', 'email', 'unique:customers,email'],
            'state'           => ['required', 'string'],
            'zip_code'        => ['required', 'string'],
            'credit_limit'    => ['required', 'integer'],
            'currency'        => ['required', 'string', 'max:20', Rule::in(['USD', 'CAD', 'MXN'])],
            'note'            => ['string', 'max:1000'],

            'billing_company'         => ['required', 'string', 'max:255', 'unique:customers,company'],
            'billing_phone'           => ['required', 'string', 'max:255', 'unique:customers,phone'],
            'billing_address1'        => ['required', 'string', 'max:255', 'unique:customers,address1'],
            'billing_address2'        => ['string', 'max:255', 'unique:customers,address2'],
            'billing_phone_extension' => ['string', 'max:255'],
            'billing_fax'             => ['string', 'max:255', 'unique:customers,fax'],
            'billing_city'            => ['required', 'string', 'max:255'],
            'billing_state'           => ['required', 'string'],
            'billing_zip_code'        => ['required', 'string'],
        ]);
        $data = $request->all();
        $data['company_id'] = \App::make('currentCompany')->id;

        $customer = Customer::create($data);
        return redirect($data['company_id'].'/customers/'.$customer->id)->withInput()->with('success', 'Customer Edited successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($customer_id, Customer $customer)
    {
        return response()->view('customer.show', ['customer' => $customer], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Customer $customer
     *
     * @return void
     */
    public function edit($customer_id, Customer $customer)
    {
        return response()->view('customer.edit', ['customer' => $customer], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Customer            $customer
     *
     * @return void
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'status'          => ['required', 'string', Rule::in(['Active', 'Inactive'])],
            'company'         => ['required', 'string', 'max:255', 'unique:customers,company,'.$customer->id],
            'phone'           => ['required', 'string', 'max:255', 'unique:customers,phone,'.$customer->id],
            'address1'        => ['required', 'string', 'max:255', 'unique:customers,address1,'.$customer->id],
            'address2'        => ['string', 'max:255', 'unique:customers,address2,'.$customer->id],
            'phone_extension' => ['string', 'max:255'],
            'fax'             => ['string', 'max:255', 'unique:customers,fax,'.$customer->id],
            'city'            => ['required', 'string', 'max:255'],
            'email'           => ['required', 'email', 'unique:customers,email,'.$customer->id],
            'state'           => ['required', 'string'],
            'zip_code'        => ['required', 'string'],
            'credit_limit'    => ['required', 'integer'],
            'currency'        => ['required', 'string', 'max:20', Rule::in(['USD', 'CAD', 'MXN'])],
            'note'            => ['string', 'max:1000'],

            'billing_company'         => ['required', 'string', 'max:255', 'unique:customers,company,'.$customer->id],
            'billing_phone'           => ['required', 'string', 'max:255', 'unique:customers,phone,'.$customer->id],
            'billing_address1'        => ['required', 'string', 'max:255', 'unique:customers,address1,'.$customer->id],
            'billing_address2'        => ['string', 'max:255', 'unique:customers,address2,'.$customer->id],
            'billing_phone_extension' => ['string', 'max:255'],
            'billing_fax'             => ['string', 'max:255', 'unique:customers,fax,'.$customer->id],
            'billing_city'            => ['required', 'string', 'max:255'],
            'billing_state'           => ['required', 'string'],
            'billing_zip_code'        => ['required', 'string'],
        ]);

        $data = $request->all();
        $customer->update($data);

        return redirect('customers/'.$customer->id)->withInput()->with('success', 'Customer Edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Customer $customer
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Customer $customer)
    {
//        $customer->delete();
//
//        return back();
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $data = Customer::where('company', 'LIKE', '%'.$keyword.'%')->get();
        return response()->json(['data' => $data]);
    }
}
