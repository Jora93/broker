<?php

namespace App\Http\Controllers;

use App\Dispatcher;
use Illuminate\Http\Request;
use App\Customer;
use App\Carrier;
use App\Load;
use App\Drop;
use Illuminate\Support\Facades\Validator;

class LoadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loads = Load::with(['customer', 'carrier', 'drops'])->orderBy('created_at', 'desc')->paginate(25);
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
        $validator = Validator::make($request->all(), [
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
            "consignee.*.company"                      => ['required', 'string'],
            "consignee.*.phone"                        => ['required', 'string'],
            "consignee.*.phone_extension"              => ['required', 'string'],
            "consignee.*.contact_name"                 => ['required', 'string'],
            "consignee.*.fax"                          => ['required', 'string'],
            "consignee.*.address1"                     => ['required', 'string'],
            "consignee.*.delivered_number"             => ['required', 'string'],
            "consignee.*.address2"                     => ['required', 'string'],
            "consignee.*.delivery_date"                => ['required', 'string'],
            "consignee.*.delivery_time"                => ['required', 'string'],
            "consignee.*.city"                         => ['required', 'string'],
            "consignee.*.delivery_state"               => ['required', 'string'],
            "consignee.*.BOL_payment_term"             => ['required', 'string'],
            "consignee.*.delivery_location_bol_number" => ['required', 'string'],
            "consignee.*.delivery_location_zip_code"   => ['required', 'string'],
            "consignee.*.freight_class"                => ['required', 'string'],
            "consignee.*.national_motor_freight_class" => ['required', 'string'],
            "consignee.*.bol_product"                  => ['required', 'string'],
            "consignee.*.delivery_location_quantity"   => ['required', 'string'],
            "consignee.*.item_type"                    => ['required', 'string'],
            "consignee.*.length"                       => ['required', 'string'],
            "consignee.*.width"                        => ['required', 'string'],
            "consignee.*.height"                       => ['required', 'string'],
            "consignee.*.delivery_location_weight"     => ['required', 'string'],
            "consignee.*.haz_mat"                      => ['required', 'string'],
            "consignee.*.bol_notes"                    => ['required', 'string'],
            "consignee.*.delivery_location_notes"      => ['required', 'string'],
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

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $data = $request->all();
        $dropsData =  $data['consignee'];
        unset($data['consignee']);
        $loadData = $data;

        $load = Load::create($loadData);

        foreach ($dropsData as $key => $dropData) {
            $dropsData[$key]['load_id'] = $load->id;
        }
        Drop::insert($dropsData);

        return response()->json(['success' => 'Load Created successfully']);
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
        $load->drops;
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
        $validator = Validator::make($request->all(), [
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
            "consignee.*.is_new"                     => ['required'],
            "consignee.*.company"                      => ['required', 'string'],
            "consignee.*.phone"                        => ['required', 'string'],
            "consignee.*.phone_extension"              => ['required', 'string'],
            "consignee.*.contact_name"                 => ['required', 'string'],
            "consignee.*.fax"                          => ['required', 'string'],
            "consignee.*.address1"                     => ['required', 'string'],
            "consignee.*.delivered_number"             => ['required', 'string'],
            "consignee.*.address2"                     => ['required', 'string'],
            "consignee.*.delivery_date"                => ['required', 'string'],
            "consignee.*.delivery_time"                => ['required', 'string'],
            "consignee.*.city"                         => ['required', 'string'],
            "consignee.*.delivery_state"               => ['required', 'string'],
            "consignee.*.BOL_payment_term"             => ['required', 'string'],
            "consignee.*.delivery_location_bol_number" => ['required', 'string'],
            "consignee.*.delivery_location_zip_code"   => ['required', 'string'],
            "consignee.*.freight_class"                => ['required', 'string'],
            "consignee.*.national_motor_freight_class" => ['required', 'string'],
            "consignee.*.bol_product"                  => ['required', 'string'],
            "consignee.*.delivery_location_quantity"   => ['required', 'string'],
            "consignee.*.item_type"                    => ['required', 'string'],
            "consignee.*.length"                       => ['required', 'string'],
            "consignee.*.width"                        => ['required', 'string'],
            "consignee.*.height"                       => ['required', 'string'],
            "consignee.*.delivery_location_weight"     => ['required', 'string'],
            "consignee.*.haz_mat"                      => ['required', 'string'],
            "consignee.*.bol_notes"                    => ['required', 'string'],
            "consignee.*.delivery_location_notes"      => ['required', 'string'],
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

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $data = $request->all();
        $dropsData =  $data['consignee'];
        unset($data['consignee']);
        $newDrops = [];

        foreach ($dropsData as $key => $dropData) {
            $dropsData[$key]['haz_mat'] = isset($dropsData[$key]['haz_mat']) ? 1: 0;
            $dropsData[$key]['load_id'] = $load->id;
            if ($dropData['is_new'] === 'false') {
                unset($dropData['is_new']);
                Drop::find($dropData['id'])->update($dropData);
            } else {
                unset($dropData['is_new']);
                $dropData['load_id'] = $load->id;
                $newDrops[] = $dropData;
            }
        }
        if (!empty($newDrops)) {
            Drop::insert($newDrops);
        }

        $load->update($data);

        return response()->json(['success' => 'Load Created successfully']);
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
