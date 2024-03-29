@extends('layouts.app')

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
    <div class="col-sm-12 loads-show">
        <form method="post" id="loadCreateForm" action="{{ url(\App::make('currentCompany')->id.'/loads') }}" class="col-sm-12">
        @csrf
        <input type="hidden" name="customer_id" value="{{$customer->id}}">
        <div class="row" style="background-color:#ddd;width:100%;padding:5px;border:1px solid #999;border-radius:3px;margin:auto auto 10px auto;">
            <div class="col-md-6" style="padding-right:0px;">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="entityLabelValue form-group">
                        <div class="entityLabel">Status</div>
                        <select id="loadStatusSelect" name="status" class="form-control editMainField input-sm" tabindex="1">
                            <option selected value="Available">Available</option>
                            <option value="Invoiced">Invoiced</option>
                            <option value="Committed">Committed</option>
                            <option value="Assigned">Assigned</option>
                            <option value="Dispatched">Dispatched</option>
                            <option value="Picked Up">Picked Up</option>
                            <option value="Enroute">Enroute</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Ready to Invoice">Ready to Invoice</option>
                            <option value="Paid Carrier">Paid Carrier</option>
                            <option value="Paid Customer">Paid Customer</option>
                            <option value="Completed">Completed</option>
                            <option value="Voided">Voided</option>
                            <option value="Pending">Pending</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="entityLabelValue form-group">
                        <div class="entityLabel">Product</div>
                        <input id="product" name="product" title="" value="" class="form-control input-sm editMainField">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="entityLabelValue form-group">
                        <div class="entityLabel">PO Number</div>
                        <input id="po_number" name="purchase_order_number" title="" value="" class="form-control input-sm editMainField">
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="padding-left:0px;">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="entityLabelValue form-group carrierEquipmentMsg">
                        <div class="entityLabel">Carrier Equipment</div>
                        <select name="carrier_equipment_id" class="form-control input-sm editMainField checkLaneMaster" tabindex="5">
                            <option selected="" value="">Select Equipment</option>
                            <option value="Straight Box Truck">Straight Box Truck</option>
                            <option value="Van">Van</option>
                            <option value="Van or lFlatbed">Van or Flatbed</option>
                            <option value="Van or Reffer">Van or Reffer</option>
                            <option value="Reefer">Reefer</option>
                            <option value="Hot Shot">Hot Shot</option>
                            <option value="Stepdeck">Stepdeck</option>
                            <option value="Flatbed">Flatbed</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="entityLabelValue form-group">
                        <div class="entityLabel">Trailer Size</div>
                        <select name="trailer_size" class="form-control editMainField" tabindex="7">
                            <option value="">Select Size</option>
                            <option value="20' Std.">20' Std.</option>
                            <option value="20' H.C.">20' H.C.</option>
                            <option value="22'">22'</option>
                            <option value="24'">24'</option>
                            <option value="26'">26'</option>
                            <option value="28'">28'</option>
                            <option value="32'">32'</option>
                            <option value="40'">40'</option>
                            <option value="40' Std.">40' Std.</option>
                            <option value="40' H.C.">40' H.C.</option>
                            <option value="43'">43'</option>
                            <option value="45'">45'</option>
                            <option value="45' H.C.">45' H.C.</option>
                            <option value="46'">46'</option>
                            <option value="48'">48'</option>
                            <option value="52'">52'</option>
                            <option value="53'">53'</option>
                            <option value="57'">57'</option>
                            <option value="Oversize">Oversize</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="entityLabelValue form-group">
                        <div class="entityLabel">Dispatcher</div>
                        <select id="dispatcherUserSelect" name="dispatcher_id" value="{{old('dispatcher_id')}}" class="form-control editMainField" tabindex="66">
                            <option value="">-- No Dispatcher Selected --</option>
                            @if(!$dispatchers->isEmpty())
                                @foreach($dispatchers as $dispatcher)
                                    <option @if(old('dispatcher_id') == $dispatcher->id) selected @endif value="{{$dispatcher->id}}">{{$dispatcher->full_name}}</option>
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
                        <textarea class="form-control" name="note" placeholder="Enter a note" rows="2" tabindex="15">{{old('note')}}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6" id="voided-reason-container" style="display: none">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="entityLabelValue form-group">
                        <div class="entityLabel">Voided Reason</div>
                        <input id="po_number" name="voided_reason" title="" class="form-control input-sm editMainField">
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
            <li class="nav-item col-sm-2 accounting-tab">
                <a class="nav-link" id="accounting-tab" data-toggle="tab" href="#accounting" role="tab" aria-controls="accounting" aria-selected="false">Accounting</a>
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
                                                        <input class="form-control" placeholder="Enter company" type="text" name="shipper_company" value="{{old('shipper_company')}}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Phone</label>
                                                        <input type="text" name="shipper_phone" value="{{old('shipper_phone')}}" class="form-control phoneMask" placeholder="Enter phone number">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Extension</label>
                                                        <input type="text" name="shipper_phone_extension" value="{{old('shipper_phone_extension')}}" class="form-control" placeholder="Enter extension">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Location PoC</label>
                                                        <input type="text" name="shipper_location_POS" value="{{old('shipper_location_POS')}}" class="form-control" placeholder="Enter point of contact">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Customer PoC</label>
                                                        <input type="text" name="shipper_customer_POS" value="{{old('shipper_customer_POS')}}" class="form-control" placeholder="Enter point of customer">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div id="ship_location_address1Group" class="form-group">
                                                        <label class="control-label">Address 1</label>
                                                        <input type="text" name="shipper_address1" value="{{old('shipper_address1')}}" class="form-control" placeholder="Enter address">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Fax</label>
                                                        <input class="form-control phoneMask" placeholder="Enter fax number" type="text" name="shipper_fax" value="{{old('shipper_fax')}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Address 2</label>
                                                        <input type="text" name="shipper_address2" value="{{old('shipper_address2')}}" class="form-control" placeholder="Enter address">
                                                    </div>
                                                </div>

                                                    <div class="col-sm-3 col-xs-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Quantity</label>
                                                            <input type="text" name="shipper_quantity" value="{{old('shipper_quantity')}}" class="form-control editMainField" placeholder="Enter quantity">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Type</label>
                                                            <select name="shipper_type" value="{{old('shipper_type')}}" class="form-control">
                                                                <option>Select Type</option>
                                                                <option @if(old('shipper_type') === 'Blueberries') selected @endif value="Blueberries">Blueberries</option>
                                                                <option @if(old('shipper_type') === 'Boxes') selected @endif value="Boxes">Boxes</option>
                                                                <option @if(old('shipper_type') === 'Carrier Fee') selected @endif value="Carrier Fee">Carrier Fee</option>
                                                                <option @if(old('shipper_type') === 'Cartons') selected @endif value="Cartons">Cartons</option>
                                                                <option @if(old('shipper_type') === 'CWT') selected @endif value="CWT">CWT</option>
                                                                <option @if(old('shipper_type') === 'Flat Rate') selected @endif value="Flat Rate">Flat Rate</option>
                                                                <option @if(old('shipper_type') === 'Miles') selected @endif value="Miles">Miles</option>
                                                                <option @if(old('shipper_type') === 'Pallets') selected @endif value="Pallets">Pallets</option>
                                                                <option @if(old('shipper_type') === 'Pounds') selected @endif value="Pounds">Pounds</option>
                                                                <option @if(old('shipper_type') === 'Strawberries') selected @endif value="Strawberries">Strawberries</option>
                                                                <option @if(old('shipper_type') === 'Tons') selected @endif value="Tons">Tons</option>
                                                                <option @if(old('shipper_type') === 'Truck Ordered/Not Used') selected @endif value="Truck Ordered/Not Used">Truck Ordered/Not Used</option></select>
                                                        </div>
                                                    </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">City*</label>
                                                        <input class="form-control" placeholder="Enter shipper city" required="reue" type="text" name="shipper_city" value="{{old('shipper_city')}}">
                                                    </div>
                                                </div>


                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Weight</label>
                                                        <input type="text" name="shipper_weight" value="{{old('shipper_weight')}}" class="form-control" placeholder="Enter weight">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">State/Province*</label><br>
                                                        <input required type="text" name="shipper_state" value="{{old('shipper_state')}}" class="form-control" placeholder="Please Enter State/Province">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Value</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">$</span>
                                                            <input type="number" name="shipper_value"  value="{{old('shipper_value', $shipper_value)}}" class="form-control" placeholder="Enter value">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="shipper_zip_code">Zip Code</label>
                                                        <input class="form-control requiredInputCustomer" placeholder="Enter zip code" type="text" name="shipper_zip_code" value="{{old('shipper_zip_code')}}">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-xs-6">
                                                    <div id="insuranceEffectiveDateGroup" class="form-group">
                                                        <label class="control-label">Pickup Date*</label>
                                                        <div class="input-group date datePicker defaultDatePicker">
                                                            <input class="datepicker form-control" placeholder="Enter pichup date" required="true"  type="text" name="shipper_pickup_date" value="{{old('shipper_pickup_date')}}" min={{date('Y-m-d')}}>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Pickup #</label>
                                                        <input type="text" name="shipper_pickup_number" value="{{old('shipper_pickup_number')}}" class="form-control editMainField" placeholder="Enter pickup number">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="col-sm-8 col-xs-8" style="padding: 0">
                                                        <div class="form-group">
                                                            <label class="control-label">Pickup Time</label>
                                                            <input type="text" name="shipper_pickup_time_from" class="form-control input-small time-picker-input" value="{{old('shipper_pickup_time_from')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-xs-4">
                                                        <div class="form-group">
                                                            <label class="control-label">APPT</label>
                                                            <input type="checkbox"  @if(old('shipper_pickup_time_appt')) checked @endif name="shipper_pickup_time_appt">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">FCFS</label>
                                                            <input type="checkbox" value="0" name="shipper_pickup_time_fcfs"  value="{{old('shipper_pickup_time_fcfs')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Payment Method</label>
                                                        <select name="shipper_payment_method" value="{{old('shipper_payment_method')}}" class="shipper-payment-method form-control">
                                                            <option value="">Select Type</option>
                                                            <option @if(old('shipper_payment_method')) selected @endif value="NET 30 FACTORING">NET 30 FACTORING</option>
                                                            <option @if(old('shipper_payment_method')) selected @endif value="STANDARD ACH">STANDARD ACH</option>
                                                            <option @if(old('shipper_payment_method')) selected @endif value="STANDARD ZELLE PERSONAL">STANDARD ZELLE PERSONAL</option>
                                                            <option @if(old('shipper_payment_method')) selected @endif value="STANDARD ZELLE BUSINESS">STANDARD ZELLE BUSINESS</option>
                                                            <option @if(old('shipper_payment_method')) selected @endif value="QUICK PAY">QUICK PAY</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 shipper-quick-pay-percent" style="display: none">
                                                    <div class="form-group">
                                                        <label class="control-label">%</label>
                                                        <input  class="form-control shipper-quick-pay-percent-value" name="shipper_quick_pay_percent" type="number" min="0" max="100">
                                                    </div>
                                                </div>
                                                <div class="col-sm-8 shipper-factoring" style="display: none">
                                                    <div class="form-group">
                                                        <label class="control-label">Factoring Name</label>
                                                        <input  class="form-control shipper-factoring-value" name="shipper_factoring" type="text">
                                                    </div>
                                                    <p style="color: darkred">NOTE: Notice of Assignment (NOA) document required after 7 days from load creation.</p>
                                                </div>
                                                <div class="col-sm-8 shipper-factoring-ach-info" style="display: none">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Account Number</label>
                                                            <input  class="form-control" name="shipper_factoring_ach_account_number" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Routing Number</label>
                                                            <input  class="form-control" name="shipper_factoring_ach_routing_number" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8 shipper-factoring-zelle-info" style="display: none">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Zelle Phone Number</label>
                                                            <input  class="form-control" name="shipper_factoring_zelle_phone" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Zelle Email</label>
                                                            <input  class="form-control" name="shipper_factoring_zelle_email" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Pickup Note</label>
                                                        <textarea class="form-control editMainField" name="shipper_notes" placeholder="Enter pickup notes">{{old('shipper_notes')}}</textarea>
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
                                                <span style="cursor:pointer" class="glyphicon glyphicon-plus pull-right" onclick="addStop()" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6" id="consigneeContainer">
                                <div class="tab-item consigneeItem" id="consigneeItem">
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
                                                            <input class="form-control consignee_company" placeholder="Enter company"  type="text" name="consignee[0][company]" value="{{old('consignee_company')}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-3 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="customer_phone">Phone</label>
                                                        <input class="form-control requiredInputCustomer phoneMask consignee_phone" placeholder="Enter phone"  type="text" name="consignee[0][phone]" value="{{old('consignee_phone')}}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Extension</label>
                                                        <input class="form-control consignee_phone_extension" placeholder="Enter extension" type="text" name="consignee[0][phone_extension]" value="{{old('consignee_phone_extension')}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Contact</label>
                                                        <input type="text" name="consignee[0][contact_name]" value="{{old('consignee_contact_name')}}" class="form-control consignee_contact_name" placeholder="Enter point of contact" tabindex="234">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Fax</label>
                                                        <input type="text" name="consignee[0][fax]" value="{{old('consignee_fax')}}" class="form-control editMainField phoneMask consignee_fax" placeholder="Enter fax number">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Address 1</label>
                                                        <input type="text" name="consignee[0][address1]" value="{{old('consignee_address1')}}" class="form-control consignee_address1" placeholder="Enter address">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Delivery #</label>
                                                        <input type="text" name="consignee[0][delivered_number]" value="{{old('consignee_delivered_number')}}" class="consignee_delivered_number form-control editMainField" placeholder="Enter delivery number">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Address 2</label>
                                                        <input type="text" name="consignee[0][address2]" value="{{old('consignee_address2')}}" class="consignee_address2 form-control" placeholder="Enter address">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group deliveryLocationPickupAtMsg-1613">
                                                        <label class="control-label">Delivery Date*</label>
                                                        <div class="input-group date datePicker defaultDatePicker">
                                                            <input class="datepicker form-control consignee_delivery_date" required="true" placeholder="Enter delivery date"  type="text" name="consignee[0][delivery_date]" value="{{old('consignee_delivery_date')}}" min={{date('Y-m-d')}}>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div id="delivery_location_cityGroup" class="form-group deliveryLocationCityMsg-1613">
                                                        <label class="control-label">City</label>
                                                        <input class="form-control consignee_city" placeholder="Enter city"  type="text" name="consignee[0][city]" value="{{old('consignee_city')}}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6" style="padding: 0">
                                                    <div class="col-sm-8 col-xs-8">
                                                        <div class="form-group">
                                                            <label class="control-label">Delivery Time</label>
                                                            <input type="text" name="consignee[0][delivery_time_from]" class="form-control input-small time-picker-input" value="{{old('consignee_delivery_time_from')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">State/Province</label><br>
                                                        <input type="text" name="consignee[0][delivery_state]" value="{{old('consignee[0][delivery_state]')}}" class="form-control" placeholder="Please Enter State/Province">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label class="control-label">BOL Payment Term</label>
                                                    <div class="form-group">
                                                        <select name="consignee[0][BOL_payment_term]" value="{{old('consignee_BOL_payment_term')}}" class="consignee_BOL_payment_term form-control">
                                                            <option disabled selected value>--Select BOL Payment Term--</option>
                                                            <option  @if(old('consignee_BOL_payment_term') === 'Prepaid') selected @endif value="Prepaid">Prepaid</option>
                                                            <option  @if(old('consignee_BOL_payment_term') === 'Collect') selected @endif value="Collect">Collect</option>
                                                            <option  @if(old('consignee_BOL_payment_term') === 'Third Party') selected @endif value="Third Party">Third Party</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Zip Code</label><br>
                                                        <input type="text" name="consignee[0][delivery_location_zip_code]" value="{{old('consignee_delivery_location_zip_code')}}" class="consignee_delivery_location_zip_code form-control editMainField tt-input" placeholder="Enter zip code">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">BOL #</label>
                                                        <input type="text" name="consignee[0][delivery_location_bol_number]" value="{{old('consignee_delivery_location_bol_number')}}" class="consignee_delivery_location_bol_number form-control editMainField" placeholder="Enter BOL #" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row class-dimensions-row">
                                                <div class="col-sm-12">
                                                    <table class="table table-class-dimensions">
                                                        <tbody>
{{--                                                        <tr>--}}
{{--                                                            <th>Freight Class</th>--}}
{{--                                                            <th>NMFC</th>--}}
{{--                                                            <th>Product</th>--}}
{{--                                                            <th>Qty</th>--}}
{{--                                                            <th>Type</th>--}}
{{--                                                        </tr>--}}
{{--                                                        <tr>--}}
{{--                                                            <td class="freight-class-td-width">--}}
{{--                                                                <select name="consignee[0][freight_class]" id="freight-classes" class="consignee_freight_class form-control" tabindex="242">--}}
{{--                                                                    <option value="">Select Freight Class</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === 'FAK') selected @endif value="FAK">FAK</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '50') selected @endif value="50">50</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '55') selected @endif value="55">55</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '60') selected @endif value="60">60</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '65') selected @endif value="65">65</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '70' ) selected @endif value="70">70</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '77.5') selected @endif value="77.5">77.5</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '85') selected @endif value="85">85</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '92.5') selected @endif value="92.5">92.5</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '100') selected @endif value="100">100</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '110') selected @endif value="110">110</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '125') selected @endif value="125">125</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '150') selected @endif value="150">150</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '175') selected @endif value="175">175</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '200') selected @endif value="200">200</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '250') selected @endif value="250">250</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '300') selected @endif value="300">300</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '400') selected @endif value="400">400</option>--}}
{{--                                                                    <option @if(old('consignee_freight_class') === '500') selected @endif value="500">500</option></select>--}}
{{--                                                            </td>--}}
{{--                                                            <td class="nmfc-td-width">--}}
{{--                                                                <input type="text" name="consignee[0][national_motor_freight_class]" value="{{old('consignee_national_motor_freight_class')}}" class="consignee_national_motor_freight_class form-control">--}}
{{--                                                            </td>--}}
{{--                                                            <td class="prod-td-width">--}}
{{--                                                                <input type="text" name="consignee[0][bol_product]" value="{{old('consignee_bol_product')}}" class="consignee_bol_product form-control">--}}
{{--                                                            </td>--}}
{{--                                                            <td class="qty-td-width">--}}
{{--                                                                <input type="text" name="consignee[0][delivery_location_quantity]" value="{{old('consignee_delivery_location_quantity')}}" class="consignee_delivery_location_quantity form-control">--}}
{{--                                                            </td>--}}
{{--                                                            <td class="type-td-width">--}}
{{--                                                                <select name="consignee[0][item_type]" value="{{old('consignee_item_type')}}" class="consignee_item_type form-control">--}}
{{--                                                                    <option value="">Select Type</option>--}}
{{--                                                                    <option @if(old('consignee_item_type') === 'Blueberries') selected @endif value="Blueberries">Blueberries</option>--}}
{{--                                                                    <option @if(old('consignee_item_type') === 'Boxes') selected @endif  value="Boxes">Boxes</option>--}}
{{--                                                                    <option @if(old('consignee_item_type') === 'Carrier Fee') selected @endif  value="Carrier Fee">Carrier Fee</option>--}}
{{--                                                                    <option @if(old('consignee_item_type') === 'Cartons') selected @endif  value="Cartons">Cartons</option>--}}
{{--                                                                    <option @if(old('consignee_item_type') === 'CWT') selected @endif  value="CWT">CWT</option>--}}
{{--                                                                    <option @if(old('consignee_item_type') === 'Flat Rate') selected @endif  value="Flat Rate">Flat Rate</option>--}}
{{--                                                                    <option @if(old('consignee_item_type') === 'Miles') selected @endif  value="Miles">Miles</option>--}}
{{--                                                                    <option @if(old('consignee_item_type') === 'Pallets') selected @endif  value="Pallets">Pallets</option>--}}
{{--                                                                    <option @if(old('consignee_item_type') === 'Pounds') selected @endif  value="Pounds">Pounds</option>--}}
{{--                                                                    <option @if(old('consignee_item_type') === 'Strawberries') selected @endif  value="Strawberries">Strawberries</option>--}}
{{--                                                                    <option @if(old('consignee_item_type') === 'Tons') selected @endif  value="Tons">Tons</option>--}}
{{--                                                                    <option @if(old('consignee_item_type') === 'ruck Ordered/Not Used') selected @endif  value="Truck Ordered/Not Used">Truck Ordered/Not Used</option></select>--}}
{{--                                                            </td>--}}
{{--                                                        </tr>--}}
                                                        <tr>
                                                            <th>Length</th>
                                                            <th>Width</th>
                                                            <th>Height</th>
                                                            <th>Weight</th>
                                                            <th>HazMat</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="length-td-width">
                                                                <input type="text" name="consignee[0][length]" value="{{old('consignee_length')}}" class="consignee_length form-control" tabindex="247">
                                                            </td>
                                                            <td class="width-td-width">
                                                                <input type="text" name="consignee[0][width]" value="{{old('consignee_width')}}" class="consignee_width form-control" tabindex="248">
                                                            </td>
                                                            <td class="height-td-width">
                                                                <input type="text" name="consignee[0][height]" value="{{old('consignee_height')}}" class="consignee_height form-control" tabindex="249">
                                                            </td>
                                                            <td class="weight-td-width">
                                                                <input type="text" name="consignee[0][delivery_location_weight]" value="{{old('consignee_delivery_location_weight')}}" class="consignee_delivery_location_weight form-control" tabindex="250">
                                                            </td>
                                                            <td class="haz-mat-td-width">
                                                                <div class="checkbox">
                                                                    <label>
{{--                                                                        <input name="consignee[0][haz_mat]" type="hidden" value="0">--}}
                                                                        <input type="checkbox" value="1" name="consignee[0][haz_mat]" class="consignee_haz_mat" value="{{old('consignee_haz_mat')}}" id="carrier_use_dba_name">
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
                                                        <textarea class="form-control editMainField consignee_bol_notes" name="consignee[0][bol_notes]" placeholder="Enter delivery notes" tabindex="253">
                                                            {{old('consignee_bol_notes')}}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Delivery Note</label>
                                                        <textarea class="form-control editMainField consignee_delivery_location_notes" name="consignee[0][delivery_location_notes]" placeholder="Enter delivery notes" tabindex="253">
                                                            {{old('consignee_delivery_location_notes')}}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                    <div class="form-group carrierMsg">
                                                        <label class="control-label">Carrier *</label><br>
                                                        <select required name="carrier_id" class="selectpicker col-sm-12" required="true" data-live-search="true">
                                                            <option @if(is_null(old('carrier_id'))) selected @endif disabled>-- No Carrier Selected --</option>
                                                            {{-- todo poxel ajax searchov--}}
                                                            @foreach($carriers as $carrier)
                                                                <option @if(old('carrier_id') == $carrier->id) selected @endif value="{{$carrier->id}}">{{$carrier->company}} - ({{$carrier->mc_number}})</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
{{--                                                    <div class="form-group carrierMsg">--}}
{{--                                                        <label class="control-label">Carrier</label>--}}
{{--                                                        --}}{{-- todo poxel ajax searchov--}}
{{--                                                        <select id="dispatcherUserSelect" name="carrier_id" class="form-control editMainField" tabindex="66">--}}
{{--                                                            <option value="">-- No Carrier Selected --</option>--}}
{{--                                                            @foreach($carriers as $carrier)--}}
{{--                                                                <option @if(old('carrier_id') == $carrier->id) selected @endif value="{{$carrier->id}}">{{$carrier->company}}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Truck #</label>
                                                        <input type="text" name="truck_number" value="{{old('truck_number')}}" class="form-control editMainField" placeholder="Enter carrier truck number" tabindex="264">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Trailer #</label>
                                                        <input type="text" name="trailer_number" value="{{old('trailer_number')}}" class="form-control editMainField" placeholder="Enter carrier trailer number" tabindex="267">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Driver</label>
                                                        <input type="text" name="driver" value="{{old('driver')}}" class="form-control editMainField" placeholder="Enter carrier driver name" tabindex="265">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Driver Cell #</label>
                                                        <input type="text" name="driver_number" value="{{old('driver_number')}}" class="form-control editMainField phoneMask" placeholder="Enter carrier driver number" tabindex="268">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Pro #</label>
                                                        <input type="text" name="pro_number" value="{{old('pro_number')}}" class="form-control editMainField" placeholder="Enter carrier pro number" tabindex="266">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Driver Email</label>
                                                        <input type="email" name="driver_email" value="{{old('driver_email')}}" class="form-control editMainField" placeholder="Enter the driver's email address" tabindex="269">
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
                                                        <div class="entityValue">{{$customer->company}}</div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class="col-md-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Status</div>
                                                        <div class="entityValue">{{$customer->status}}</div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class="col-md-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Phone</div>
                                                        <div class="entityValue"><a href="tel:{{$customer->phone}}">{{$customer->phone}}</a></div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class="col-md-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Address</div>
                                                        <div class="entityValue"><a href="https://maps.google.com/?q={{$customer->address1}}" target="_blank">{{$customer->address1}}</a></div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class="col-md-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Credit Limit</div>
                                                        <div class="entityValue">${{$customer->credit_limit}}</div>
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
                                            {{$customer->note}}
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
                                                    <div class="entityValue">{{$customer->billing_company}}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Address</div>
                                                    <div class="entityValue"><a href="https://maps.google.com/?q={{$customer->billing_address1}}" target="_blank">{{$customer->billing_address1}}</a></div>
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
                                                            <option value="Flat Rate">Flat Rate</option>
                                                            <option value="Truck Order/ Not Used">Truck Order/ Not Used</option>
                                                        </select>
{{--                                                        <input name="customer_units_id" type="text" value="Flat Rate" class=" form-control editMainField input-sm carrierCostInput carrierCostQuantityInput" tabindex="75">--}}
                                                    </td>
                                                    <td class="qtyColumn">
                                                        <input disabled name="customer_costs_quantity" type="text" value="1.0" class=" form-control editMainField input-sm carrierCostInput carrierCostQuantityInput" tabindex="75">
                                                    </td>
                                                    <td class="amtColumn">
                                                        <div class="input-group carrierCostInput">
                                                            <span class="input-group-addon">$</span>
                                                            <input name="customer_costs_rate_per_unit" value="{{old('customer_costs_rate_per_unit')}}" type="text" class=" form-control editMainField input-sm" tabindex="76">
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
                                                            <option value="Flat Rate">Flat Rate</option>
                                                            <option value="Truck Order/ Not Used">Truck Order/ Not Used</option>
                                                        </select>
{{--                                                        <input disabled name="carrier_units_id" type="text" value="Flat Rate" class=" form-control editMainField input-sm carrierCostInput carrierCostQuantityInput" tabindex="75">--}}
                                                    </td>
                                                    <td class="qtyColumn">
                                                        <input name="carrier_costs_quantity" type="text" value="1.0" class=" form-control editMainField input-sm carrierCostInput carrierCostQuantityInput" disabled="" tabindex="75">
                                                    </td>
                                                    <td class="amtColumn">
                                                        <div class="input-group carrierCostInput">
                                                            <span class="input-group-addon">$</span>
                                                            <input name="carrier_costs_rate_per_unit" value="{{old('carrier_costs_rate_per_unit')}}" type="text" class=" form-control editMainField input-sm" tabindex="76">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12"><br>
                <button type="submit" class="btn btn-primary">Save Load</button>
            </div>
        </div>
        </form>
    </div>
@endsection
