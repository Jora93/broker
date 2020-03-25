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

        return response()->view('carrier.index', ['carriers' => json_decode($carriers)], 200);
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
        dd($request->all());
        $request->validate([
            'company'      => ['required', 'string', 'max:255'],
            'status'       => ['required', 'string', Rule::in(['Active', 'Inactive'])],
            'phone'        => ['required', 'string', 'max:255'],
            'fax'          => ['nullable', 'string', 'max:255'],
            'address'      => ['required', 'string', 'max:255'],
            'currency'     => ['required', 'string', 'max:255'],
            'payeeCompany' => ['required', 'string', 'max:255'],
            'payeePhone'   => ['nullable', 'string', 'max:255'],
            'payeeAddress' => ['required', 'string', 'max:255'],
            'mcNumber'     => ['required', 'string', 'max:255'],
            'dotNumber'    => ['integer', 'string'],
        ]);
        $data = $request->all();
        $data['preferredCarrierStatus'] = array_key_exists('preferredCarrierStatus', $data) ? true : false;
        $data['smartwayCertified'] = array_key_exists('smartwayCertified', $data) ? true : false;

        $carriers = Carrier::get();

        return response()->view('carrier.index', ['carriers' => json_decode($carriers)], 200);
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
        return response()->view('carrier.show', [], 200);

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
            'company'      => ['required', 'string', 'max:255'],
            'status'       => ['required', 'string', Rule::in(['Active', 'Inactive'])],
            'phone'        => ['required', 'string', 'max:255'],
            'fax'          => ['nullable', 'string', 'max:255'],
            'address'      => ['required', 'string', 'max:255'],
            'currency'     => ['required', 'string', 'max:255'],
            'payeeCompany' => ['required', 'string', 'max:255'],
            'payeePhone'   => ['nullable','string', 'max:255'],
            'payeeAddress' => ['required', 'string', 'max:255'],
            'mcNumber'     => ['required', 'string', 'max:255'],
            'dotNumber'    => ['integer', 'string'],
        ]);
        $data = $request->all();
        $data['preferredCarrierStatus'] = array_key_exists('preferredCarrierStatus', $data) ? true : false;
        $data['smartwayCertified'] = array_key_exists('smartwayCertified', $data) ? true : false;

        $carrier->update($data);

        return back()->with(['carrier' => $carrier]);
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
