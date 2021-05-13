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
        $company_id  = \App::make('currentCompany')->id;
        $request->validate([
            'status'          => ['required', 'string', Rule::in(['Active', 'Inactive'])],
            'company'         => ['required', 'string', 'max:255',
                                  Rule::unique('customers')->where(function ($query) use($request, $company_id) {
                                      return $query->where('company', $request->company)
                                          ->where('company_id', $company_id);
                                  }),
            ],
            'phone'           => ['required', 'string', 'max:255',
                                  Rule::unique('customers')->where(function ($query) use($request, $company_id) {
                                      return $query->where('phone', $request->phone)
                                          ->where('company_id', $company_id);
                                  }),
            ],
            'address1'        => ['required', 'string', 'max:255',
                                  Rule::unique('customers')->where(function ($query) use($request, $company_id) {
                                      return $query->where('address1', $request->address1)
                                          ->where('company_id', $company_id);
                                  }),
            ],
            'address2'        => ['nullable', 'string', 'max:255',
                                  Rule::unique('customers')->where(function ($query) use($request, $company_id) {
                                      return $query->where('address2', $request->address2)
                                          ->where('company_id', $company_id);
                                  }),
            ],
            'phone_extension' => ['nullable', 'string', 'max:255'],
            'fax'             => ['nullable', 'string', 'max:255',
                                  Rule::unique('customers')->where(function ($query) use($request, $company_id) {
                                      return $query->where('fax', $request->fax)
                                          ->where('company_id', $company_id);
                                  }),
            ],
            'city'            => ['required', 'string', 'max:255'],
            'email'           => ['required', 'email',
                                  Rule::unique('customers')->where(function ($query) use($request, $company_id) {
                                      return $query->where('email', $request->email)
                                          ->where('company_id', $company_id);
                                  }),
            ],
            'state'           => ['required', 'string'],
            'zip_code'        => ['required', 'string'],
            'credit_limit'    => ['required', 'integer'],
            'currency'        => ['required', 'string', 'max:20', Rule::in(['USD', 'CAD', 'MXN'])],
            'note'            => ['nullable', 'string', 'max:1000'],

            'billing_company'         => ['required', 'string', 'max:255',
                                          Rule::unique('customers')->where(function ($query) use($request, $company_id) {
                                              return $query->where('billing_company', $request->billing_company)
                                                  ->where('company_id', $company_id);
                                          }),
            ],
            'billing_phone'           => ['required', 'string', 'max:255',
                                          Rule::unique('customers')->where(function ($query) use($request, $company_id) {
                                              return $query->where('billing_phone', $request->billing_phone)
                                                  ->where('company_id', $company_id);
                                          }),
            ],
            'billing_address1'        => ['required', 'string', 'max:255',
                                          Rule::unique('customers')->where(function ($query) use($request, $company_id) {
                                              return $query->where('billing_address1', $request->billing_address1)
                                                  ->where('company_id', $company_id);
                                          }),
            ],
            'billing_address2'        => ['nullable', 'string', 'max:255',
                                          Rule::unique('customers')->where(function ($query) use($request, $company_id) {
                                              return $query->where('billing_address2', $request->billing_address2)
                                                  ->where('company_id', $company_id);
                                          }),
            ],
            'billing_phone_extension' => ['nullable', 'string', 'max:255'],
            'billing_fax'             => ['nullable', 'string', 'max:255',
                                          Rule::unique('customers')->where(function ($query) use($request, $company_id) {
                                              return $query->where('billing_fax', $request->billing_fax)
                                                  ->where('company_id', $company_id);
                                          }),
            ],
            'billing_city'            => ['required', 'string', 'max:255'],
            'billing_state'           => ['required', 'string'],
            'billing_zip_code'        => ['required', 'string'],
        ]);
        $data = $request->all();
        $data['company_id'] = $company_id;

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
    public function update($company_id, Request $request, Customer $customer)
    {
        $request->validate([
            'status'          => ['required', 'string', Rule::in(['Active', 'Inactive'])],
            'company'         => ['required', 'string', 'max:255',
                                  Rule::unique('customers')->where(function ($query) use($request, $company_id, $customer) {
                                      return $query->where('company', $request->company)
                                          ->where('company_id', $company_id)
                                          ->where('id', "!=" , $customer->id);
                                  }),
            ],
            'phone'           => ['required', 'string', 'max:255',
                                  Rule::unique('customers')->where(function ($query) use($request, $company_id, $customer) {
                                      return $query->where('phone', $request->phone)
                                          ->where('company_id', $company_id)
                                          ->where('id', "!=" , $customer->id);
                                  }),
            ],
            'address1'        => ['required', 'string', 'max:255',
                                  Rule::unique('customers')->where(function ($query) use($request, $company_id, $customer) {
                                      return $query->where('address1', $request->address1)
                                          ->where('company_id', $company_id)
                                          ->where('id', "!=" , $customer->id);
                                  }),
            ],
            'address2'        => ['nullable', 'string', 'max:255',
                                  Rule::unique('customers')->where(function ($query) use($request, $company_id, $customer) {
                                      return $query->where('address2', $request->address2)
                                          ->where('company_id', $company_id)
                                          ->where('id', "!=" , $customer->id);
                                  }),
            ],
            'phone_extension' => ['nullable', 'string', 'max:255'],
            'fax'             => ['nullable', 'string', 'max:255',
                                  Rule::unique('customers')->where(function ($query) use($request, $company_id, $customer) {
                                      return $query->where('fax', $request->fax)
                                          ->where('company_id', $company_id)
                                          ->where('id', "!=" , $customer->id);
                                  }),
            ],
            'city'            => ['required', 'string', 'max:255'],
            'email'           => ['required', 'email', 'max:255',
                                  Rule::unique('customers')->where(function ($query) use($request, $company_id, $customer) {
                                      return $query->where('email', $request->email)
                                          ->where('company_id', $company_id)
                                          ->where('id', "!=" , $customer->id);
                                  }),
            ],
            'state'           => ['required', 'string'],
            'zip_code'        => ['required', 'string'],
            'credit_limit'    => ['required', 'integer'],
            'currency'        => ['required', 'string', 'max:20', Rule::in(['USD', 'CAD', 'MXN'])],
            'note'            => ['nullable', 'string', 'max:1000'],

            'billing_company'         => ['required', 'string', 'max:255',
                                          Rule::unique('customers')->where(function ($query) use($request, $company_id, $customer) {
                                              return $query->where('billing_company', $request->billing_company)
                                                  ->where('company_id', $company_id)
                                                  ->where('id', "!=" , $customer->id);
                                          }),
            ],
            'billing_phone'           => ['required', 'string', 'max:255',
                                          Rule::unique('customers')->where(function ($query) use($request, $company_id, $customer) {
                                              return $query->where('billing_phone', $request->billing_phone)
                                                  ->where('company_id', $company_id)
                                                  ->where('id', "!=" , $customer->id);
                                          }),
            ],
            'billing_address1'        => ['required', 'string', 'max:255',
                                          Rule::unique('customers')->where(function ($query) use($request, $company_id, $customer) {
                                              return $query->where('billing_address1', $request->billing_address1)
                                                  ->where('company_id', $company_id)
                                                  ->where('id', "!=" , $customer->id);
                                          }),
            ],
            'billing_address2'        => ['nullable', 'string', 'max:255',
                                          Rule::unique('customers')->where(function ($query) use($request, $company_id, $customer) {
                                              return $query->where('billing_address2', $request->billing_address2)
                                                  ->where('company_id', $company_id)
                                                  ->where('id', "!=" , $customer->id);
                                          }),
            ],
            'billing_phone_extension' => ['nullable', 'string', 'max:255'],
            'billing_fax'             => ['nullable', 'string', 'max:255',
                                          Rule::unique('customers')->where(function ($query) use($request, $company_id, $customer) {
                                              return $query->where('billing_fax', $request->billing_fax)
                                                  ->where('company_id', $company_id)
                                                  ->where('id', "!=" , $customer->id);
                                          }),
            ],
            'billing_city'            => ['required', 'string', 'max:255'],
            'billing_state'           => ['required', 'string'],
            'billing_zip_code'        => ['required', 'string'],
        ]);

        $data = $request->all();
        $customer->update($data);

        return redirect(\App::make('currentCompany')->id.'/customers/'.$customer->id)->withInput()->with('success', 'Customer Edited successfully');
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
}
