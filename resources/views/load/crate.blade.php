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
                        <select id="loadStatusSelect" name="status" class="form-control editMainField input-sm" onchange="return onStatusChange();" tabindex="1">
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
                        <input id="product" name="product" title="general goods" value="general goods" class="form-control input-sm editMainField">
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
                            <option value="Van or Flatbed">Van or Flatbed</option>
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
                            <option value="26'" selected="">26'</option>
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
                        <div class="col-sm-6 shipper-cards">
                            <div class="col-sm-12 shipper-info">
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
                                                        <select name="shipper_state" value="{{old('shipper_state')}}" class="selectpickeraa" required="true" data-live-search="true">
                                                            <option disabled selected value>Select State/Province</option>
                                                            <option @if(old('shipper_state') === 'AL') selected @endif value="AL">AL (Alabama)</option>
                                                            <option @if(old('shipper_state') === 'AK') selected @endif value="AK">AK (Alaska)</option>
                                                            <option @if(old('shipper_state') === 'AZ') selected @endif value="AZ">AZ (Arizona)</option>
                                                            <option @if(old('shipper_state') === 'AR') selected @endif value="AR">AR (Arkansas)</option>
                                                            <option @if(old('shipper_state') === 'CA') selected @endif value="CA">CA (California)</option>
                                                            <option @if(old('shipper_state') === 'CO') selected @endif value="CO">CO (Colorado)</option>
                                                            <option @if(old('shipper_state') === 'CT') selected @endif value="CT">CT (Connecticut)</option>
                                                            <option @if(old('shipper_state') === 'DE') selected @endif value="DE">DE (Delaware)</option>
                                                            <option @if(old('shipper_state') === 'DC') selected @endif value="DC">DC (District of Columbia)</option>
                                                            <option @if(old('shipper_state') === 'FL') selected @endif value="FL">FL (Florida)</option>
                                                            <option @if(old('shipper_state') === 'GA') selected @endif value="GA">GA (Georgia)</option>
                                                            <option @if(old('shipper_state') === 'HI') selected @endif value="HI">HI (Hawaii)</option>
                                                            <option @if(old('shipper_state') === 'ID') selected @endif value="ID">ID (Idaho)</option>
                                                            <option @if(old('shipper_state') === 'IL') selected @endif value="IL">IL (Illinois)</option>
                                                            <option @if(old('shipper_state') === 'IN') selected @endif value="IN">IN (Indiana)</option>
                                                            <option @if(old('shipper_state') === 'IA') selected @endif value="IA">IA (Iowa)</option>
                                                            <option @if(old('shipper_state') === 'KS') selected @endif value="KS">KS (Kansas)</option>
                                                            <option @if(old('shipper_state') === 'KY') selected @endif value="KY">KY (Kentucky)</option>
                                                            <option @if(old('shipper_state') === 'LA') selected @endif value="LA">LA (Louisiana)</option>
                                                            <option @if(old('shipper_state') === 'ME') selected @endif value="ME">ME (Maine)</option>
                                                            <option @if(old('shipper_state') === 'MD') selected @endif value="MD">MD (Maryland)</option>
                                                            <option @if(old('shipper_state') === 'MA') selected @endif value="MA">MA (Massachusetts)</option>
                                                            <option @if(old('shipper_state') === 'MI') selected @endif value="MI">MI (Michigan)</option>
                                                            <option @if(old('shipper_state') === 'MN') selected @endif value="MN">MN (Minnesota)</option>
                                                            <option @if(old('shipper_state') === 'MS') selected @endif value="MS">MS (Mississippi)</option>
                                                            <option @if(old('shipper_state') === 'MO') selected @endif value="MO">MO (Missouri)</option>
                                                            <option @if(old('shipper_state') === 'MT') selected @endif value="MT">MT (Montana)</option>
                                                            <option @if(old('shipper_state') === 'NE') selected @endif value="NE">NE (Nebraska)</option>
                                                            <option @if(old('shipper_state') === 'NV') selected @endif value="NV">NV (Nevada)</option>
                                                            <option @if(old('shipper_state') === 'NH') selected @endif value="NH">NH (New Hampshire)</option>
                                                            <option @if(old('shipper_state') === 'NJ') selected @endif value="NJ">NJ (New Jersey)</option>
                                                            <option @if(old('shipper_state') === 'NM') selected @endif value="NM">NM (New Mexico)</option>
                                                            <option @if(old('shipper_state') === 'NY') selected @endif value="NY">NY (New York)</option>
                                                            <option @if(old('shipper_state') === 'NC') selected @endif value="NC">NC (North Carolina)</option>
                                                            <option @if(old('shipper_state') === 'ND') selected @endif value="ND">ND (North Dakota)</option>
                                                            <option @if(old('shipper_state') === 'OH') selected @endif value="OH">OH (Ohio)</option>
                                                            <option @if(old('shipper_state') === 'OK') selected @endif value="OK">OK (Oklahoma)</option>
                                                            <option @if(old('shipper_state') === 'OR') selected @endif value="OR">OR (Oregon)</option>
                                                            <option @if(old('shipper_state') === 'PA') selected @endif value="PA">PA (Pennsylvania)</option>
                                                            <option @if(old('shipper_state') === 'PR') selected @endif value="PR">PR (Puerto Rico)</option>
                                                            <option @if(old('shipper_state') === 'RI') selected @endif value="RI">RI (Rhode Island)</option>
                                                            <option @if(old('shipper_state') === 'SC') selected @endif value="SC">SC (South Carolina)</option>
                                                            <option @if(old('shipper_state') === 'SD') selected @endif value="SD">SD (South Dakota)</option>
                                                            <option @if(old('shipper_state') === 'TN') selected @endif value="TN">TN (Tennessee)</option>
                                                            <option @if(old('shipper_state') === 'TX') selected @endif value="TX">TX (Texas)</option>
                                                            <option @if(old('shipper_state') === 'UT') selected @endif value="UT">UT (Utah)</option>
                                                            <option @if(old('shipper_state') === 'VT') selected @endif value="VT">VT (Vermont)</option>
                                                            <option @if(old('shipper_state') === 'VA') selected @endif value="VA">VA (Virginia)</option>
                                                            <option @if(old('shipper_state') === 'WA') selected @endif value="WA">WA (Washington)</option>
                                                            <option @if(old('shipper_state') === 'WV') selected @endif value="WV">WV (West Virginia)</option>
                                                            <option @if(old('shipper_state') === 'WI') selected @endif value="WI">WI (Wisconsin)</option>
                                                            <option @if(old('shipper_state') === 'WY') selected @endif value="WY">WY (Wyoming)</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Value*</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">$</span>
                                                            <input type="number" name="shipper_value"  required="true" value="{{old('shipper_value', $shipper_value)}}" class="form-control" placeholder="Enter value">
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
                                                    <div class="form-group">
                                                        <label class="control-label">Pickup Time</label>
                                                        <input type="time" name="shipper_pickup_time" class="form-control input-small time-picker-input" value="{{old('shipper_pickup_time')}}">
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
                            <div class="col-sm-12">
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
                            <div class="col-sm-12" id="consigneeContainer">
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
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Delivery Time</label>
                                                        <input type="time" name="consignee[0][delivery_time]" class="consignee_delivery_time form-control input-small time-picker-input" value="{{old('consignee_delivery_time')}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">State/Province</label><br>
                                                        <select name="consignee[0][delivery_state]" value="{{old('consignee_delivery_state')}}" class="consignee_delivery_state selectpickeraa"  data-live-search="true">
                                                            <option disabled selected value>Select State/Province</option>
                                                            <option @if(old('shipper_state') === 'AL') selected @endif value="AL">AL (Alabama)</option>
                                                            <option @if(old('shipper_state') === 'AK') selected @endif value="AK">AK (Alaska)</option>
                                                            <option @if(old('shipper_state') === 'AZ') selected @endif value="AZ">AZ (Arizona)</option>
                                                            <option @if(old('shipper_state') === 'AR') selected @endif value="AR">AR (Arkansas)</option>
                                                            <option @if(old('shipper_state') === 'CA') selected @endif value="CA">CA (California)</option>
                                                            <option @if(old('shipper_state') === 'CO') selected @endif value="CO">CO (Colorado)</option>
                                                            <option @if(old('shipper_state') === 'CT') selected @endif value="CT">CT (Connecticut)</option>
                                                            <option @if(old('shipper_state') === 'DE') selected @endif value="DE">DE (Delaware)</option>
                                                            <option @if(old('shipper_state') === 'DC') selected @endif value="DC">DC (District of Columbia)</option>
                                                            <option @if(old('shipper_state') === 'FL') selected @endif value="FL">FL (Florida)</option>
                                                            <option @if(old('shipper_state') === 'GA') selected @endif value="GA">GA (Georgia)</option>
                                                            <option @if(old('shipper_state') === 'HI') selected @endif value="HI">HI (Hawaii)</option>
                                                            <option @if(old('shipper_state') === 'ID') selected @endif value="ID">ID (Idaho)</option>
                                                            <option @if(old('shipper_state') === 'IL') selected @endif value="IL">IL (Illinois)</option>
                                                            <option @if(old('shipper_state') === 'IN') selected @endif value="IN">IN (Indiana)</option>
                                                            <option @if(old('shipper_state') === 'IA') selected @endif value="IA">IA (Iowa)</option>
                                                            <option @if(old('shipper_state') === 'KS') selected @endif value="KS">KS (Kansas)</option>
                                                            <option @if(old('shipper_state') === 'KY') selected @endif value="KY">KY (Kentucky)</option>
                                                            <option @if(old('shipper_state') === 'LA') selected @endif value="LA">LA (Louisiana)</option>
                                                            <option @if(old('shipper_state') === 'ME') selected @endif value="ME">ME (Maine)</option>
                                                            <option @if(old('shipper_state') === 'MD') selected @endif value="MD">MD (Maryland)</option>
                                                            <option @if(old('shipper_state') === 'MA') selected @endif value="MA">MA (Massachusetts)</option>
                                                            <option @if(old('shipper_state') === 'MI') selected @endif value="MI">MI (Michigan)</option>
                                                            <option @if(old('shipper_state') === 'MN') selected @endif value="MN">MN (Minnesota)</option>
                                                            <option @if(old('shipper_state') === 'MS') selected @endif value="MS">MS (Mississippi)</option>
                                                            <option @if(old('shipper_state') === 'MO') selected @endif value="MO">MO (Missouri)</option>
                                                            <option @if(old('shipper_state') === 'MT') selected @endif value="MT">MT (Montana)</option>
                                                            <option @if(old('shipper_state') === 'NE') selected @endif value="NE">NE (Nebraska)</option>
                                                            <option @if(old('shipper_state') === 'NV') selected @endif value="NV">NV (Nevada)</option>
                                                            <option @if(old('shipper_state') === 'NH') selected @endif value="NH">NH (New Hampshire)</option>
                                                            <option @if(old('shipper_state') === 'NJ') selected @endif value="NJ">NJ (New Jersey)</option>
                                                            <option @if(old('shipper_state') === 'NM') selected @endif value="NM">NM (New Mexico)</option>
                                                            <option @if(old('shipper_state') === 'NY') selected @endif value="NY">NY (New York)</option>
                                                            <option @if(old('shipper_state') === 'NC') selected @endif value="NC">NC (North Carolina)</option>
                                                            <option @if(old('shipper_state') === 'ND') selected @endif value="ND">ND (North Dakota)</option>
                                                            <option @if(old('shipper_state') === 'OH') selected @endif value="OH">OH (Ohio)</option>
                                                            <option @if(old('shipper_state') === 'OK') selected @endif value="OK">OK (Oklahoma)</option>
                                                            <option @if(old('shipper_state') === 'OR') selected @endif value="OR">OR (Oregon)</option>
                                                            <option @if(old('shipper_state') === 'PA') selected @endif value="PA">PA (Pennsylvania)</option>
                                                            <option @if(old('shipper_state') === 'PR') selected @endif value="PR">PR (Puerto Rico)</option>
                                                            <option @if(old('shipper_state') === 'RI') selected @endif value="RI">RI (Rhode Island)</option>
                                                            <option @if(old('shipper_state') === 'SC') selected @endif value="SC">SC (South Carolina)</option>
                                                            <option @if(old('shipper_state') === 'SD') selected @endif value="SD">SD (South Dakota)</option>
                                                            <option @if(old('shipper_state') === 'TN') selected @endif value="TN">TN (Tennessee)</option>
                                                            <option @if(old('shipper_state') === 'TX') selected @endif value="TX">TX (Texas)</option>
                                                            <option @if(old('shipper_state') === 'UT') selected @endif value="UT">UT (Utah)</option>
                                                            <option @if(old('shipper_state') === 'VT') selected @endif value="VT">VT (Vermont)</option>
                                                            <option @if(old('shipper_state') === 'VA') selected @endif value="VA">VA (Virginia)</option>
                                                            <option @if(old('shipper_state') === 'WA') selected @endif value="WA">WA (Washington)</option>
                                                            <option @if(old('shipper_state') === 'WV') selected @endif value="WV">WV (West Virginia)</option>
                                                            <option @if(old('shipper_state') === 'WI') selected @endif value="WI">WI (Wisconsin)</option>
                                                            <option @if(old('shipper_state') === 'WY') selected @endif value="WY">WY (Wyoming)</option>
                                                        </select>
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
                                                        <tbody><tr>
                                                            <th>Freight Class</th>
                                                            <th>NMFC</th>
                                                            <th>Product</th>
                                                            <th>Qty</th>
                                                            <th>Type</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="freight-class-td-width">
                                                                <select name="consignee[0][freight_class]" id="freight-classes" class="consignee_freight_class form-control" tabindex="242">
                                                                    <option value="">Select Freight Class</option>
                                                                    <option @if(old('consignee_freight_class') === 'FAK') selected @endif value="FAK">FAK</option>
                                                                    <option @if(old('consignee_freight_class') === '50') selected @endif value="50">50</option>
                                                                    <option @if(old('consignee_freight_class') === '55') selected @endif value="55">55</option>
                                                                    <option @if(old('consignee_freight_class') === '60') selected @endif value="60">60</option>
                                                                    <option @if(old('consignee_freight_class') === '65') selected @endif value="65">65</option>
                                                                    <option @if(old('consignee_freight_class') === '70' ) selected @endif value="70">70</option>
                                                                    <option @if(old('consignee_freight_class') === '77.5') selected @endif value="77.5">77.5</option>
                                                                    <option @if(old('consignee_freight_class') === '85') selected @endif value="85">85</option>
                                                                    <option @if(old('consignee_freight_class') === '92.5') selected @endif value="92.5">92.5</option>
                                                                    <option @if(old('consignee_freight_class') === '100') selected @endif value="100">100</option>
                                                                    <option @if(old('consignee_freight_class') === '110') selected @endif value="110">110</option>
                                                                    <option @if(old('consignee_freight_class') === '125') selected @endif value="125">125</option>
                                                                    <option @if(old('consignee_freight_class') === '150') selected @endif value="150">150</option>
                                                                    <option @if(old('consignee_freight_class') === '175') selected @endif value="175">175</option>
                                                                    <option @if(old('consignee_freight_class') === '200') selected @endif value="200">200</option>
                                                                    <option @if(old('consignee_freight_class') === '250') selected @endif value="250">250</option>
                                                                    <option @if(old('consignee_freight_class') === '300') selected @endif value="300">300</option>
                                                                    <option @if(old('consignee_freight_class') === '400') selected @endif value="400">400</option>
                                                                    <option @if(old('consignee_freight_class') === '500') selected @endif value="500">500</option></select>
                                                            </td>
                                                            <td class="nmfc-td-width">
                                                                <input type="text" name="consignee[0][national_motor_freight_class]" value="{{old('consignee_national_motor_freight_class')}}" class="consignee_national_motor_freight_class form-control">
                                                            </td>
                                                            <td class="prod-td-width">
                                                                <input type="text" name="consignee[0][bol_product]" value="{{old('consignee_bol_product')}}" class="consignee_bol_product form-control">
                                                            </td>
                                                            <td class="qty-td-width">
                                                                <input type="text" name="consignee[0][delivery_location_quantity]" value="{{old('consignee_delivery_location_quantity')}}" class="consignee_delivery_location_quantity form-control">
                                                            </td>
                                                            <td class="type-td-width">
                                                                <select name="consignee[0][item_type]" value="{{old('consignee_item_type')}}" class="consignee_item_type form-control">
                                                                    <option value="">Select Type</option>
                                                                    <option @if(old('consignee_item_type') === 'Blueberries') selected @endif value="Blueberries">Blueberries</option>
                                                                    <option @if(old('consignee_item_type') === 'Boxes') selected @endif  value="Boxes">Boxes</option>
                                                                    <option @if(old('consignee_item_type') === 'Carrier Fee') selected @endif  value="Carrier Fee">Carrier Fee</option>
                                                                    <option @if(old('consignee_item_type') === 'Cartons') selected @endif  value="Cartons">Cartons</option>
                                                                    <option @if(old('consignee_item_type') === 'CWT') selected @endif  value="CWT">CWT</option>
                                                                    <option @if(old('consignee_item_type') === 'Flat Rate') selected @endif  value="Flat Rate">Flat Rate</option>
                                                                    <option @if(old('consignee_item_type') === 'Miles') selected @endif  value="Miles">Miles</option>
                                                                    <option @if(old('consignee_item_type') === 'Pallets') selected @endif  value="Pallets">Pallets</option>
                                                                    <option @if(old('consignee_item_type') === 'Pounds') selected @endif  value="Pounds">Pounds</option>
                                                                    <option @if(old('consignee_item_type') === 'Strawberries') selected @endif  value="Strawberries">Strawberries</option>
                                                                    <option @if(old('consignee_item_type') === 'Tons') selected @endif  value="Tons">Tons</option>
                                                                    <option @if(old('consignee_item_type') === 'ruck Ordered/Not Used') selected @endif  value="Truck Ordered/Not Used">Truck Ordered/Not Used</option></select>
                                                            </td>
                                                        </tr>
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
                                                        <label class="control-label">Carrier</label>
                                                        {{-- todo poxel ajax searchov--}}
                                                        <select id="dispatcherUserSelect" name="carrier_id" class="form-control editMainField" tabindex="66">
                                                            <option value="">-- No Carrier Selected --</option>
                                                            @foreach($carriers as $carrier)
                                                                <option @if(old('carrier_id') == $carrier->id) selected @endif value="{{$carrier->id}}">{{$carrier->company}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
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
                                                        <input disabled name="customer_units_id" type="text" value="Flat Rate" class=" form-control editMainField input-sm carrierCostInput carrierCostQuantityInput" tabindex="75">
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

                                            <a href="" class="actionLink " target="_blank">
                                                <i class="fa fa-file-pdf-o"></i>
                                                Carrier Confirmation One
                                            </a>
                                            <a href="" class="actionLink " target="_blank">
                                                <i class="fa fa-file-pdf-o"></i>
                                                Carrier Confirmation Two
                                            </a>
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
                                                        <input disabled name="carrier_units_id" type="text" value="Flat Rate" class=" form-control editMainField input-sm carrierCostInput carrierCostQuantityInput" tabindex="75">
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
                                            <a href="" class="actionLink " target="_blank">
                                                <i class="fa fa-file-pdf-o"></i>
                                                Carrier Confirmation One
                                            </a>
                                            <a href="" class="actionLink " target="_blank">
                                                <i class="fa fa-file-pdf-o"></i>
                                                Carrier Confirmation Two
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12"><br>
                <button type="submit" class="btn btn-primary">Create Load</button>
            </div>
        </div>
        </form>
    </div>
@endsection
