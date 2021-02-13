<?php

namespace App\Http\Controllers;

use App\Dispatcher;
use Illuminate\Http\Request;
use App\Customer;
use App\Carrier;
use App\Load;

class LoadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loads = Load::with(['customer', 'carrier'])->orderBy('created_at', 'desc')->paginate(25);
        $dispatchers = Dispatcher::select('id', 'full_name')->get();

        return View('load.index')->with(['loads' => $loads, 'dispatchers' => $dispatchers]);
    }

    /**
     * Show the form for creating a new resource.
     * Todo add elastic search for carriers in blade
     * Todo add elastic search for choose carrier in modal
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            "shipper_value" => ['required', 'integer'],
            "customerId" => ['required', 'exists:customers,id']
        ]);

        $custumer = Customer::find($request->customerId);
        $carriers = Carrier::get();
        $dispatchers = Dispatcher::select('id', 'full_name')->get();

        return response()->view('load.crate', [
            'customer' => $custumer,
            'carriers' => $carriers,
            'dispatchers' => $dispatchers,
            'shipper_value' => $request->shipper_value
            ], 200);
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
            "carrier_id"                             => ['required', 'exists:carriers,id'],
            "customer_id"                            => ['required', 'exists:customers,id'],
            "dispatcher_id"                          => ['required', 'exists:dispatchers,id'],
            "shipper_company"                        => ['required', 'string'],
            "shipper_phone"                          => ['required', 'string'],
            "shipper_phone_extension"                => ['required', 'string'],
            "shipper_location_POS"                   => ['required', 'string'],
            "shipper_customer_POS"                   => ['required', 'string'],
            "shipper_address1"                       => ['required', 'string'],
            "shipper_fax"                            => ['required', 'string'],
            "shipper_address2"                       => ['required', 'string'],
            "shipper_quantity"                       => ['required', 'string'],
            "shipper_type"                           => ['required', 'string'],
            "shipper_city"                           => ['required', 'string'],
            "shipper_weight"                         => ['required', 'string'],
            "shipper_state"                          => ['required', 'string'],
            "shipper_value"                          => ['required', 'string'],
            "shipper_zip_code"                       => ['required', 'string'],
            "shipper_pickup_date"                    => ['required', 'string'],
            "shipper_pickup_time"                    => ['required', 'string'],
            "shipper_pickup_number"                  => ['required', 'string'],
            "shipper_notes"                          => ['required', 'string'],
            "consignee_company"                      => ['required', 'string'],
            "consignee_phone"                        => ['required', 'string'],
            "consignee_phone_extension"              => ['required', 'string'],
            "consignee_contact_name"                 => ['required', 'string'],
            "consignee_fax"                          => ['required', 'string'],
            "consignee_address1"                     => ['required', 'string'],
            "consignee_delivered_number"             => ['required', 'string'],
            "consignee_address2"                     => ['required', 'string'],
            "consignee_delivery_date"                => ['required', 'string'],
            "consignee_delivery_time"                => ['required', 'string'],
            "consignee_city"                         => ['required', 'string'],
            "consignee_delivery_state"               => ['required', 'string'],
            "consignee_BOL_payment_term"             => ['required', 'string'],
            "consignee_delivery_location_bol_number" => ['required', 'string'],
            "consignee_delivery_location_zip_code"   => ['required', 'string'],
            "consignee_freight_class"                => ['required', 'string'],
            "consignee_national_motor_freight_class" => ['required', 'string'],
            "consignee_bol_product"                  => ['required', 'string'],
            "consignee_delivery_location_quantity"   => ['required', 'string'],
            "consignee_item_type"                    => ['required', 'string'],
            "consignee_length"                       => ['required', 'string'],
            "consignee_width"                        => ['required', 'string'],
            "consignee_height"                       => ['required', 'string'],
            "consignee_delivery_location_weight"     => ['required', 'string'],
            "consignee_haz_mat"                      => ['required', 'string'],
            "consignee_bol_notes"                    => ['required', 'string'],
            "consignee_delivery_location_notes"      => ['required', 'string'],
            "truck_number"                           => ['required', 'string'],
            "trailer_number"                         => ['required', 'string'],
            "driver"                                 => ['required', 'string'],
            "driver_number"                          => ['required', 'string'],
            "pro_number"                             => ['required', 'string'],
            "driver_email"                           => ['required', 'email'],
            "carrier_costs_units_id"                 => ['required', 'string'],
            "carrier_costs_rate_per_unit"            => ['required', 'string'],
            "stops"                                  => ['required', 'string'],
            "cost_per_stop"                          => ['required', 'string'],
            "miles"                                  => ['required', 'string'],
            "fuel_surcharge_type"                    => ['required', 'string'],
            "driver_advance_gross"                   => ['required', 'string'],
        ]);

        $data = $request->all();
        $load = Load::create($data);

        return redirect('loads/'.$load->id)->withInput()->with('success', 'Load Created successfully');

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
     * @param \App\Load $load
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Load $load)
    {
        return response()->view('load.edit', [
            'load' => $load,
            'carriers' => Carrier::get() //TODO make ajax elastic search
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Load $load)
    {
//        dd($request->consignee_haz_mat);
        $request->validate([
            "carrier_id"                             => ['required', 'exists:carriers,id'],
            "customer_id"                            => ['required', 'exists:customers,id'],
            "dispatcher_id"                          => ['required', 'exists:dispatchers,id'],
            "shipper_company"                        => ['required', 'string'],
            "shipper_phone"                          => ['required', 'string'],
            "shipper_phone_extension"                => ['required', 'string'],
            "shipper_location_POS"                   => ['required', 'string'],
            "shipper_customer_POS"                   => ['required', 'string'],
            "shipper_address1"                       => ['required', 'string'],
            "shipper_fax"                            => ['required', 'string'],
            "shipper_address2"                       => ['required', 'string'],
            "shipper_quantity"                       => ['required', 'string'],
            "shipper_type"                           => ['required', 'string'],
            "shipper_city"                           => ['required', 'string'],
            "shipper_weight"                         => ['required', 'string'],
            "shipper_state"                          => ['required', 'string'],
            "shipper_value"                          => ['required', 'string'],
            "shipper_zip_code"                       => ['required', 'string'],
            "shipper_pickup_date"                    => ['required', 'string'],
            "shipper_pickup_time"                    => ['required', 'string'],
            "shipper_pickup_number"                  => ['required', 'string'],
            "shipper_notes"                          => ['required', 'string'],
            "consignee_company"                      => ['required', 'string'],
            "consignee_phone"                        => ['required', 'string'],
            "consignee_phone_extension"              => ['required', 'string'],
            "consignee_contact_name"                 => ['required', 'string'],
            "consignee_fax"                          => ['required', 'string'],
            "consignee_address1"                     => ['required', 'string'],
            "consignee_delivered_number"             => ['required', 'string'],
            "consignee_address2"                     => ['required', 'string'],
            "consignee_delivery_date"                => ['required', 'string'],
            "consignee_delivery_time"                => ['required', 'string'],
            "consignee_city"                         => ['required', 'string'],
            "consignee_delivery_state"               => ['required', 'string'],
            "consignee_BOL_payment_term"             => ['required', 'string'],
            "consignee_delivery_location_bol_number" => ['required', 'string'],
            "consignee_delivery_location_zip_code"   => ['required', 'string'],
            "consignee_freight_class"                => ['required', 'string'],
            "consignee_national_motor_freight_class" => ['required', 'string'],
            "consignee_bol_product"                  => ['required', 'string'],
            "consignee_delivery_location_quantity"   => ['required', 'string'],
            "consignee_item_type"                    => ['required', 'string'],
            "consignee_length"                       => ['required', 'string'],
            "consignee_width"                        => ['required', 'string'],
            "consignee_height"                       => ['required', 'string'],
            "consignee_delivery_location_weight"     => ['required', 'string'],
            "consignee_haz_mat"                      => ['string', 'nullable'],
            "consignee_bol_notes"                    => ['required', 'string'],
            "consignee_delivery_location_notes"      => ['required', 'string'],
            "truck_number"                           => ['required', 'string'],
            "trailer_number"                         => ['required', 'string'],
            "driver"                                 => ['required', 'string'],
            "driver_number"                          => ['required', 'string'],
            "pro_number"                             => ['required', 'string'],
            "driver_email"                           => ['required', 'email'],
            "carrier_costs_units_id"                 => ['required', 'string'],
            "carrier_costs_rate_per_unit"            => ['required', 'string'],
            "stops"                                  => ['required', 'string'],
            "cost_per_stop"                          => ['required', 'string'],
            "miles"                                  => ['required', 'string'],
            "fuel_surcharge_type"                    => ['required', 'string'],
            "driver_advance_gross"                   => ['required', 'string'],
        ]);

        $data = $request->all();
        $data['consignee_haz_mat'] = isset($data['consignee_haz_mat']) ? 1: 0;
        $load->update($data);

        return redirect('loads/')->withInput()->with('success', 'Load Updated successfully');
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

    public function search(Request $request)
    {
        $data = $request->all();
        $dispatchers = Dispatcher::get();

        $loads = Load::whereHas('customer', function ($query) use ($data) {
            if (isset($data['customer']) && !is_null($data['customer'])) {
                $query->where('company', 'LIKE', "%{$data['customer']}%");
            }
            if (isset($data['mc_number']) && !is_null($data['mc_number'])) {
                $query->where('mc_number', 'LIKE', "%{$data['mc_number']}%");
            }
        });

        if (isset($data['dispatcher_id']) && !is_null($data['dispatcher_id'])) {
            $loads->where('dispatcher_id', $data['dispatcher_id']);
        }

        if (isset($data['id']) && !is_null($data['id'])) {
            $loads->where('id', $data['id']);
        }

        $loads = $loads->with(['customer','carrier'])->orderBy('created_at', 'desc')->paginate($data['paginate']);

        return view('load.index', compact('loads', 'data', 'dispatchers'));
    }
}
