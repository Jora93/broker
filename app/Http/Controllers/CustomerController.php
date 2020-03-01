<?php

namespace App\Http\Controllers;

use App\Customer;
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
        $this->middleware(['auth', 'adminAndSupport']);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::get();
        return response()->view('customer.index', ['customers' => json_decode($customers)], 200);
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
            'company'        => ['required', 'string', 'max:255'],
            'status'         => ['required', 'string', Rule::in(['Active', 'Inactive'])],
            'phone'          => ['required', 'string', 'max:255'],
            'address'        => ['required', 'string', 'max:255'],
            'product'        => ['required', 'string', 'max:255'],
            'currency'       => ['required', 'string', 'max:255'],
            'creditLimit'    => ['required', 'integer'],
            'billingCompany' => ['required', 'string', 'max:255'],
            'billingPhone'   => ['required', 'string', 'max:255'],
            'billingAddress' => ['required', 'string', 'max:255']
        ]);
        $data = $request->all();
        $data['smartWayCarriersPreferred'] = array_key_exists('smartWayCarriersPreferred', $data) ? true : false;
        $customer = Customer::create($data);

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
     * @param \App\Customer $customer
     *
     * @return void
     */
    public function edit(Customer $customer)
    {
        return response()->view('customer.edit', ['customer' =>$customer], 200);
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
            'company'        => ['required', 'string', 'max:255'],
            'status'         => ['required', 'string', Rule::in(['Active', 'Inactive'])],
            'phone'          => ['required', 'string', 'max:255'],
            'address'        => ['required', 'string', 'max:255'],
            'product'        => ['required', 'string', 'max:255'],
            'currency'       => ['required', 'string', 'max:255'],
            'creditLimit'    => ['required', 'integer'],
            'billingCompany' => ['required', 'string', 'max:255'],
            'billingPhone'   => ['required', 'string', 'max:255'],
            'billingAddress' => ['required', 'string', 'max:255']
        ]);
        $data = $request->all();
        $data['smartWayCarriersPreferred'] = array_key_exists('smartWayCarriersPreferred', $data) ? true : false;
        $customer->update($data);
        return back()->with(['customer' => $customer]);
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
        $customer->delete();
        return back();
    }
}
