@extends('layouts.app')
<script>
    window.editStopIndex = '{!! count($load->drops) !!}';
</script>

@section('content')
    <div id="ajaxErrorContainer" class="col-sm-12"></div>
    <div class="col-sm-12 loads-show">
{{--        <form method="" action="" class="col-sm-12">--}}
            @csrf
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item col-sm-2 load-tab">
                    <a class="nav-link active" id="load-tab" data-toggle="tab" href="#load" role="tab" aria-controls="load" aria-selected="true">Load</a>
                </li>
                <li class="nav-item col-sm-2 customers-tab">
                    <a class="nav-link" id="customer-tab" data-toggle="tab" href="#customers" role="tab" aria-controls="customers" aria-selected="false">Customers</a>
                </li>
                @if(count($load->histories))
                    <li class="nav-item col-sm-2 history-tab">
                        <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">History</a>
                    </li>
                @endif
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
                                                            <label class="control-label">*Company</label>
                                                            <input disabled class="form-control" placeholder="Enter company" required="required" type="text" name="shipper_company" value="{{old('shipper_company', $load->shipper_company)}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Phone</label>
                                                            <input disabled type="text" name="shipper_phone" value="{{old('shipper_phone', $load->shipper_phone)}}" class="form-control phoneMask" placeholder="Enter phone number">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Extension</label>
                                                            <input disabled type="text" name="shipper_phone_extension" value="{{old('shipper_phone_extension', $load->shipper_phone_extension)}}" class="form-control" placeholder="Enter extension">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Location PoC</label>
                                                            <input disabled type="text" name="shipper_location_POS" value="{{old('shipper_location_POS', $load->shipper_location_POS)}}" class="form-control" placeholder="Enter point of contact">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Customer PoC</label>
                                                            <input disabled type="text" name="shipper_customer_POS" value="{{old('shipper_customer_POS', $load->shipper_customer_POS)}}" class="form-control" placeholder="Enter point of customer">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div id="ship_location_address1Group" class="form-group">
                                                            <label class="control-label">Address 1</label>
                                                            <input disabled type="text" name="shipper_address1" value="{{old('shipper_address1', $load->shipper_address1)}}" class="form-control" placeholder="Enter address">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Fax</label>
                                                            <input disabled class="form-control phoneMask" placeholder="Enter fax number" type="text" name="shipper_fax" value="{{old('shipper_fax', $load->shipper_fax)}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Address 2</label>
                                                            <input disabled type="text" name="shipper_address2" value="{{old('shipper_address2', $load->shipper_address2)}}" class="form-control" placeholder="Enter address">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3 col-xs-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Quantity</label>
                                                            <input disabled type="text" name="shipper_quantity" value="{{old('shipper_quantity', $load->shipper_quantity)}}" class="form-control editMainField" placeholder="Enter quantity">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <div class="form-group">
                                                            <label class="control-label">Type</label>
                                                            <input disabled name="shipper_type" value="{{$load->shipper_type}}" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">City</label>
                                                            <input disabled class="form-control" placeholder="Enter billing city" type="text" name="shipper_city" value="{{old('shipper_city', $load->shipper_city)}}">
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Weight</label>
                                                            <input disabled type="text" name="shipper_weight" value="{{old('shipper_weight', $load->shipper_weight)}}" class="form-control" placeholder="Enter weight">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">State/Province</label><br>
                                                            <select disabled name="shipper_state" value="{{old('shipper_state', $load->shipper_state)}}" class="selectpicker" required="true" data-live-search="true">
                                                                <option disabled selected value>Select State/Province</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'AL') selected @endif value="AL">AL (Alabama)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'AK') selected @endif value="AK">AK (Alaska)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'AZ') selected @endif value="AZ">AZ (Arizona)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'AR') selected @endif value="AR">AR (Arkansas)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'CA') selected @endif value="CA">CA (California)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'CO') selected @endif value="CO">CO (Colorado)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'CT') selected @endif value="CT">CT (Connecticut)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'DE') selected @endif value="DE">DE (Delaware)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'DC') selected @endif value="DC">DC (District of Columbia)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'FL') selected @endif value="FL">FL (Florida)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'GA') selected @endif value="GA">GA (Georgia)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'HI') selected @endif value="HI">HI (Hawaii)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'ID') selected @endif value="ID">ID (Idaho)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'IL') selected @endif value="IL">IL (Illinois)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'IN') selected @endif value="IN">IN (Indiana)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'IA') selected @endif value="IA">IA (Iowa)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'KS') selected @endif value="KS">KS (Kansas)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'KY') selected @endif value="KY">KY (Kentucky)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'LA') selected @endif value="LA">LA (Louisiana)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'ME') selected @endif value="ME">ME (Maine)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'MD') selected @endif value="MD">MD (Maryland)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'MA') selected @endif value="MA">MA (Massachusetts)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'MI') selected @endif value="MI">MI (Michigan)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'MN') selected @endif value="MN">MN (Minnesota)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'MS') selected @endif value="MS">MS (Mississippi)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'MO') selected @endif value="MO">MO (Missouri)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'MT') selected @endif value="MT">MT (Montana)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'NE') selected @endif value="NE">NE (Nebraska)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'NV') selected @endif value="NV">NV (Nevada)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'NH') selected @endif value="NH">NH (New Hampshire)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'NJ') selected @endif value="NJ">NJ (New Jersey)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'NM') selected @endif value="NM">NM (New Mexico)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'NY') selected @endif value="NY">NY (New York)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'NC') selected @endif value="NC">NC (North Carolina)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'ND') selected @endif value="ND">ND (North Dakota)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'OH') selected @endif value="OH">OH (Ohio)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'OK') selected @endif value="OK">OK (Oklahoma)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'OR') selected @endif value="OR">OR (Oregon)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'PA') selected @endif value="PA">PA (Pennsylvania)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'PR') selected @endif value="PR">PR (Puerto Rico)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'RI') selected @endif value="RI">RI (Rhode Island)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'SC') selected @endif value="SC">SC (South Carolina)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'SD') selected @endif value="SD">SD (South Dakota)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'TN') selected @endif value="TN">TN (Tennessee)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'TX') selected @endif value="TX">TX (Texas)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'UT') selected @endif value="UT">UT (Utah)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'VT') selected @endif value="VT">VT (Vermont)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'VA') selected @endif value="VA">VA (Virginia)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'WA') selected @endif value="WA">WA (Washington)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'WV') selected @endif value="WV">WV (West Virginia)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'WI') selected @endif value="WI">WI (Wisconsin)</option>
                                                                <option @if(old('shipper_state', $load->shipper_state) === 'WY') selected @endif value="WY">WY (Wyoming)</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Value</label>

                                                            <div class="input-group">
                                                                <span class="input-group-addon">$</span>
                                                                <input disabled type="number" name="shipper_value" value="{{old('shipper_value', $load->shipper_value)}}" class="form-control" placeholder="Enter value">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="shipper_zip_code">Zip Code</label>
                                                            <input disabled class="form-control requiredInputCustomer" placeholder="Enter zip code" type="text" name="shipper_zip_code" value="{{old('shipper_zip_code', $load->shipper_zip_code)}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xs-6">
                                                        <div id="insuranceEffectiveDateGroup" class="form-group">
                                                            <label class="control-label">Pickup Date</label>
                                                            <div class="input-group date datePicker defaultDatePicker">
                                                                <input disabled class="form-control" placeholder="Enter pichup date"  type="date" name="shipper_pickup_date" value="{{old('shipper_pickup_date', $load->shipper_pickup_date)}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Pickup #</label>
                                                            <input disabled type="text" name="shipper_pickup_number" value="{{old('shipper_pickup_number', $load->shipper_pickup_number)}}" class="form-control editMainField" placeholder="Enter pickup number">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Pickup Time</label>
                                                            <input disabled type="time" name="shipper_pickup_time" class="form-control input-small time-picker-input" value="{{old('shipper_pickup_time', $load->shipper_pickup_time)}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Pickup Note</label>
                                                            <textarea disabled class="form-control editMainField" name="shipper_notes" placeholder="Enter pickup notes">{{old('shipper_notes', $load->shipper_notes)}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12" id="consigneeContainer">
                                    @foreach($load->drops as $key => $drop)
                                        <div class="tab-item" id="consigneeItem">
                                            <input disabled type="hidden" name='consignee[{{$key}}][is_new]' class="is_new" value="false">
                                            <input disabled type="hidden" name='consignee[{{$key}}][id]'  value="{{$drop->id}}">
                                            <div class="card">
                                                <div class="card-header">Consignee Information</div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <label class="control-label">Company</label>
                                                                    <input disabled class="form-control consignee_company" placeholder="Enter company" required="required" type="text" name="consignee[{{$key}}][company]" value="{{$drop->company}}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3 col-xs-3">
                                                            <div class="form-group">
                                                                <label class="control-label" for="customer_phone">Phone</label>
                                                                <input disabled class="form-control requiredInputCustomer phoneMask consignee_phone" placeholder="Enter phone" required="required" type="text" name="consignee[{{$key}}][phone]" value="{{$drop->phone}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 col-xs-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Extension</label>
                                                                <input disabled class="form-control consignee_phone_extension" placeholder="Enter extension" type="text" name="consignee[{{$key}}][phone_extension]" value="{{$drop->phone_extension}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Contact</label>
                                                                <input disabled type="text" name="consignee[{{$key}}][contact_name]" value="{{$drop->contact_name}}" class="form-control consignee_contact_name" placeholder="Enter point of contact" tabindex="234">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Fax</label>
                                                                <input disabled type="text" name="consignee[{{$key}}][fax]" value="{{$drop->fax}}" class="form-control editMainField phoneMask consignee_fax" placeholder="Enter fax number">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Address 1</label>
                                                                <input disabled type="text" name="consignee[{{$key}}][address1]" value="{{$drop->address1}}" class="form-control consignee_address1" placeholder="Enter address">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Delivery #</label>
                                                                <input disabled type="text" name="consignee[{{$key}}][delivered_number]" value="{{$drop->delivered_number}}" class="consignee_delivered_number form-control editMainField" placeholder="Enter delivery number">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Address 2</label>
                                                                <input disabled type="text" name="consignee[{{$key}}][address2]" value="{{$drop->address2}}" class="consignee_address2 form-control" placeholder="Enter address">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group deliveryLocationPickupAtMsg-1613">
                                                                <label class="control-label">Delivery Date</label>
                                                                <div class="input-group date datePicker defaultDatePicker">
                                                                    <input disabled class="form-control consignee_delivery_date" placeholder="Enter delivery date"  type="date" name="consignee[{{$key}}][delivery_date]" value="{{$drop->delivery_date}}" min="{{date('Y-m-d')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div id="delivery_location_cityGroup" class="form-group deliveryLocationCityMsg-1613">
                                                                <label class="control-label">City</label>
                                                                <input disabled class="form-control consignee_city" placeholder="Enter city" required="required" type="text" name="consignee[{{$key}}][city]" value="{{$drop->city}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Delivery Time</label>
                                                                <input disabled type="time" name="consignee[{{$key}}][delivery_time]" class="consignee_delivery_time form-control input-small time-picker-input" value="{{$drop->delivery_time}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">State/Province</label><br>
                                                                <select disabled name="consignee[{{$key}}][delivery_state]" value="{{$drop->delivery_state}}" class="consignee_delivery_state selectpickeraa" required="true" data-live-search="true">
                                                                    <option disabled selected value>Select State/Province</option>
                                                                    <option @if($drop->delivery_state === 'AL') selected @endif value="AL">AL (Alabama)</option>
                                                                    <option @if($drop->delivery_state === 'AK') selected @endif value="AK">AK (Alaska)</option>
                                                                    <option @if($drop->delivery_state === 'AZ') selected @endif value="AZ">AZ (Arizona)</option>
                                                                    <option @if($drop->delivery_state === 'AR') selected @endif value="AR">AR (Arkansas)</option>
                                                                    <option @if($drop->delivery_state === 'CA') selected @endif value="CA">CA (California)</option>
                                                                    <option @if($drop->delivery_state === 'CO') selected @endif value="CO">CO (Colorado)</option>
                                                                    <option @if($drop->delivery_state === 'CT') selected @endif value="CT">CT (Connecticut)</option>
                                                                    <option @if($drop->delivery_state === 'DE') selected @endif value="DE">DE (Delaware)</option>
                                                                    <option @if($drop->delivery_state === 'DC') selected @endif value="DC">DC (District of Columbia)</option>
                                                                    <option @if($drop->delivery_state === 'FL') selected @endif value="FL">FL (Florida)</option>
                                                                    <option @if($drop->delivery_state === 'GA') selected @endif value="GA">GA (Georgia)</option>
                                                                    <option @if($drop->delivery_state === 'HI') selected @endif value="HI">HI (Hawaii)</option>
                                                                    <option @if($drop->delivery_state === 'ID') selected @endif value="ID">ID (Idaho)</option>
                                                                    <option @if($drop->delivery_state === 'IL') selected @endif value="IL">IL (Illinois)</option>
                                                                    <option @if($drop->delivery_state === 'IN') selected @endif value="IN">IN (Indiana)</option>
                                                                    <option @if($drop->delivery_state === 'IA') selected @endif value="IA">IA (Iowa)</option>
                                                                    <option @if($drop->delivery_state === 'KS') selected @endif value="KS">KS (Kansas)</option>
                                                                    <option @if($drop->delivery_state === 'KY') selected @endif value="KY">KY (Kentucky)</option>
                                                                    <option @if($drop->delivery_state === 'LA') selected @endif value="LA">LA (Louisiana)</option>
                                                                    <option @if($drop->delivery_state === 'ME') selected @endif value="ME">ME (Maine)</option>
                                                                    <option @if($drop->delivery_state === 'MD') selected @endif value="MD">MD (Maryland)</option>
                                                                    <option @if($drop->delivery_state === 'MA') selected @endif value="MA">MA (Massachusetts)</option>
                                                                    <option @if($drop->delivery_state === 'MI') selected @endif value="MI">MI (Michigan)</option>
                                                                    <option @if($drop->delivery_state === 'MN') selected @endif value="MN">MN (Minnesota)</option>
                                                                    <option @if($drop->delivery_state === 'MS') selected @endif value="MS">MS (Mississippi)</option>
                                                                    <option @if($drop->delivery_state === 'MO') selected @endif value="MO">MO (Missouri)</option>
                                                                    <option @if($drop->delivery_state === 'MT') selected @endif value="MT">MT (Montana)</option>
                                                                    <option @if($drop->delivery_state === 'NE') selected @endif value="NE">NE (Nebraska)</option>
                                                                    <option @if($drop->delivery_state === 'NV') selected @endif value="NV">NV (Nevada)</option>
                                                                    <option @if($drop->delivery_state === 'NH') selected @endif value="NH">NH (New Hampshire)</option>
                                                                    <option @if($drop->delivery_state === 'NJ') selected @endif value="NJ">NJ (New Jersey)</option>
                                                                    <option @if($drop->delivery_state === 'NM') selected @endif value="NM">NM (New Mexico)</option>
                                                                    <option @if($drop->delivery_state === 'NY') selected @endif value="NY">NY (New York)</option>
                                                                    <option @if($drop->delivery_state === 'NC') selected @endif value="NC">NC (North Carolina)</option>
                                                                    <option @if($drop->delivery_state === 'ND') selected @endif value="ND">ND (North Dakota)</option>
                                                                    <option @if($drop->delivery_state === 'OH') selected @endif value="OH">OH (Ohio)</option>
                                                                    <option @if($drop->delivery_state === 'OK') selected @endif value="OK">OK (Oklahoma)</option>
                                                                    <option @if($drop->delivery_state === 'OR') selected @endif value="OR">OR (Oregon)</option>
                                                                    <option @if($drop->delivery_state === 'PA') selected @endif value="PA">PA (Pennsylvania)</option>
                                                                    <option @if($drop->delivery_state === 'PR') selected @endif value="PR">PR (Puerto Rico)</option>
                                                                    <option @if($drop->delivery_state === 'RI') selected @endif value="RI">RI (Rhode Island)</option>
                                                                    <option @if($drop->delivery_state === 'SC') selected @endif value="SC">SC (South Carolina)</option>
                                                                    <option @if($drop->delivery_state === 'SD') selected @endif value="SD">SD (South Dakota)</option>
                                                                    <option @if($drop->delivery_state === 'TN') selected @endif value="TN">TN (Tennessee)</option>
                                                                    <option @if($drop->delivery_state === 'TX') selected @endif value="TX">TX (Texas)</option>
                                                                    <option @if($drop->delivery_state === 'UT') selected @endif value="UT">UT (Utah)</option>
                                                                    <option @if($drop->delivery_state === 'VT') selected @endif value="VT">VT (Vermont)</option>
                                                                    <option @if($drop->delivery_state === 'VA') selected @endif value="VA">VA (Virginia)</option>
                                                                    <option @if($drop->delivery_state === 'WA') selected @endif value="WA">WA (Washington)</option>
                                                                    <option @if($drop->delivery_state === 'WV') selected @endif value="WV">WV (West Virginia)</option>
                                                                    <option @if($drop->delivery_state === 'WI') selected @endif value="WI">WI (Wisconsin)</option>
                                                                    <option @if($drop->delivery_state === 'WY') selected @endif value="WY">WY (Wyoming)</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-6">
                                                            <label class="control-label">BOL Payment Term</label>
                                                            <div class="form-group">
                                                                <select disabled name="consignee[{{$key}}][BOL_payment_term]" value="{{$drop->BOL_payment_term}}" class="consignee_BOL_payment_term form-control">
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
                                                            <input disabled type="text" name="consignee[{{$key}}][delivery_location_zip_code]" value="{{$drop->delivery_location_zip_code}}" class="consignee_delivery_location_zip_code form-control editMainField tt-input" placeholder="Enter zip code">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">BOL #</label>
                                                                <input disabled type="text" name="consignee[{{$key}}][delivery_location_bol_number]" value="{{$drop->delivery_location_bol_number}}" class="consignee_delivery_location_bol_number form-control editMainField" placeholder="Enter BOL #" >
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
                                                                        <select disabled name="consignee[{{$key}}][freight_class]" id="freight-classes" class="consignee_freight_class form-control" tabindex="242">
                                                                            <option value="">Select Freight Class</option>
                                                                            <option @if($drop->freight_class === 'FAK') selected @endif value="FAK">FAK</option>
                                                                            <option @if($drop->freight_class === '50') selected @endif value="50">50</option>
                                                                            <option @if($drop->freight_class === '55') selected @endif value="55">55</option>
                                                                            <option @if($drop->freight_class === '60') selected @endif value="60">60</option>
                                                                            <option @if($drop->freight_class === '65') selected @endif value="65">65</option>
                                                                            <option @if($drop->freight_class === '70' ) selected @endif value="70">70</option>
                                                                            <option @if($drop->freight_class === '77.5') selected @endif value="77.5">77.5</option>
                                                                            <option @if($drop->freight_class === '85') selected @endif value="85">85</option>
                                                                            <option @if($drop->freight_class === '92.5') selected @endif value="92.5">92.5</option>
                                                                            <option @if($drop->freight_class === '100') selected @endif value="100">100</option>
                                                                            <option @if($drop->freight_class === '110') selected @endif value="110">110</option>
                                                                            <option @if($drop->freight_class === '125') selected @endif value="125">125</option>
                                                                            <option @if($drop->freight_class === '150') selected @endif value="150">150</option>
                                                                            <option @if($drop->freight_class === '175') selected @endif value="175">175</option>
                                                                            <option @if($drop->freight_class === '200') selected @endif value="200">200</option>
                                                                            <option @if($drop->freight_class === '250') selected @endif value="250">250</option>
                                                                            <option @if($drop->freight_class === '300') selected @endif value="300">300</option>
                                                                            <option @if($drop->freight_class === '400') selected @endif value="400">400</option>
                                                                            <option @if($drop->freight_class === '500') selected @endif value="500">500</option></select>
                                                                    </td>
                                                                    <td class="nmfc-td-width">
                                                                        <input disabled type="text" name="consignee[{{$key}}][national_motor_freight_class]" value="{{$drop->national_motor_freight_class}}" class="consignee_national_motor_freight_class form-control">
                                                                    </td>
                                                                    <td class="prod-td-width">
                                                                        <input disabled type="text" name="consignee[{{$key}}][bol_product]" value="{{$drop->bol_product}}" class="consignee_bol_product form-control">
                                                                    </td>
                                                                    <td class="qty-td-width">
                                                                        <input disabled type="text" name="consignee[{{$key}}][delivery_location_quantity]" value="{{$drop->delivery_location_quantity}}" class="consignee_delivery_location_quantity form-control">
                                                                    </td>
                                                                    <td class="type-td-width">
                                                                        <select disabled name="consignee[{{$key}}][item_type]" value="{{$drop->item_type}}" class="consignee_item_type form-control">
                                                                            <option value="">Select Type</option>
                                                                            <option @if($drop->item_type === 'Blueberries') selected @endif value="Blueberries">Blueberries</option>
                                                                            <option @if($drop->item_type === 'Boxes') selected @endif  value="Boxes">Boxes</option>
                                                                            <option @if($drop->item_type === 'Carrier Fee') selected @endif  value="Carrier Fee">Carrier Fee</option>
                                                                            <option @if($drop->item_type === 'Cartons') selected @endif  value="Cartons">Cartons</option>
                                                                            <option @if($drop->item_type === 'CWT') selected @endif  value="CWT">CWT</option>
                                                                            <option @if($drop->item_type === 'Flat Rate') selected @endif  value="Flat Rate">Flat Rate</option>
                                                                            <option @if($drop->item_type === 'Miles') selected @endif  value="Miles">Miles</option>
                                                                            <option @if($drop->item_type === 'Pallets') selected @endif  value="Pallets">Pallets</option>
                                                                            <option @if($drop->item_type === 'Pounds') selected @endif  value="Pounds">Pounds</option>
                                                                            <option @if($drop->item_type === 'Strawberries') selected @endif  value="Strawberries">Strawberries</option>
                                                                            <option @if($drop->item_type === 'Tons') selected @endif  value="Tons">Tons</option>
                                                                            <option @if($drop->item_type === 'ruck Ordered/Not Used') selected @endif  value="Truck Ordered/Not Used">Truck Ordered/Not Used</option></select>
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
                                                                        <input disabled type="text" name="consignee[{{$key}}][length]" value="{{$drop->length}}" class="consignee_length form-control" tabindex="247">
                                                                    </td>
                                                                    <td class="width-td-width">
                                                                        <input disabled type="text" name="consignee[{{$key}}][width]" value="{{$drop->width}}" class="consignee_width form-control" tabindex="248">
                                                                    </td>
                                                                    <td class="height-td-width">
                                                                        <input disabled type="text" name="consignee[{{$key}}][height]" value="{{$drop->height}}" class="consignee_height form-control" tabindex="249">
                                                                    </td>
                                                                    <td class="weight-td-width">
                                                                        <input disabled type="text" name="consignee[{{$key}}][delivery_location_weight]" value="{{$drop->delivery_location_weight}}" class="consignee_delivery_location_weight form-control" tabindex="250">
                                                                    </td>
                                                                    <td class="haz-mat-td-width">
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input disabled type="checkbox" value="1" name="consignee[{{$key}}][haz_mat]" class="consignee_haz_mat" value="{{$drop->haz_mat}}" id="carrier_use_dba_name">
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
                                                        <div class="form-group carrierMsg">
                                                            <label class="control-label">Carrier</label>
                                                            {{-- todo poxel ajax searchov--}}
                                                            <select disabled id="dispatcherUserSelect" name="carrier_id" class="form-control editMainField" tabindex="66">
                                                                <option value="">-- No Carrier Selected --</option>
                                                                @foreach($carriers as $carrier)
                                                                    <option @if(old('carrier_id', $load->carrier_id) == $carrier->id) selected @endif value="{{$carrier->id}}">{{$carrier->company}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Dispatcher</label>
                                                            {{-- todo avelacnel dispatcherner --}}
                                                            <select disabled id="dispatcherUserSelect" name="dispatcher_id" value="{{old('dispatcher_id', 1)}}" class="form-control editMainField" tabindex="66">
                                                                <option value="">-- No Dispatcher Selected --</option>
                                                                <option selected value="1">{{$load->dispatcher->full_name}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Truck #</label>
                                                            <input disabled type="text" name="truck_number" value="{{old('truck_number', $load->truck_number)}}" class="form-control editMainField" placeholder="Enter carrier truck number" tabindex="264">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Trailer #</label>
                                                            <input disabled type="text" name="trailer_number" value="{{old('trailer_number', $load->trailer_number)}}" class="form-control editMainField" placeholder="Enter carrier trailer number" tabindex="267">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Driver</label>
                                                            <input disabled type="text" name="driver" value="{{old('driver', $load->driver)}}" class="form-control editMainField" placeholder="Enter carrier driver name" tabindex="265">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Driver Cell #</label>
                                                            <input disabled type="text" name="driver_number" value="{{old('driver_number', $load->driver_number)}}" class="form-control editMainField phoneMask" placeholder="Enter carrier driver number" tabindex="268">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Pro #</label>
                                                            <input disabled type="text" name="pro_number" value="{{old('pro_number', $load->pro_number)}}" class="form-control editMainField" placeholder="Enter carrier pro number" tabindex="266">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Driver Email</label>
                                                            <input disabled type="email" name="driver_email" value="{{old('driver_email', $load->driver_email)}}" class="form-control editMainField" placeholder="Enter the driver's email address" tabindex="269">
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
                                            <div class="card-header">Carrier Costs</div>
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
                                                            <select disabled name="carrier_costs_units_id" class=" form-control editMainField input-sm" tabindex="73">
                                                                <option value="10613">Blueberries</option>
                                                                <option value="10612">Boxes</option>
                                                                <option value="10907">Carrier Fee</option>
                                                                <option value="10609">Cartons</option>
                                                                <option value="10606">CWT</option>
                                                                <option selected="" value="10607">Flat Rate</option>
                                                                <option value="10605">Miles</option>
                                                                <option value="10608">Pallets</option>
                                                                <option value="10611">Pounds</option>
                                                                <option value="10614">Strawberries</option>
                                                                <option value="10610">Tons</option>
                                                                <option value="10615">Truck Ordered/Not Used</option>
                                                            </select>
                                                        </td>
                                                        <td class="qtyColumn">
                                                            <input disabled name="carrier_costs_quantity" type="text" value="{{old('carrier_costs_quantity', $load->carrier_costs_quantity)}}" class=" form-control editMainField input-sm carrierCostInput carrierCostQuantityInput" disabled="" tabindex="75">
                                                        </td>
                                                        <td class="amtColumn">
                                                            <div class="input-group carrierCostInput">
                                                                <span class="input-group-addon">$</span>
                                                                <input disabled name="carrier_costs_rate_per_unit" value="{{old('carrier_costs_rate_per_unit', $load->carrier_costs_rate_per_unit)}}" type="text" class=" form-control editMainField input-sm" tabindex="76">
                                                            </div>
                                                        </td>
                                                        <td class="suggestColumn">
                                                        </td>
                                                        <td class="text-right">
                                                            <span class="grossColumn carrierCostGrossColumn">$0.00</span>
                                                        </td>
                                                    </tr>

                                                    <tr class="carrierStopsHeader">
                                                        <th></th>
                                                        <th>Stops</th>
                                                        <th>Cost/Stop</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                    <tr class="carrierStopsRow">
                                                        <td></td>
                                                        <td>
                                                            <input disabled name="stops" type="number" min="0" value="{{old('stops', $load->stops)}}" class=" form-control editMainField input-sm" tabindex="77">
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">$</span>
                                                                <input disabled name="cost_per_stop" type="text" class=" form-control input-sm" value="{{old('cost_per_stop', $load->cost_per_stop)}}"  tabindex="78">
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                        <td class="text-right"> <span class="grossColumn carrierCostsStopGrossColumn">$0.00</span></td>
                                                        <td></td>
                                                    </tr>


                                                    <tr>
                                                        <th>Miles</th>
                                                        <th>Fuel Surcharge</th>
                                                        <th>FS Rate</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input disabled name="miles" type="number" min="0" value="{{old('miles', $load->miles)}}" class="form-control input-sm">
                                                        </td>
                                                        <td>
                                                            <select disabled name="fuel_surcharge_type" class="form-control input-sm">
                                                                <option selected="">None</option>
                                                                <option value="Flat Rate">Flat Rate</option>
                                                                <option value="Per Mile">Per Mile</option>
                                                                <option value="Percentage">Percentage</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">$</span>
                                                                <input disabled name="fuel_surcharge_rate_dollar" type="text" class="form-control input-sm" value="{{old('fuel_surcharge_rate_dollar', $load->fuel_surcharge_rate_dollar)}}" disabled="">
                                                            </div>
                                                            <div class="input-group" style="display:none">
                                                                <input disabled name="fuel_surcharge_rate_percentage" type="text" class="form-control input-sm" value="{{old('fuel_surcharge_rate_percentage', $load->fuel_surcharge_rate_percentage)}}" disabled="">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                        <td><div></div></td>
                                                        <td class="text-right">
                                                            <span class="grossColumn carrierCostMilesGrossColumn">$0.00</span>
                                                        </td>
                                                        <td class="delColumn"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td style="text-align: right">Total Costs</td>
                                                        <td class="text-right">  <span class="grossColumn carrierCostTotalCostColumn">$0.00</span></td>
                                                        <td class="delColumn"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" style="text-align: right">Total</td>
                                                        <td class="text-right">  <span class="grossColumn carrierCostTotalGrossColumn">$0.00</span></td>
                                                        <td class="delColumn"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            Driver Advance
                                                        </td>

                                                        <td class="grossColumn">
                                                            <div class="input-group" style="float: right">
                                                                <span class="input-group-addon">$</span>
                                                                <input disabled name="driver_advance_gross" type="number" style="color: red" class="form-control input-sm" value="{{old('driver_advance_gross', $load->driver_advance_gross)}}">
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                    </tr>

                                                    <tr class="costBalanceDueRow">
                                                        <td colspan="4" style="text-align: right">Balance Due</td>
                                                        <td class="text-right">
                                                            <span class="grossColumn carrierCostBalanceDueColumn">$0.00</span>
                                                        </td>
                                                        <td class="delColumn"></td>
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

                @if(count($load->histories))
                <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                    <div id="history" class="tabcontent" style="display: block;">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <div class="tab-item">
                                        <div class="card">
                                            <div class="card-header history-card-header">History</div>
                                            <div class="card-body">
                                                @foreach($load->histories as $history)
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="entityLabelValue">
                                                                <div class="entityValue">{{$history->created_at}}</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="entityLabelValue">
                                                                <div class="entityValue">{{$history->info}}</div>
                                                            </div>
                                                        </div>
                                                            <div class="col-md-2">
                                                                <div class="entityLabelValue">
                                                                    @if(!$history->confirmed)
                                                                        <button class="btn btn-primary load-history-review" id="history-{{$history->id}}" data-id="{{$history->id}}" data-reviewer-id="{{Auth::user()->id}}">Confirm</button>
                                                                    @else
                                                                        Confirmed by {{$history->reviewer->email}}
                                                                    @endif
                                                                </div>
                                                            </div>

                                                    </div>
                                                    <hr>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
{{--        </form>--}}
    </div>
@endsection
