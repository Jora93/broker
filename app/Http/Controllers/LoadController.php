<?php

namespace App\Http\Controllers;

use App\Dispatcher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Customer;
use App\Carrier;
use App\Load;
use App\Drop;
use App\LoadHistory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index($company_id)
    {
        $loads = Load::where('company_id', $company_id)->with(['customer', 'carrier', 'drops'])->orderBy('created_at', 'desc')->paginate(25);
        $dispatchers = Dispatcher::where('company_id', $company_id)->select('id', 'full_name')->get();

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
    public function create($company_id, Request $request)
    {
        $request->validate([
            "shipper_value" => ['nullable', 'integer'],
            "customerId" => ['required', 'exists:customers,id']
        ]);

        $custumer = Customer::find($request->customerId);
        $carriers = Carrier::where('company_id', $company_id)->get();
        $dispatchers = Dispatcher::where('company_id', $company_id)->select('id', 'full_name')->get();

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
    public function store($company_id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "carrier_id"                             => ['nullable', 'exists:carriers,id'],
            "customer_id"                            => ['required', 'exists:customers,id'],
            "dispatcher_id"                          => ['nullable', 'exists:dispatchers,id'],
            "status"                                 => ['nullable', 'string'],
            "product"                                => ['nullable', 'string'],
            "purchase_order_number"                  => ['nullable', 'string'],
            "trailer_size"                           => ['nullable', 'string'],
            "customer_costs_rate_per_unit"           => ['nullable', 'string'],
            "carrier_costs_rate_per_unit"            => ['nullable', 'string'],
            "shipper_company"                        => ['nullable', 'string'],
            "shipper_phone"                          => ['nullable', 'string'],
            "shipper_phone_extension"                => ['nullable', 'string'],
            "shipper_location_POS"                   => ['nullable', 'string'],
            "shipper_customer_POS"                   => ['nullable', 'string'],
            "shipper_address1"                       => ['nullable', 'string'],
            "shipper_fax"                            => ['nullable', 'string'],
            "shipper_address2"                       => ['nullable', 'string'],
            "shipper_quantity"                       => ['nullable', 'string'],
            "shipper_type"                           => ['nullable', 'string'],
            "shipper_city"                           => ['required', 'string'],
            "shipper_weight"                         => ['nullable', 'string'],
            "shipper_state"                          => ['required', 'string'],
            "shipper_value"                          => ['required', 'string'],
            "shipper_zip_code"                       => ['nullable', 'string'],
            "shipper_pickup_date"                    => ['required', 'string'],
            "shipper_pickup_time"                    => ['nullable', 'string'],
            "shipper_pickup_number"                  => ['nullable', 'string'],
            "shipper_notes"                          => ['nullable', 'string'],
            "consignee.*.company"                      => ['nullable', 'string'],
            "consignee.*.phone"                        => ['nullable', 'string'],
            "consignee.*.phone_extension"              => ['nullable', 'string'],
            "consignee.*.contact_name"                 => ['nullable', 'string'],
            "consignee.*.fax"                          => ['nullable', 'string'],
            "consignee.*.address1"                     => ['nullable', 'string'],
            "consignee.*.delivered_number"             => ['nullable', 'string'],
            "consignee.*.address2"                     => ['nullable', 'string'],
            "consignee.*.delivery_date"                => ['required', 'string'],
            "consignee.*.delivery_time"                => ['nullable', 'string'],
            "consignee.*.city"                         => ['nullable', 'string'],
            "consignee.*.delivery_state"               => ['nullable', 'string'],
            "consignee.*.BOL_payment_term"             => ['nullable', 'string'],
            "consignee.*.delivery_location_bol_number" => ['nullable', 'string'],
            "consignee.*.delivery_location_zip_code"   => ['nullable', 'string'],
            "consignee.*.freight_class"                => ['nullable', 'string'],
            "consignee.*.national_motor_freight_class" => ['nullable', 'string'],
            "consignee.*.bol_product"                  => ['nullable', 'string'],
            "consignee.*.delivery_location_quantity"   => ['nullable', 'string'],
            "consignee.*.item_type"                    => ['nullable', 'string'],
            "consignee.*.length"                       => ['nullable', 'string'],
            "consignee.*.width"                        => ['nullable', 'string'],
            "consignee.*.height"                       => ['nullable', 'string'],
            "consignee.*.delivery_location_weight"     => ['nullable', 'string'],
            "consignee.*.haz_mat"                      => ['nullable', 'string'],
            "consignee.*.bol_notes"                    => ['nullable', 'string'],
            "consignee.*.delivery_location_notes"      => ['nullable', 'string'],
            "truck_number"                           => ['nullable', 'string'],
            "trailer_number"                         => ['nullable', 'string'],
            "driver"                                 => ['nullable', 'string'],
            "driver_number"                          => ['nullable', 'string'],
            "pro_number"                             => ['nullable', 'string'],
            "driver_email"                           => ['nullable', 'email'],
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $data = $request->all();
        $dropsData =  $data['consignee'];
        unset($data['consignee']);
        $loadData = $data;
        $loadData['company_id'] = \App::make('currentCompany')->id;


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
    public function show($company_id, Load $load)
    {
        $load->drops;
        $load->histories;
        return response()->view('load.show', [
            'load' => $load,
            'carriers' => Carrier::get() //TODO make ajax elastic search
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Load $load
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($company_id, Load $load)
    {
        $load->drops;
        return response()->view('load.edit', [
            'load' => $load,
            'dispatchers' => Dispatcher::select('id', 'full_name')->get(),
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
    public function update($company_id, Request $request, Load $load)
    {
        $validator = Validator::make($request->all(), [
            "carrier_id"                             => ['nullable', 'exists:carriers,id'],
            "customer_id"                            => ['required', 'exists:customers,id'],
            "dispatcher_id"                          => ['nullable', 'exists:dispatchers,id'],
            "status"                                 => ['nullable', 'string'],
            "product"                                => ['nullable', 'string'],
            "purchase_order_number"                  => ['nullable', 'string'],
            "trailer_size"                           => ['nullable', 'string'],
            "customer_costs_rate_per_unit"           => ['nullable', 'string'],
            "carrier_costs_rate_per_unit"            => ['nullable', 'string'],
            "shipper_company"                        => ['nullable', 'string'],
            "shipper_phone"                          => ['nullable', 'string'],
            "shipper_phone_extension"                => ['nullable', 'string'],
            "shipper_location_POS"                   => ['nullable', 'string'],
            "shipper_customer_POS"                   => ['nullable', 'string'],
            "shipper_address1"                       => ['nullable', 'string'],
            "shipper_fax"                            => ['nullable', 'string'],
            "shipper_address2"                       => ['nullable', 'string'],
            "shipper_quantity"                       => ['nullable', 'string'],
            "shipper_type"                           => ['nullable', 'string'],
            "shipper_city"                           => ['required', 'string'],
            "shipper_weight"                         => ['nullable', 'string'],
            "shipper_state"                          => ['required', 'string'],
            "shipper_value"                          => ['required', 'string'],
            "shipper_zip_code"                       => ['nullable', 'string'],
            "shipper_pickup_date"                    => ['required', 'string'],
            "shipper_pickup_time"                    => ['nullable', 'string'],
            "shipper_pickup_number"                  => ['nullable', 'string'],
            "shipper_notes"                          => ['nullable', 'string'],
            "consignee.*.company"                      => ['nullable', 'string'],
            "consignee.*.phone"                        => ['nullable', 'string'],
            "consignee.*.phone_extension"              => ['nullable', 'string'],
            "consignee.*.contact_name"                 => ['nullable', 'string'],
            "consignee.*.fax"                          => ['nullable', 'string'],
            "consignee.*.address1"                     => ['nullable', 'string'],
            "consignee.*.delivered_number"             => ['nullable', 'string'],
            "consignee.*.address2"                     => ['nullable', 'string'],
            "consignee.*.delivery_date"                => ['required', 'string'],
            "consignee.*.delivery_time"                => ['nullable', 'string'],
            "consignee.*.city"                         => ['nullable', 'string'],
            "consignee.*.delivery_state"               => ['nullable', 'string'],
            "consignee.*.BOL_payment_term"             => ['nullable', 'string'],
            "consignee.*.delivery_location_bol_number" => ['nullable', 'string'],
            "consignee.*.delivery_location_zip_code"   => ['nullable', 'string'],
            "consignee.*.freight_class"                => ['nullable', 'string'],
            "consignee.*.national_motor_freight_class" => ['nullable', 'string'],
            "consignee.*.bol_product"                  => ['nullable', 'string'],
            "consignee.*.delivery_location_quantity"   => ['nullable', 'string'],
            "consignee.*.item_type"                    => ['nullable', 'string'],
            "consignee.*.length"                       => ['nullable', 'string'],
            "consignee.*.width"                        => ['nullable', 'string'],
            "consignee.*.height"                       => ['nullable', 'string'],
            "consignee.*.delivery_location_weight"     => ['nullable', 'string'],
            "consignee.*.haz_mat"                      => ['nullable', 'string'],
            "consignee.*.bol_notes"                    => ['nullable', 'string'],
            "consignee.*.delivery_location_notes"      => ['nullable', 'string'],
            "truck_number"                           => ['nullable', 'string'],
            "trailer_number"                         => ['nullable', 'string'],
            "driver"                                 => ['nullable', 'string'],
            "driver_number"                          => ['nullable', 'string'],
            "pro_number"                             => ['nullable', 'string'],
            "driver_email"                           => ['nullable', 'email'],
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
        if ($data['shipper_value'] != $load->shipper_value || $data['carrier_id'] != $load->carrier_id || $data['carrier_id'] != $load->customer_id) {
            $this->createHistory($data, $load);
            $data['changed'] = 1;
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

    public function search($company_id, Request $request)
    {
        $data = $request->all();
        $dispatchers = Dispatcher::where('company_id', $company_id)->get();

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

        if (isset($data['status']) && !is_null($data['status'])) {
            $loads->where('status', $data['status']);
        }

        $loads = $loads->with(['customer','carrier'])->orderBy('created_at', 'desc')->paginate($data['paginate']);

        return view('load.index', compact('loads', 'data', 'dispatchers'));
    }

    private function createHistory($data, $load)
    {
        $info = Auth::user()->email.' changed ';

        if ($data['carrier_id'] != $load->carrier_id) {
            $info = $info.'Carrier Id from '.$load->carrier_id.' to '.$data['carrier_id'].', ';
        }

        if ($data['carrier_id'] != $load->customer_id) {
            $info = $info.'Customer ID from '.$load->carrier_id.' to '.$data['carrier_id'].', ';
        }

        if ($data['shipper_pickup_date'] != $load->shipper_pickup_date || $data['shipper_pickup_time'] != $load->shipper_pickup_time) {
            $info = $info.'Pickup Date from '.$load->shipper_pickup_date.' '.$load->shipper_pickup_time.' to '.$data['shipper_pickup_date'].' '.$data['shipper_pickup_time'].', ';
        }

        if ($data['customer_costs_rate_per_unit'] != $load->customer_costs_rate_per_unit) {
            $info = $info.'Customer Rate from $'.$load->customer_costs_rate_per_unit.' to $'.$data['customer_costs_rate_per_unit'].', ';
        }

        if ($data['carrier_costs_rate_per_unit'] != $load->carrier_costs_rate_per_unit) {
            $info = $info.'Carrier Rate from $'.$load->carrier_costs_rate_per_unit.' to $'.$data['carrier_costs_rate_per_unit'].', ';
        }

        LoadHistory::create([
            'load_id' => $load->id,
            'user_id' => Auth::user()->id,
            'info' => $info
        ]);
    }

    public function accounting($company_id, Request $request)
    {
        $data = $request->all();
        $data['date_type'] = isset($data['date_type']) ? $data['date_type'] : 'shipDate';
        $data['paginate'] = isset($data['paginate']) ? $data['paginate'] : 25;
        $dispatchers = Dispatcher::where('company_id', $company_id)->get(['id', 'full_name']);
        $customers = Customer::where('company_id', $company_id)->get(['id', 'company']);
        $carriers = Carrier::where('company_id', $company_id)->get(['id', 'company']);
        $loads = Load::where('company_id', $company_id);
        if (isset($data['status']) && !is_null($data['status'])) {
            $loads->where('status', $data['status']);
        }

        if (isset($data['from']) && !is_null($data['from'])) {
            $from = Carbon::now()->subDays($data['from']);
            if ($data['date_type'] === 'shipDate') {
                $loads->whereDate('shipper_pickup_date', '<=',$from);
            } else {
                $loads->drops->whereDate('delivery_date', '<=',$from);
            }
        }

        if (isset($data['to']) && !is_null($data['to'])) {
            $to = Carbon::now()->subDays($data['to']);
            if ($data['date_type'] === 'shipDate') {
                $loads->whereDate('shipper_pickup_date', '>=',$to);
            } else {
                $loads->drops->whereDate('delivery_date', '>=',$to);
            }

        }

        if (isset($data['customer_id']) && !is_null($data['customer_id'])) {
            $loads->where('customer_id', $data['customer_id']);
        }

        if (isset($data['carrier_id']) && !is_null($data['carrier_id'])) {
            $loads->where('carrier_id', $data['carrier_id']);
        }

        if (isset($data['dispatcher_id']) && !is_null($data['dispatcher_id'])) {
            $loads->where('dispatcher_id', $data['dispatcher_id']);
        }

        if (isset($data['load_id']) && !is_null($data['load_id'])) {
            $loads->where('id', $data['load_id']);
        }

        $loads = $loads->orderBy('created_at', 'desc')->paginate($data['paginate']);

        return view('load.sales-summary', compact( 'dispatchers', 'data', 'customers', 'carriers', 'loads'));
    }
}
