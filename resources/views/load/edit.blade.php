@extends('layouts.app')
<script>
    window.editStopIndex = '{!! count($load->drops) !!}';
</script>

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div id="ajaxErrorContainer" class="col-sm-12"></div>
    <div class="col-sm-12 load-short-info"><br>
        <div class="col-sm-2">
            <span># {{$load->load_number}}</span>
        </div>
        <div class="col-sm-2">
            <span>Invoice#: @if(isset($load->invoice_number)){{$load->invoice_number}}@endif</span>
        </div>
        <div class="col-sm-4">
            <span>Carrier: @if(isset($load->carrier)){{$load->carrier->company}}@endif</span>
        </div>
        <div class="col-sm-4">
            <span>Customer: {{$load->customer->company}}</span>
        </div>
        <br>
    </div>
    <div class="col-sm-12 loads-show">
        <form method="post" id="loadEditForm" action="{{ url(\App::make('currentCompany')->id.'/loads/'.$load->id) }}" class="col-sm-12">
            @method('PATCH')
            @csrf
            <input type="hidden" id="load_id" name="Load_id" value="{{$load->id}}">
            <div class="row" style="background-color:#ddd;width:100%;padding:5px;border:1px solid #999;border-radius:3px;margin:auto auto 10px auto;">
                <div class="col-md-6" style="padding-right:0px;">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="entityLabelValue form-group">
                            <div class="entityLabel">Status</div>
                            <select id="loadStatusSelect" name="status" class="form-control editMainField input-sm" tabindex="1">
                                <option @if($load->status == "Available") selected @endif value="Available">Available</option>
                                <option @if($load->status == "Invoiced") selected @endif value="Invoiced">Invoiced</option>
                                <option @if($load->status == "Committed") selected @endif value="Committed">Committed</option>
                                <option @if($load->status == "Assigned") selected @endif value="Assigned">Assigned</option>
                                <option @if($load->status == "Dispatched") selected @endif value="Dispatched">Dispatched</option>
                                <option @if($load->status == "Picked Up") selected @endif value="Picked Up">Picked Up</option>
                                <option @if($load->status == "Enroute") selected @endif value="Enroute">Enroute</option>
                                <option @if($load->status == "Delivered") selected @endif value="Delivered">Delivered</option>
                                <option @if($load->status == "Ready to Invoice") selected @endif value="Ready to Invoice">Ready to Invoice</option>
                                <option @if($load->status == "Paid Carrier") selected @endif value="Paid Carrier">Paid Carrier</option>
                                <option @if($load->status == "Paid Customer") selected @endif value="Paid Customer">Paid Customer</option>
                                <option @if($load->status == "Completed") selected @endif value="Completed">Completed</option>
                                <option @if($load->status == "Voided") selected @endif value="Voided">Voided</option>
                                <option @if($load->status == "Pending") selected @endif value="Pending">Pending</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="entityLabelValue form-group">
                            <div class="entityLabel">Product</div>
                            <input id="product" name="product" title="" value="{{$load->product}}" class="form-control input-sm editMainField">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="entityLabelValue form-group">
                            <div class="entityLabel">PO Number</div>
                            <input id="po_number" name="purchase_order_number" title="" value="{{$load->purchase_order_number}}" class="form-control input-sm editMainField">
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="padding-left:0px;">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="entityLabelValue form-group carrierEquipmentMsg">
                            <div class="entityLabel">Carrier Equipment</div>
                            <select name="carrier_equipment_id" class="form-control input-sm editMainField checkLaneMaster" tabindex="5">
                                <option selected="" value="">Select Equipment</option>
                                <option @if($load->carrier_equipment_id == "Straight Box Truck") selected @endif value="Straight Box Truck">Straight Box Truck</option>
                                <option @if($load->carrier_equipment_id == "Van") selected @endif value="Van">Van</option>
                                <option @if($load->carrier_equipment_id == "Van or Flatbed") selected @endif value="Van or Flatbed">Van or Flatbed</option>
                                <option @if($load->carrier_equipment_id == "Van or Reffer") selected @endif value="Van or Reffer">Van or Reffer</option>
                                <option @if($load->carrier_equipment_id == "Reefer") selected @endif value="Reefer">Reefer</option>
                                <option @if($load->carrier_equipment_id == "Hot Shot") selected @endif value="Hot Shot">Hot Shot</option>
                                <option @if($load->carrier_equipment_id == "Stepdeck") selected @endif value="Stepdeck">Stepdeck</option>
                                <option @if($load->carrier_equipment_id == "Flatbed") selected @endif value="Flatbed">Flatbed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="entityLabelValue form-group">
                            <div class="entityLabel">Trailer Size</div>
                            <select name="trailer_size" class="form-control editMainField" tabindex="7">
                                <option value="">Select Size</option>
                                <option @if($load->trailer_size == "20' Std.") selected @endif value="20' Std.">20' Std.</option>
                                <option @if($load->trailer_size == "20' H.C.") selected @endif value="20' H.C.">20' H.C.</option>
                                <option @if($load->trailer_size == "22'") selected @endif value="22'">22'</option>
                                <option @if($load->trailer_size == "24'") selected @endif value="24'">24'</option>
                                <option @if($load->trailer_size == "26'") selected @endif value="26'">26'</option>
                                <option @if($load->trailer_size == "28'") selected @endif value="28'">28'</option>
                                <option @if($load->trailer_size == "32'") selected @endif value="32'">32'</option>
                                <option @if($load->trailer_size == "40'") selected @endif value="40'">40'</option>
                                <option @if($load->trailer_size == "40' Std.") selected @endif value="40' Std.">40' Std.</option>
                                <option @if($load->trailer_size == "40' H.C.") selected @endif value="40' H.C.">40' H.C.</option>
                                <option @if($load->trailer_size == "43'") selected @endif value="43'">43'</option>
                                <option @if($load->trailer_size == "45'") selected @endif value="45'">45'</option>
                                <option @if($load->trailer_size == "45' H.C.") selected @endif value="45' H.C.">45' H.C.</option>
                                <option @if($load->trailer_size == "46'") selected @endif value="46'">46'</option>
                                <option @if($load->trailer_size == "48'") selected @endif value="48'">48'</option>
                                <option @if($load->trailer_size == "52'") selected @endif value="52'">52'</option>
                                <option @if($load->trailer_size == "53'") selected @endif value="53'">53'</option>
                                <option @if($load->trailer_size == "57'") selected @endif value="57'">57'</option>
                                <option @if($load->trailer_size == "Oversize") selected @endif value="Oversize">Oversize</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="entityLabelValue form-group">
                            <div class="entityLabel">Dispatcher</div>
                            <select id="dispatcherUserSelect" name="dispatcher_id" value="{{old('dispatcher_id')}}" class="form-control editMainField" tabindex="66">
                                @if($load->dispatcher_id)
                                    <option selected value="{{$load->dispatcher->id}}">{{$load->dispatcher->full_name}}</option>
                                @else
                                    <option value="">-- No Dispatcher Selected --</option>
                                @endif

                            @if(!$dispatchers->isEmpty())
                                    @foreach($dispatchers as $dispatcher)
                                        <option @if($load->dispatcher_id == $dispatcher->id) selected @endif value="{{$dispatcher->id}}">{{$dispatcher->full_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="entityLabelValue form-group">
                            <div class="entityLabel">Customer</div>
                            <select id="customerSelect" name="customer_id" value="{{old('customer_id')}}" class="form-control editMainField" tabindex="66">
                                <option value="">-- No Dispatcher Selected --</option>
                                @if(!$customers->isEmpty())
                                    @foreach($customers as $customer)
                                        <option @if($load->customer_id == $customer->id) selected @endif value="{{$customer->id}}">{{$customer->company}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="entityLabelValue form-group">
                            <div class="entityLabel">Load Notes</div>
                            <textarea class="form-control" name="note" placeholder="Enter a note" rows="2" tabindex="15">{{$load->note}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" id="voided-reason-container" @if($load->status !== 'Voided') style="display: none" @endif>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="entityLabelValue form-group">
                            <div class="entityLabel">Voided Reason</div>
                            <input id="po_number" name="voided_reason" title="" value="{{$load->voided_reason}}" class="form-control input-sm editMainField">
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item col-sm-2 load-tab">
                    <a class="nav-link active" id="load-tab" data-toggle="tab" href="#load" role="tab" aria-controls="load" aria-selected="true">Load</a>
                </li>
                <li class="nav-item col-sm-2 customers-tab">
                    <a class="nav-link" id="customer-tab" data-toggle="tab" href="#customers" role="tab" aria-controls="customers" aria-selected="false">Customers</a>
                </li>
                <li class="nav-item col-sm-2 carrier-tab">
                    <a class="nav-link" id="carrier-tab" data-toggle="tab" href="#carriers" role="tab" aria-controls="carriers" aria-selected="false">Carrier</a>
                </li>
                <li class="nav-item col-sm-2 accounting-tab">
                    <a class="nav-link" id="accounting-tab" data-toggle="tab" href="#accounting" role="tab" aria-controls="accounting" aria-selected="false">Accounting</a>
                </li>
                <li class="nav-item col-sm-2 documents-tab">
                    <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents" aria-selected="false">Documents</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="load" role="tabpanel" aria-labelledby="load-tab">
                    <div id="load" class="tabcontent" style="display: block;">
                        <div class="row">
                            <div class="col-sm-12 shipper-cards">
                                <div class="col-sm-6 shipper-info">
                                    <div class="tab-item">
                                        <div class="card">
                                            <div class="card-header">Shipper Information</div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Company</label>
                                                            <input class="form-control" placeholder="Enter company"  type="text" name="shipper_company" value="{{old('shipper_company', $load->shipper_company)}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Phone</label>
                                                            <input type="text" name="shipper_phone" value="{{old('shipper_phone', $load->shipper_phone)}}" class="form-control phoneMask" placeholder="Enter phone number">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Extension</label>
                                                            <input type="text" name="shipper_phone_extension" value="{{old('shipper_phone_extension', $load->shipper_phone_extension)}}" class="form-control" placeholder="Enter extension">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Location PoC</label>
                                                            <input type="text" name="shipper_location_POS" value="{{old('shipper_location_POS', $load->shipper_location_POS)}}" class="form-control" placeholder="Enter point of contact">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Customer PoC</label>
                                                            <input type="text" name="shipper_customer_POS" value="{{old('shipper_customer_POS', $load->shipper_customer_POS)}}" class="form-control" placeholder="Enter point of customer">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div id="ship_location_address1Group" class="form-group">
                                                            <label class="control-label">Address 1</label>
                                                            <input type="text" name="shipper_address1" value="{{old('shipper_address1', $load->shipper_address1)}}" class="form-control" placeholder="Enter address">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Fax</label>
                                                            <input class="form-control phoneMask" placeholder="Enter fax number" type="text" name="shipper_fax" value="{{old('shipper_fax', $load->shipper_fax)}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Address 2</label>
                                                            <input type="text" name="shipper_address2" value="{{old('shipper_address2', $load->shipper_address2)}}" class="form-control" placeholder="Enter address">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3 col-xs-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Quantity</label>
                                                            <input type="text" name="shipper_quantity" value="{{old('shipper_quantity', $load->shipper_quantity)}}" class="form-control editMainField" placeholder="Enter quantity">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Type</label>
                                                            <select name="shipper_type" value="{{old('shipper_type', $load->shipper_type)}}" class="form-control">
                                                                <option>Select Type</option>
                                                                <option @if(old('shipper_type', $load->shipper_type) === 'Blueberries') selected @endif value="Blueberries">Blueberries</option>
                                                                <option @if(old('shipper_type', $load->shipper_type) === 'Boxes') selected @endif value="Boxes">Boxes</option>
                                                                <option @if(old('shipper_type', $load->shipper_type) === 'Carrier Fee') selected @endif value="Carrier Fee">Carrier Fee</option>
                                                                <option @if(old('shipper_type', $load->shipper_type) === 'Cartons') selected @endif value="Cartons">Cartons</option>
                                                                <option @if(old('shipper_type', $load->shipper_type) === 'CWT') selected @endif value="CWT">CWT</option>
                                                                <option @if(old('shipper_type', $load->shipper_type) === 'Flat Rate') selected @endif value="Flat Rate">Flat Rate</option>
                                                                <option @if(old('shipper_type', $load->shipper_type) === 'Miles') selected @endif value="Miles">Miles</option>
                                                                <option @if(old('shipper_type', $load->shipper_type) === 'Pallets') selected @endif value="Pallets">Pallets</option>
                                                                <option @if(old('shipper_type', $load->shipper_type) === 'Pounds') selected @endif value="Pounds">Pounds</option>
                                                                <option @if(old('shipper_type', $load->shipper_type) === 'Strawberries') selected @endif value="Strawberries">Strawberries</option>
                                                                <option @if(old('shipper_type', $load->shipper_type) === 'Tons') selected @endif value="Tons">Tons</option>
                                                                <option @if(old('shipper_type', $load->shipper_type) === 'Truck Ordered/Not Used') selected @endif value="Truck Ordered/Not Used">Truck Ordered/Not Used</option></select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">City*</label>
                                                            <input class="form-control" required="true" placeholder="Enter shipper city" type="text" name="shipper_city" value="{{old('shipper_city', $load->shipper_city)}}">
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Weight</label>
                                                            <input type="text" name="shipper_weight" value="{{old('shipper_weight', $load->shipper_weight)}}" class="form-control" placeholder="Enter weight">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">State/Province*</label><br>
                                                            <input required type="text" name="shipper_state" value="{{old('shipper_state', $load->shipper_state)}}" class="form-control" placeholder="Please Enter State/Province">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Value</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">$</span>
                                                                <input type="number" name="shipper_value" value="{{old('shipper_value', $load->shipper_value)}}" class="form-control" placeholder="Enter value">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="shipper_zip_code">Zip Code</label>
                                                            <input class="form-control requiredInputCustomer" placeholder="Enter zip code" type="text" name="shipper_zip_code" value="{{old('shipper_zip_code', $load->shipper_zip_code)}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xs-6">
                                                        <div id="insuranceEffectiveDateGroup" class="form-group">
                                                            <label class="control-label">Pickup Date*</label>
                                                            <div class="input-group date defaultDatePicker">
                                                                <input class="datepicker form-control" required="required" placeholder="Enter pichup date"  type="text" name="shipper_pickup_date" value="{{old('shipper_pickup_date', $load->shipper_pickup_date)}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Pickup #</label>
                                                            <input type="text" name="shipper_pickup_number" value="{{old('shipper_pickup_number', $load->shipper_pickup_number)}}" class="form-control editMainField" placeholder="Enter pickup number">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xs-6" style="padding: 0">
                                                        <div class="col-sm-8 col-xs-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Pickup Time</label>
                                                                <input type="text" name="shipper_pickup_time_from" class="form-control input-small time-picker-input" value="{{old('shipper_pickup_time_from', $load->shipper_pickup_time_from)}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 col-xs-4">
                                                            <div class="form-group">
                                                                <label class="control-label">APPT</label>
                                                                <input type="checkbox" @if(old('shipper_pickup_time_appt', $load->shipper_pickup_time_appt)) checked @endif name="shipper_pickup_time_appt">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">FCFS</label>
                                                                <input type="checkbox" @if(old('shipper_pickup_time_fcfs', $load->shipper_pickup_time_fcfs)) checked @endif name="shipper_pickup_time_fcfs">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Payment Method</label>
                                                            <select name="shipper_payment_method" value="{{$load->shipper_payment_method}}" class="shipper-payment-method form-control">
                                                                <option value="">Select Type</option>
                                                                <option @if($load->shipper_payment_method === 'NET 30 FACTORING') selected @endif value="NET 30 FACTORING">NET 30 FACTORING</option>
                                                                <option @if($load->shipper_payment_method === 'STANDARD ACH') selected @endif value="STANDARD ACH">STANDARD ACH</option>
                                                                <option @if($load->shipper_payment_method === 'STANDARD ZELLE PERSONAL') selected @endif value="STANDARD ZELLE PERSONAL">STANDARD ZELLE PERSONAL</option>
                                                                <option @if($load->shipper_payment_method === 'STANDARD ZELLE BUSINESS') selected @endif value="STANDARD ZELLE BUSINESS">STANDARD ZELLE BUSINESS</option>
                                                                <option @if($load->shipper_payment_method === 'QUICK PAY') selected @endif value="QUICK PAY">QUICK PAY</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 shipper-quick-pay-percent" @if($load->shipper_payment_method != 'QUICK PAY') style="display: none" @endif>
                                                        <div class="form-group">
                                                            <label class="control-label">%</label>
                                                            <input value="{{old('shipper_quick_pay_percent', $load->shipper_quick_pay_percent)}}"  class="form-control shipper-quick-pay-percent-value" name="shipper_quick_pay_percent" type="number" min="0" max="100">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8 shipper-factoring" @if($load->shipper_payment_method != 'NET 30 FACTORING') style="display: none" @endif>
                                                        <div class="form-group">
                                                            <label class="control-label">Factoring Name</label>
                                                            <input value="{{old('shipper_factoring', $load->shipper_factoring)}}" class="form-control shipper-factoring-value" name="shipper_factoring" type="text">
                                                        </div>
                                                        <p style="color: darkred">NOTE: Notice of Assignment (NOA) document required after 7 days from load creation.</p>
                                                    </div>
                                                    <div class="col-sm-8 shipper-factoring-ach-info" @if($load->shipper_payment_method != 'STANDARD ACH') style="display: none" @endif>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Account Number</label>
                                                                <input value="{{old('shipper_factoring_ach_account_number', $load->shipper_factoring_ach_account_number)}}"  class="form-control" name="shipper_factoring_ach_account_number" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Routing Number</label>
                                                                <input value="{{old('shipper_factoring_ach_routing_number', $load->shipper_factoring_ach_routing_number)}}"  class="form-control" name="shipper_factoring_ach_routing_number" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8 shipper-factoring-zelle-info" @if(!in_array($load->shipper_payment_method, ['STANDARD ZELLE PERSONAL','STANDARD ZELLE BUSINESS'])) style="display: none" @endif>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Zelle Phone Number</label>
                                                                <input value="{{old('shipper_factoring_zelle_phone', $load->shipper_factoring_zelle_phone)}}" class="form-control" name="shipper_factoring_zelle_phone" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Zelle Email</label>
                                                                <input value="{{old('shipper_factoring_zelle_email', $load->shipper_factoring_zelle_email)}}" class="form-control" name="shipper_factoring_zelle_email" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Pickup Note</label>
                                                            <textarea class="form-control editMainField" name="shipper_notes" placeholder="Enter pickup notes">{{old('shipper_notes', $load->shipper_notes)}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="tab-item">
                                        <div class="card">
                                            <div class="card-header">
                                                <span>Stops</span>
                                                <button style="float: right" type="button" class="btn btn-primary" aria-label="Left Align">
                                                    <span style="cursor:pointer" class="glyphicon glyphicon-plus pull-right" onclick="addEditStop()" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6" id="consigneeContainer">
                                    @foreach($load->drops as $key => $drop)
                                        <div class="tab-item consigneeItem" id="consigneeItem" >
                                            <input type="hidden" name='consignee[{{$key}}][is_new]' class="is_new" value="false">
                                            <input type="hidden" name='consignee[{{$key}}][id]'  value="{{$drop->id}}">
                                            <div class="card">
                                                <div class="card-header">
                                                    <span>Consignee Information</span>
                                                    <span style="cursor:pointer" class="glyphicon glyphicon-trash pull-right removeConsegneeItem" aria-hidden="true"></span>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <label class="control-label">Company</label>
                                                                    <input class="form-control consignee_company" placeholder="Enter company"  type="text" name="consignee[{{$key}}][company]" value="{{$drop->company}}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3 col-xs-3">
                                                            <div class="form-group">
                                                                <label class="control-label" for="customer_phone">Phone</label>
                                                                <input class="form-control requiredInputCustomer phoneMask consignee_phone" placeholder="Enter phone"  type="text" name="consignee[{{$key}}][phone]" value="{{$drop->phone}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 col-xs-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Extension</label>
                                                                <input class="form-control consignee_phone_extension" placeholder="Enter extension" type="text" name="consignee[{{$key}}][phone_extension]" value="{{$drop->phone_extension}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Contact</label>
                                                                <input type="text" name="consignee[{{$key}}][contact_name]" value="{{$drop->contact_name}}" class="form-control consignee_contact_name" placeholder="Enter point of contact" tabindex="234">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Fax</label>
                                                                <input type="text" name="consignee[{{$key}}][fax]" value="{{$drop->fax}}" class="form-control editMainField phoneMask consignee_fax" placeholder="Enter fax number">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Address 1</label>
                                                                <input type="text" name="consignee[{{$key}}][address1]" value="{{$drop->address1}}" class="form-control consignee_address1" placeholder="Enter address">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Delivery #</label>
                                                                <input type="text" name="consignee[{{$key}}][delivered_number]" value="{{$drop->delivered_number}}" class="consignee_delivered_number form-control editMainField" placeholder="Enter delivery number">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Address 2</label>
                                                                <input type="text" name="consignee[{{$key}}][address2]" value="{{$drop->address2}}" class="consignee_address2 form-control" placeholder="Enter address">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group deliveryLocationPickupAtMsg-1613">
                                                                <label class="control-label">Delivery Date*</label>
                                                                <div class="input-group date  defaultDatePicker">
                                                                    <input required="required" class="datepicker form-control consignee_delivery_date" placeholder="Enter delivery date"  type="text" name="consignee[{{$key}}][delivery_date]" value="{{$drop->delivery_date}}" min="{{date('Y-m-d')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div id="delivery_location_cityGroup" class="form-group deliveryLocationCityMsg-1613">
                                                                <label class="control-label">City</label>
                                                                <input class="form-control consignee_city" placeholder="Enter city"  type="text" name="consignee[{{$key}}][city]" value="{{$drop->city}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-6" style="padding: 0">
                                                            <div class="col-sm-8 col-xs-8">
                                                                <div class="form-group">
                                                                    <label class="control-label">Delivery Time</label>
                                                                    <input type="text" name="consignee[{{$key}}][delivery_time_from]" class="form-control input-small time-picker-input" value="{{$drop->delivery_time_from}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">State/Province</label><br>
                                                                <input type="text" name="consignee[{{$key}}][delivery_state]" value="{{$drop->delivery_state}}" class="form-control" placeholder="Please Enter State/Province">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-6">
                                                            <label class="control-label">BOL Payment Term</label>
                                                            <div class="form-group">
                                                                <select name="consignee[{{$key}}][BOL_payment_term]" value="{{$drop->BOL_payment_term}}" class="consignee_BOL_payment_term form-control">
                                                                    <option disabled selected value>--Select BOL Payment Term--</option>
                                                                    <option  @if($drop->BOL_payment_term === 'Prepaid') selected @endif value="Prepaid">Prepaid</option>
                                                                    <option  @if($drop->BOL_payment_term === 'Collect') selected @endif value="Collect">Collect</option>
                                                                    <option  @if($drop->BOL_payment_term === 'Third Party') selected @endif value="Third Party">Third Party</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Zip Code</label><br>
                                                                <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;">
                                                            <input type="text" name="consignee[{{$key}}][delivery_location_zip_code]" value="{{$drop->delivery_location_zip_code}}" class="consignee_delivery_location_zip_code form-control editMainField tt-input" placeholder="Enter zip code">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">BOL #</label>
                                                                <input type="text" name="consignee[{{$key}}][delivery_location_bol_number]" value="{{$drop->delivery_location_bol_number}}" class="consignee_delivery_location_bol_number form-control editMainField" placeholder="Enter BOL #" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row class-dimensions-row">
                                                        <div class="col-sm-12">
                                                            <table class="table table-class-dimensions">
                                                                <tbody>
{{--                                                                <tr>--}}
{{--                                                                    <th>Freight Class</th>--}}
{{--                                                                    <th>NMFC</th>--}}
{{--                                                                    <th>Product</th>--}}
{{--                                                                    <th>Qty</th>--}}
{{--                                                                    <th>Type</th>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <td class="freight-class-td-width">--}}
{{--                                                                        <select name="consignee[{{$key}}][freight_class]" id="freight-classes" class="consignee_freight_class form-control" tabindex="242">--}}
{{--                                                                            <option value="">Select Freight Class</option>--}}
{{--                                                                            <option @if($drop->freight_class === 'FAK') selected @endif value="FAK">FAK</option>--}}
{{--                                                                            <option @if($drop->freight_class === '50') selected @endif value="50">50</option>--}}
{{--                                                                            <option @if($drop->freight_class === '55') selected @endif value="55">55</option>--}}
{{--                                                                            <option @if($drop->freight_class === '60') selected @endif value="60">60</option>--}}
{{--                                                                            <option @if($drop->freight_class === '65') selected @endif value="65">65</option>--}}
{{--                                                                            <option @if($drop->freight_class === '70' ) selected @endif value="70">70</option>--}}
{{--                                                                            <option @if($drop->freight_class === '77.5') selected @endif value="77.5">77.5</option>--}}
{{--                                                                            <option @if($drop->freight_class === '85') selected @endif value="85">85</option>--}}
{{--                                                                            <option @if($drop->freight_class === '92.5') selected @endif value="92.5">92.5</option>--}}
{{--                                                                            <option @if($drop->freight_class === '100') selected @endif value="100">100</option>--}}
{{--                                                                            <option @if($drop->freight_class === '110') selected @endif value="110">110</option>--}}
{{--                                                                            <option @if($drop->freight_class === '125') selected @endif value="125">125</option>--}}
{{--                                                                            <option @if($drop->freight_class === '150') selected @endif value="150">150</option>--}}
{{--                                                                            <option @if($drop->freight_class === '175') selected @endif value="175">175</option>--}}
{{--                                                                            <option @if($drop->freight_class === '200') selected @endif value="200">200</option>--}}
{{--                                                                            <option @if($drop->freight_class === '250') selected @endif value="250">250</option>--}}
{{--                                                                            <option @if($drop->freight_class === '300') selected @endif value="300">300</option>--}}
{{--                                                                            <option @if($drop->freight_class === '400') selected @endif value="400">400</option>--}}
{{--                                                                            <option @if($drop->freight_class === '500') selected @endif value="500">500</option></select>--}}
{{--                                                                    </td>--}}
{{--                                                                    <td class="nmfc-td-width">--}}
{{--                                                                        <input type="text" name="consignee[{{$key}}][national_motor_freight_class]" value="{{$drop->national_motor_freight_class}}" class="consignee_national_motor_freight_class form-control">--}}
{{--                                                                    </td>--}}
{{--                                                                    <td class="prod-td-width">--}}
{{--                                                                        <input type="text" name="consignee[{{$key}}][bol_product]" value="{{$drop->bol_product}}" class="consignee_bol_product form-control">--}}
{{--                                                                    </td>--}}
{{--                                                                    <td class="qty-td-width">--}}
{{--                                                                        <input type="text" name="consignee[{{$key}}][delivery_location_quantity]" value="{{$drop->delivery_location_quantity}}" class="consignee_delivery_location_quantity form-control">--}}
{{--                                                                    </td>--}}
{{--                                                                    <td class="type-td-width">--}}
{{--                                                                        <select name="consignee[{{$key}}][item_type]" value="{{$drop->item_type}}" class="consignee_item_type form-control">--}}
{{--                                                                            <option value="">Select Type</option>--}}
{{--                                                                            <option @if($drop->item_type === 'Blueberries') selected @endif value="Blueberries">Blueberries</option>--}}
{{--                                                                            <option @if($drop->item_type === 'Boxes') selected @endif  value="Boxes">Boxes</option>--}}
{{--                                                                            <option @if($drop->item_type === 'Carrier Fee') selected @endif  value="Carrier Fee">Carrier Fee</option>--}}
{{--                                                                            <option @if($drop->item_type === 'Cartons') selected @endif  value="Cartons">Cartons</option>--}}
{{--                                                                            <option @if($drop->item_type === 'CWT') selected @endif  value="CWT">CWT</option>--}}
{{--                                                                            <option @if($drop->item_type === 'Flat Rate') selected @endif  value="Flat Rate">Flat Rate</option>--}}
{{--                                                                            <option @if($drop->item_type === 'Miles') selected @endif  value="Miles">Miles</option>--}}
{{--                                                                            <option @if($drop->item_type === 'Pallets') selected @endif  value="Pallets">Pallets</option>--}}
{{--                                                                            <option @if($drop->item_type === 'Pounds') selected @endif  value="Pounds">Pounds</option>--}}
{{--                                                                            <option @if($drop->item_type === 'Strawberries') selected @endif  value="Strawberries">Strawberries</option>--}}
{{--                                                                            <option @if($drop->item_type === 'Tons') selected @endif  value="Tons">Tons</option>--}}
{{--                                                                            <option @if($drop->item_type === 'ruck Ordered/Not Used') selected @endif  value="Truck Ordered/Not Used">Truck Ordered/Not Used</option>--}}
{{--                                                                        </select>--}}
{{--                                                                    </td>--}}
{{--                                                                </tr>--}}
                                                                <tr>
                                                                    <th>Length</th>
                                                                    <th>Width</th>
                                                                    <th>Height</th>
                                                                    <th>Weight</th>
                                                                    <th>HazMat</th>
                                                                </tr>
                                                                <tr>
                                                                    <td class="length-td-width">
                                                                        <input type="text" name="consignee[{{$key}}][length]" value="{{$drop->length}}" class="consignee_length form-control" tabindex="247">
                                                                    </td>
                                                                    <td class="width-td-width">
                                                                        <input type="text" name="consignee[{{$key}}][width]" value="{{$drop->width}}" class="consignee_width form-control" tabindex="248">
                                                                    </td>
                                                                    <td class="height-td-width">
                                                                        <input type="text" name="consignee[{{$key}}][height]" value="{{$drop->height}}" class="consignee_height form-control" tabindex="249">
                                                                    </td>
                                                                    <td class="weight-td-width">
                                                                        <input type="text" name="consignee[{{$key}}][delivery_location_weight]" value="{{$drop->delivery_location_weight}}" class="consignee_delivery_location_weight form-control" tabindex="250">
                                                                    </td>
                                                                    <td class="haz-mat-td-width">
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox" value="1" name="consignee[{{$key}}][haz_mat]" class="consignee_haz_mat" value="{{$drop->haz_mat}}" id="carrier_use_dba_name">
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                </tbody></table>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">BOL Note</label>
                                                                <textarea class="form-control editMainField consignee_bol_notes" name="consignee[{{$key}}][bol_notes]" placeholder="Enter delivery notes" tabindex="253">
                                                            {{$drop->bol_notes}}
                                                        </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Delivery Note</label>
                                                                <textarea class="form-control editMainField consignee_delivery_location_notes" name="consignee[{{$key}}][delivery_location_notes]" placeholder="Enter delivery notes" tabindex="253">
                                                            {{$drop->delivery_location_notes}}
                                                        </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-6 carrier-cards">
                                <div class="col-sm-12">
                                    <div class="tab-item">
                                        <div class="card">
                                            <div class="card-header">Carrier Information</div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-laCbel">Carrier</label><br>
                                                            <select name="carrier_id" class="selectpicker col-sm-12" required="true" data-live-search="true">
                                                                <option @if(is_null(old('carrier_id', $load->carrier_id))) selected @endif disabled>-- No Carrier Selected --</option>
                                                                {{-- todo poxel ajax searchov--}}
                                                                @foreach($carriers as $carrier)
                                                                    <option @if(old('carrier_id', $load->carrier_id) == $carrier->id) selected @endif value="{{$carrier->id}}">{{$carrier->company}} - ({{$carrier->mc_number}})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
{{--                                                    <div class="col-sm-6 col-xs-6">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label class="control-label">Dispatcher</label>--}}
{{--                                                            --}}{{-- todo avelacnel dispatcherner --}}
{{--                                                            <select id="dispatcherUserSelect" name="dispatcher_id" class="form-control editMainField" tabindex="66">--}}
{{--                                                                <option value="">-- No Dispatcher Selected --</option>--}}
{{--                                                                <option @if(old('dispatcher_id', $load->dispatcher_id) == 1) selected @endif value="1">Fake dispatcher</option>--}}
{{--                                                                @foreach($dispatchers as $dispatcher)--}}
{{--                                                                    <option @if($load->dispatcher_id == $dispatcher->id) selected @endif value="{{$dispatcher->id}}">{{$dispatcher->full_name}}</option>--}}
{{--                                                                @endforeach--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Truck #</label>
                                                            <input type="text" name="truck_number" value="{{old('truck_number', $load->truck_number)}}" class="form-control editMainField" placeholder="Enter carrier truck number" tabindex="264">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Trailer #</label>
                                                            <input type="text" name="trailer_number" value="{{old('trailer_number', $load->trailer_number)}}" class="form-control editMainField" placeholder="Enter carrier trailer number" tabindex="267">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Driver</label>
                                                            <input type="text" name="driver" value="{{old('driver', $load->driver)}}" class="form-control editMainField" placeholder="Enter carrier driver name" tabindex="265">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Driver Cell #</label>
                                                            <input type="text" name="driver_number" value="{{old('driver_number', $load->driver_number)}}" class="form-control editMainField phoneMask" placeholder="Enter carrier driver number" tabindex="268">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Pro #</label>
                                                            <input type="text" name="pro_number" value="{{old('pro_number', $load->pro_number)}}" class="form-control editMainField" placeholder="Enter carrier pro number" tabindex="266">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Driver Email</label>
                                                            <input type="email" name="driver_email" value="{{old('driver_email', $load->driver_email)}}" class="form-control editMainField" placeholder="Enter the driver's email address" tabindex="269">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="customers" role="tabpanel" aria-labelledby="customer-tab">
                    <div id="customer" class="tabcontent" style="display: block;">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="col-sm-12">
                                    <div class="tab-item">
                                        <div class="card">

                                            <div class="card-header">Company Information</div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="entityLabelValue">
                                                            <div class="entityLabel">Company</div>
                                                            <div class="entityValue">{{$load->customer->company}}</div>
                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                                    <div class="col-md-4">
                                                        <div class="entityLabelValue">
                                                            <div class="entityLabel">Status</div>
                                                            <div class="entityValue">{{$load->customer->status}}</div>
                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                                    <div class="col-md-4">
                                                        <div class="entityLabelValue">
                                                            <div class="entityLabel">Phone</div>
                                                            <div class="entityValue"><a href="tel:{{$load->customer->phone}}">{{$load->customer->phone}}</a></div>
                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                                    <div class="col-md-4">
                                                        <div class="entityLabelValue">
                                                            <div class="entityLabel">Address</div>
                                                            <div class="entityValue"><a href="https://maps.google.com/?q={{$load->customer->address1}}" target="_blank">{{$load->customer->address1}}</a></div>
                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                                    <div class="col-md-4">
                                                        <div class="entityLabelValue">
                                                            <div class="entityLabel">Credit Limit</div>
                                                            <div class="entityValue">${{$load->customer->credit_limit}}</div>
                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                                    <div class="col-md-4">
                                                        <div class="entityLabelValue">
                                                            <div class="entityLabel">Currency</div>
                                                            <div class="entityValue">USD</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Notes -->
                                    <div class="tab-item">
                                        <div class="card">
                                            <div class="card-header">Notes</div>
                                            <div class="card-body">
                                                {{$load->customer->note}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Company Information -->
                            <div class="col-md-4">
                                <!-- Billing Information -->
                                <div class="tab-item">
                                    <div class="card">
                                        <div class="card-header">Billing Information</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Company</div>
                                                        <div class="entityValue">{{$load->customer->billing_company}}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Address</div>
                                                        <div class="entityValue"><a href="https://maps.google.com/?q={{$load->customer->billing_address1}}" target="_blank">{{$load->customer->billing_address1}}</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="carriers" role="tabpanel" aria-labelledby="carrier-tab">
                    <div id="carrier" class="tabcontent" style="display: block;">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="col-sm-12">
                                    <div class="tab-item">
                                        <div class="card">
                                            <div class="card-header">
                                                <div>Company Information</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="entityLabelValue">
                                                            <div class="entityLabel">Company</div>
                                                            <div class="entityValue">
                                                                @if(isset($load->carrier))
                                                                    <a title="edit" href="{{url(\App::make('currentCompany')->id.'/carriers/'.$carrier->id)}}">
                                                                        {{$load->carrier->company}}
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                                    <div class="col-md-4">
                                                        <div class="entityLabelValue">
                                                            <div class="entityLabel">Status</div>
                                                            <div class="entityValue">@if(isset($load->carrier)){{$load->carrier->status}}@endif</div>
                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                                    <div class="col-md-4">
                                                        <div class="entityLabelValue">
                                                            <div class="entityLabel">Phone</div>
                                                            <div class="entityValue">
                                                                <a href="tel:@if(isset($load->carrier)){{$load->carrier->phone}}@endif">@if(isset($load->carrier)){{$load->carrier->phone}}@endif</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                                    <div class="col-md-4">
                                                        <div class="entityLabelValue">
                                                            <div class="entityLabel">Address</div>
                                                            <div class="entityValue">
                                                                <div class="entityValue">
                                                                    <a href="https://maps.google.com/?q=@if(isset($load->carrier)){{$load->carrier->address1}}@endif" target="_blank">{{$carrier->address1}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                                    <div class="col-md-12">
                                                        <div class="entityLabelValue">
                                                            <div class="entityLabel">Note</div>
                                                            <br>
                                                            <div class="entityValue">
                                                                @if(isset($load->carrier)){{$load->carrier->note}}@endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" tab-item">
                                        <div class="card">
                                            <div class="card-header">
                                                <div>Insurance Policies</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Type</th>
                                                            <th>Amount</th>
                                                            <th>Eff. Date</th>
                                                            <th>Exp. Date</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <span class="tableAction fa fa-list-alt" title="View insurance policy details" onclick="showCarrierInsurancePolicyDetailsDialog(0)"></span>
                                                            </td>
                                                            <td>@if(isset($load->carrier)){{$load->carrier->insurance1_type}}@endif</td>
                                                            <td>@if(isset($load->carrier)){{$load->carrier->insurance1_amount}}@endif</td>
                                                            <td>@if(isset($load->carrier)){{$load->carrier->insurance1_effective_on}}@endif</td>
                                                            <td>@if(isset($load->carrier)){{$load->carrier->insurance1_expires_on}}@endif</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="tableAction fa fa-list-alt" title="View insurance policy details" onclick="showCarrierInsurancePolicyDetailsDialog(1)"></span>
                                                            </td>
                                                            <td>@if(isset($load->carrier)){{$load->carrier->insurance2_type}}@endif</td>
                                                            <td>@if(isset($load->carrier))${{$load->carrier->insurance2_amount}}@endif</td>
                                                            <td>@if(isset($load->carrier)){{$load->carrier->insurance2_effective_on}}@endif</td>
                                                            <td>@if(isset($load->carrier)){{$load->carrier->insurance2_expires_on}}@endif</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 tab-item">

                                <!-- Payee Information -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div>Payee Information</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="entityLabelValue">
                                                            <div class="entityLabel">Phone</div>
                                                            <div class="entityValue">
                                                                <a href="tel:@if(isset($load->carrier)){{$load->carrier->payee_phone}}@endif">@if(isset($load->carrier)){{$load->carrier->payee_phone}}@endif</a></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="entityLabelValue">
                                                            <div class="entityLabel">Address</div>
                                                            <div class="entityValue">
                                                                <a href="https://maps.google.com/?q=@if(isset($load->carrier)){{$load->carrier->payee_address1}}@endif" target="_blank">@if(isset($load->carrier)){{$load->carrier->payee_address1}}@endif</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row tab-item">
                                    <div class="col-md-12">
                                        <!-- Licenses & Certificates -->
                                        <div class="card">
                                            <div class="card-header">
                                                <div>Licenses &amp; Certificates</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="entityLabelValue">
                                                            <div class="entityLabel">MC #</div>
                                                            <div class="entityValue">@if(isset($load->carrier)){{$load->carrier->mc_number}}@endif</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="entityLabelValue">
                                                            <div class="entityLabel">DOT #</div>
                                                            <div class="entityValue">@if(isset($load->carrier)){{$load->carrier->dot_number}}@endif</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Carrier Equipment -->

                                        <!-- Reports -->
                                        <div class="row tab-item">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div>Reports</div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="entityLabelValue">
                                                                    <a href="#">Load History</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="accounting" role="tabpanel" aria-labelledby="accounting-tab">
                    <div id="accounting" class="tabcontent" style="display: block;">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="tab-item">
                                        <div class="card">
                                            <div class="accounting-card-header card-header">Customer Charges</div>
                                            <div class="card-body">
                                                <table id="carrierCostsTable" class="table table-striped carrierCostsTable costTable">
                                                    <thead>
                                                    <tr>
                                                        <th class="unitColumn">Units</th>
                                                        <th class="qtyColumn">Quantity</th>
                                                        <th class="amtColumn">Cost/Unit</th>
                                                        <th class="suggestColumn"></th>
                                                        <th class="grossColumn">Gross</th>
                                                        <th class="delColumn"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="carrierCostRow">
                                                        <td class="unitColumn">
                                                            <select name="customer_units_id" class="form-control editMainField input-sm" tabindex="1">
                                                                <option @if($load->customer_units_id == "Flat Rate") selected @endif value="Flat Rate">Flat Rate</option>
                                                                <option @if($load->customer_units_id == "Truck Order/ Not Used") selected @endif value="Truck Order/ Not Used">Truck Order/ Not Used</option>
                                                            </select>
{{--                                                            <input name="customer_units_id" type="text" value="Flat Rate" class=" form-control editMainField input-sm carrierCostInput carrierCostQuantityInput" tabindex="75">--}}
                                                        </td>
                                                        <td class="qtyColumn">
                                                            <input disabled name="customer_costs_quantity" type="text" value="1.0" class=" form-control editMainField input-sm carrierCostInput carrierCostQuantityInput" tabindex="75">
                                                        </td>
                                                        <td class="amtColumn">
                                                            <div class="input-group carrierCostInput">
                                                                <span class="input-group-addon">$</span>
                                                                <input name="customer_costs_rate_per_unit" value="{{$load->customer_costs_rate_per_unit}}" type="text" class=" form-control editMainField input-sm" tabindex="76">
                                                            </div>
                                                        </td>
                                                        <td class="suggestColumn">
                                                        </td>
                                                        <td class="text-right">
                                                            <span class="grossColumn carrierCostGrossColumn">$0.00</span>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="tab-item">
                                        <div class="card">
                                            <div class="accounting-card-header card-header">Carrier Accounting Details</div>
                                            <div class="card-body">
                                                <table id="carrierCostsTable" class="table table-striped carrierCostsTable costTable">
                                                    <thead>
                                                    <tr>
                                                        <th class="unitColumn">Units</th>
                                                        <th class="qtyColumn">Quantity</th>
                                                        <th class="amtColumn">Cost/Unit</th>
                                                        <th class="suggestColumn"></th>
                                                        <th class="grossColumn">Gross</th>
                                                        <th class="delColumn"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="carrierCostRow">
                                                        <td class="unitColumn">
                                                            <select name="carrier_units_id" class="form-control editMainField input-sm" tabindex="1">
                                                                <option @if($load->carrier_units_id == "Flat Rate") selected @endif value="Flat Rate">Flat Rate</option>
                                                                <option @if($load->carrier_units_id == "Truck Order/ Not Used") selected @endif value="Truck Order/ Not Used">Truck Order/ Not Used</option>
                                                            </select>
{{--                                                            <input disabled name="carrier_units_id" type="text" value="Flat Rate" class=" form-control editMainField input-sm carrierCostInput carrierCostQuantityInput" tabindex="75">--}}
                                                        </td>
                                                        <td class="qtyColumn">
                                                            <input name="carrier_costs_quantity" type="text" value="1.0" class=" form-control editMainField input-sm carrierCostInput carrierCostQuantityInput" disabled="" tabindex="75">
                                                        </td>
                                                        <td class="amtColumn">
                                                            <div class="input-group carrierCostInput">
                                                                <span class="input-group-addon">$</span>
                                                                <input name="carrier_costs_rate_per_unit" value="{{$load->carrier_costs_rate_per_unit}}" type="text" class=" form-control editMainField input-sm" tabindex="76">
                                                            </div>
                                                        </td>
                                                        <td class="suggestColumn">
                                                        </td>
                                                        <td class="text-right">
                                                            <span class="grossColumn carrierCostGrossColumn">$0.00</span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <a href="{{ url(\App::make('currentCompany')->id.'/invoice/'.$load->id) }}" class="actionLink " target="_blank">
                                                    <i class="fa fa-file-pdf-o"></i>
                                                    Create Invoice
                                                </a>
                                                |
                                                <a href="{{ url(\App::make('currentCompany')->id.'/generate-carrier-confirmation/'.$load->id) }}" class="actionLink " target="_blank">
                                                    <i class="fa fa-file-pdf-o"></i>
                                                    Create Rate Con
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                    <div id="documents" class="tabcontent" style="display: block;">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadDoumentModal">Attach New Document</button>
                                </div>
                                <div class="col-sm-12">
                                    <div class="tab-item">
                                        <div class="card">
                                            <div class="accounting-card-header card-header">Documents</div>
                                            <div class="card-body">
                                                @include('helpers.document-table', ['model' => $load])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12"><br>
                    <button type="submit" class="btn btn-primary">Update Load</button>
                </div>
            </div>
        </form>
    </div>
    @include('helpers.document-create-modal', ['model' => $load, 'inputName' => 'load_id'])
    @include('helpers.document-edit-modal', ['model' => $load, 'inputName' => 'load_id'])
@endsection
