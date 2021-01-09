@extends('layouts.app')

@section('content')
    <div class="col-sm-12 loads-show">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item col-sm-2 load-tab">
                <a class="nav-link active" id="load-tab" data-toggle="tab" href="#load" role="tab" aria-controls="load" aria-selected="true">Load</a>
            </li>
            <li class="nav-item col-sm-2 customers-tab">
                <a class="nav-link" id="customer-tab" data-toggle="tab" href="#customers" role="tab" aria-controls="customers" aria-selected="false">Customers</a>
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
                                                <div class="col-sm-6 col-xs-6">
                                                    <div id="ship_location_companyGroup" class="form-group">
                                                        <label class="control-label">Company</label>
                                                        <div>
                                                            <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;"><input type="text" style="width: 100%; position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1; background: none 0% 0% / auto repeat scroll padding-box border-box rgb(255, 255, 255);" value="" class="form-control editMainField tt-hint" tabindex="-1" readonly="" autocomplete="off" spellcheck="false"><input type="text" id="ship_location_company" name="load_customer[ship_location_company]" style="width: 100%; position: relative; vertical-align: top; background-color: transparent;" value="" class="form-control editMainField tt-input" placeholder="Enter company" tabindex="211" autocomplete="off" spellcheck="false" dir="auto"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><span class="tt-dropdown-menu" style="position: fixed; z-index: 100; display: none;"><div class="tt-dataset-10"></div></span></span>
                                                            <input type="hidden" id="ship_location_id" name="load_customer[ship_location_id]" value="" tabindex="212">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Phone</label>
                                                        <input type="text" id="ship_location_phone" name="load_customer[ship_location_phone]" value="" class="form-control editMainField phoneMask" placeholder="Enter phone number" tabindex="12">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-xs-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Extension</label>
                                                        <input type="text" id="ship_location_phone_extension" name="load_customer[ship_location_phone_extension]" value="" class="form-control editMainField" placeholder="Enter extension" tabindex="13">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Location PoC</label>
                                                        <input type="text" id="ship_location_contact" name="load_customer[ship_location_contact_name]" value="" class="form-control editMainField" placeholder="Enter point of contact" tabindex="213">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Customer PoC</label>
                                                        <select id="customerContactSelect" name="load_customer[customer_contact_id]" class="form-control editMainField" tabindex="223">
                                                            <option value="">-- No Contact Selected --</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div id="ship_location_address1Group" class="form-group">
                                                        <label class="control-label">Address 1</label>
                                                        <input type="text" id="ship_location_address1" name="load_customer[ship_location_address1]" value="" class="form-control editMainField" placeholder="Enter address" tabindex="214">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Fax</label>
                                                        <input type="text" id="ship_location_fax" name="load_customer[ship_location_fax]" value="" class="form-control editMainField phoneMask" placeholder="Enter fax number" tabindex="224">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div id="ship_location_address2Group" class="form-group">
                                                        <label class="control-label">Address 2</label>
                                                        <input type="text" id="ship_location_address2" name="load_customer[ship_location_address2]" value="" class="form-control editMainField" placeholder="Enter address" tabindex="215">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="col-sm-6 col-xs-6 ship-location-quantity">
                                                        <div class="form-group">
                                                            <label class="control-label">Quantity</label>
                                                            <input type="text" name="load_customer[ship_location_quantity]" value="" class="form-control editMainField" placeholder="Enter quantity" tabindex="225">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-6 ship-location-type">
                                                        <div class="form-group">
                                                            <label class="control-label">Type</label>
                                                            <select name="load_customer[ship_location_type]" id="load_customer_ship_location_type" class="form-control" tabindex="226"><option value="">Select Type</option><option value="Blueberries">Blueberries</option>
                                                                <option value="Boxes">Boxes</option>
                                                                <option value="Carrier Fee">Carrier Fee</option>
                                                                <option value="Cartons">Cartons</option>
                                                                <option value="CWT">CWT</option>
                                                                <option value="Flat Rate">Flat Rate</option>
                                                                <option value="Miles">Miles</option>
                                                                <option value="Pallets">Pallets</option>
                                                                <option value="Pounds">Pounds</option>
                                                                <option value="Strawberries">Strawberries</option>
                                                                <option value="Tons">Tons</option>
                                                                <option value="Truck Ordered/Not Used">Truck Ordered/Not Used</option></select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div id="ship_location_cityGroup" class="form-group shipLocationCityMsg-1613">
                                                        <label class="control-label">City</label>
                                                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;"><input type="text" id="ship_location_city" name="load_customer[ship_location_city]" value="" class="form-control editMainField tt-input" placeholder="Enter city" tabindex="217" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><span class="tt-dropdown-menu" style="position: fixed; z-index: 100; display: none;"><div class="tt-dataset-11"></div></span></span>
                                                    </div>
                                                </div>


                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Weight</label>
                                                        <input type="text" name="load_customer[ship_location_weight]" value="" class="form-control editMainField" placeholder="Enter weight" tabindex="227">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div id="ship_location_stateGroup" class="form-group shipLocationStateMsg-1613">
                                                        <label class="control-label">State/Province</label>
                                                        <select name="load_customer[ship_location_state]" class="editMainField form-control chosen chosen-select" id="ship_location_state" tabindex="218" style="display: none;"><option value="">Select State/Province</option><optgroup label="United States"><option value="AL">AL (Alabama)</option><option value="AK">AK (Alaska)</option><option value="AZ">AZ (Arizona)</option><option value="AR">AR (Arkansas)</option><option value="CA">CA (California)</option><option value="CO">CO (Colorado)</option><option value="CT">CT (Connecticut)</option><option value="DE">DE (Delaware)</option><option value="DC">DC (District of Columbia)</option><option value="FL">FL (Florida)</option><option value="GA">GA (Georgia)</option><option value="HI">HI (Hawaii)</option><option value="ID">ID (Idaho)</option><option value="IL">IL (Illinois)</option><option value="IN">IN (Indiana)</option><option value="IA">IA (Iowa)</option><option value="KS">KS (Kansas)</option><option value="KY">KY (Kentucky)</option><option value="LA">LA (Louisiana)</option><option value="ME">ME (Maine)</option><option value="MD">MD (Maryland)</option><option value="MA">MA (Massachusetts)</option><option value="MI">MI (Michigan)</option><option value="MN">MN (Minnesota)</option><option value="MS">MS (Mississippi)</option><option value="MO">MO (Missouri)</option><option value="MT">MT (Montana)</option><option value="NE">NE (Nebraska)</option><option value="NV">NV (Nevada)</option><option value="NH">NH (New Hampshire)</option><option value="NJ">NJ (New Jersey)</option><option value="NM">NM (New Mexico)</option><option value="NY">NY (New York)</option><option value="NC">NC (North Carolina)</option><option value="ND">ND (North Dakota)</option><option value="OH">OH (Ohio)</option><option value="OK">OK (Oklahoma)</option><option value="OR">OR (Oregon)</option><option value="PA">PA (Pennsylvania)</option><option value="PR">PR (Puerto Rico)</option><option value="RI">RI (Rhode Island)</option><option value="SC">SC (South Carolina)</option><option value="SD">SD (South Dakota)</option><option value="TN">TN (Tennessee)</option><option value="TX">TX (Texas)</option><option value="UT">UT (Utah)</option><option value="VT">VT (Vermont)</option><option value="VA">VA (Virginia)</option><option value="WA">WA (Washington)</option><option value="WV">WV (West Virginia)</option><option value="WI">WI (Wisconsin)</option><option value="WY">WY (Wyoming)</option></optgroup><optgroup label="Canada"><option value="AB">AB (Alberta)</option><option value="BC">BC (British Columbia)</option><option value="MB">MB (Manitoba)</option><option value="NB">NB (New Brunswick)</option><option value="NF">NF (Newfoundland)</option><option value="NT">NT (Northwest Territory)</option><option value="NS">NS (Nova Scotia)</option><option value="NU">NU (Nunavut)</option><option value="ON">ON (Ontario)</option><option value="PE">PE (Prince Edward Island)</option><option value="QC">QC (Quebec)</option><option value="SK">SK (Saskatchewan)</option><option value="YT">YT (Yukon Territory)</option></optgroup><optgroup label="Mexican"><option value="AG">AG (Aguascalientes)</option><option value="BJ">BJ (Baja California)</option><option value="BS">BS (Baja California Sur)</option><option value="CP">CP (Campeche)</option><option value="CH">CH (Chiapas)</option><option value="CI">CI (Chihuahua)</option><option value="CU">CU (Coahuila)</option><option value="CL">CL (Colima)</option><option value="DF">DF (Distrito Federal)</option><option value="DG">DG (Durango)</option><option value="GJ">GJ (Guanajuato)</option><option value="GR">GR (Guerrero)</option><option value="HG">HG (Hidalgo)</option><option value="JA">JA (Jalisco)</option><option value="EM">EM (Mexico)</option><option value="MH">MH (Michoacan)</option><option value="MR">MR (Morelos)</option><option value="NA">NA (Nayarit)</option><option value="NL">NL (Nuevo León)</option><option value="OA">OA (Oaxaca)</option><option value="PU">PU (Puebla)</option><option value="QA">QA (Queretaro)</option><option value="QR">QR (Quintana Roo)</option><option value="SL">SL (San Luis Potosi)</option><option value="SI">SI (Sinaloa)</option><option value="SO">SO (Sonora)</option><option value="TA">TA (Tabasco)</option><option value="TM">TM (Tamaulipas)</option><option value="TL">TL (Tlaxcala)</option><option value="VZ">VZ (Veracruz)</option><option value="YC">YC (Yucatan)</option><option value="ZT">ZT (Zacatecas)</option></optgroup></select><div class="chosen-container chosen-container-single" style="width: 100%;" title="" id="ship_location_state_chosen"><a class="chosen-single" tabindex="-1"><span>Select State/Province</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off" tabindex="219"></div><ul class="chosen-results"></ul></div></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Value</label>

                                                        <div class="input-group input-group-sm">
                                                            <span class="input-group-addon">$</span>
                                                            <input type="text" id="load_customer_ship_location_value" name="load_customer[ship_location_value]" value="2,000.00" class="form-control editMainField" placeholder="Enter value" tabindex="228">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div id="ship_location_zip_codeGroup" class="form-group">
                                                        <label class="control-label">Zip Code</label>
                                                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;"><input type="text" id="ship_location_zip_code" name="load_customer[ship_location_zip_code]" value="" class="form-control editMainField tt-input" placeholder="Enter zip code" tabindex="220" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><span class="tt-dropdown-menu" style="position: fixed; z-index: 100; display: none;"><div class="tt-dataset-12"></div></span></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group shipLocationPickupAtMsg-1613">
                                                        <label class="control-label">Pickup Date</label>
                                                        <div class="input-group date dateTimeMainPicker" id="pickupAtDateTimePicker" onmouseover="$(this).datetimepicker({pickTime: false});" onkeydown="$(this).datetimepicker({pickTime: false});">
                                                            <input name="load_customer[ship_location_pickup_at]" type="text" class="form-control" value="" tabindex="229">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-calendar"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Pickup #</label>
                                                        <input type="text" name="load_customer[ship_location_pickup_number]" value="" class="form-control editMainField" placeholder="Enter pickup number" tabindex="221">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Pickup Time</label>
                                                        <input style="float:right;margin:3px;" type="checkbox" id="load_customer_ship_location_appointment" name="load_customer[ship_location_appointment]" tabindex="230">
                                                        <label style="font-weight:normal;float:right;" for="load_customer_ship_location_appointment">Appointment</label>
                                                        <div class="input-group">
                                                            <input type="text" name="load_customer[ship_location_pickup_time]" class="form-control input-small time-picker-input" value="" tabindex="231">
                                                            <div class="input-group-btn">
                                                                <button type="button" class="btn btn-default btn-sm time" onmouseover="$(this).datetimepicker({pickDate: false});"><i class="glyphicon glyphicon-time"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Pickup Note</label>
                                                        <textarea class="form-control editMainField" id="ship_location_notes" name="load_customer[ship_location_notes]" placeholder="Enter pickup notes" tabindex="222"></textarea>
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
                                            <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <p class="noEntitiesDefined">No stops have been added.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="tab-item">
                                    <div class="card">
                                        <div class="card-header">Consignee Information</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div id="delivery_location_companyGroup" class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Company</label>
                                                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;"><input type="text" id="delivery_location_company" name="load_customer[delivery_location_company]" value="" class="form-control editMainField tt-input" placeholder="Enter company" tabindex="232" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><span class="tt-dropdown-menu" style="position: fixed; z-index: 100; display: none;"><div class="tt-dataset-13"></div></span></span>
                                                        <input type="hidden" id="delivery_location_id" name="load_customer[delivery_location_id]" value="" tabindex="233">
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Phone</label>
                                                        <input type="text" id="delivery_location_phone" name="load_customer[delivery_location_phone]" value="" class="form-control editMainField phoneMask" placeholder="Enter phone number" tabindex="35">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-xs-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Extension</label>
                                                        <input type="text" id="delivery_location_phone_extension" name="load_customer[delivery_location_phone_extension]" value="" class="form-control editMainField" placeholder="Enter extension" tabindex="36">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Contact</label>
                                                        <input type="text" id="delivery_location_contact" name="load_customer[delivery_location_contact_name]" value="" class="form-control editMainField" placeholder="Enter point of contact" tabindex="234">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Fax</label>
                                                        <input type="text" id="delivery_location_fax" name="load_customer[delivery_location_fax]" value="" class="form-control editMainField phoneMask" placeholder="Enter fax number" tabindex="254">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div id="delivery_location_address1Group" class="form-group">
                                                        <label class="control-label">Address 1</label>
                                                        <input type="text" id="delivery_location_address1" name="load_customer[delivery_location_address1]" value="" class="form-control editMainField" placeholder="Enter address" tabindex="235">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Delivery #</label>
                                                        <input type="text" name="load_customer[delivery_location_delivered_number]" value="" class="form-control editMainField" placeholder="Enter delivery number" tabindex="255">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Address 2</label>
                                                        <input type="text" id="delivery_location_address2" name="load_customer[delivery_location_address2]" value="" class="form-control editMainField" placeholder="Enter address" tabindex="236">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group deliveryLocationPickupAtMsg-1613">
                                                        <label class="control-label">Delivery Date</label>
                                                        <div class="input-group date dateTimeMainPicker" id="deliveredAtDateTimePicker" onmouseover="$(this).datetimepicker({pickTime: false});" onkeydown="$(this).datetimepicker({pickTime: false});">
                                                            <input name="load_customer[delivery_location_delivered_at]" type="text" class="form-control editMainField" value="" tabindex="256">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-calendar"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div id="delivery_location_cityGroup" class="form-group deliveryLocationCityMsg-1613">
                                                        <label class="control-label">City</label>
                                                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;"><input type="text" id="delivery_location_city" name="load_customer[delivery_location_city]" value="" class="form-control editMainField tt-input" placeholder="Enter city" tabindex="237" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><span class="tt-dropdown-menu" style="position: fixed; z-index: 100; display: none;"><div class="tt-dataset-14"></div></span></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Delivery Time</label>
                                                        <input style="float:right;margin:3px;" type="checkbox" id="load_customer_delivery_location_appointment" name="load_customer[delivery_location_appointment]" tabindex="257">
                                                        <label style="font-weight:normal;float:right;" for="load_customer_delivery_location_appointment">Appointment</label>
                                                        <div class="input-group">
                                                            <input type="text" name="load_customer[delivery_location_delivered_time]" class="form-control input-small time-picker-input" value="" tabindex="258">
                                                            <div class="input-group-btn">
                                                                <button type="button" class="btn btn-default btn-sm time" onmouseover="$(this).datetimepicker({pickDate: false});"><i class="glyphicon glyphicon-time"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div id="delivery_location_stateGroup" class="form-group deliveryLocationStateMsg-1613">
                                                        <label class="control-label">State/Province</label>
                                                        <select name="load_customer[delivery_location_state]" class="editMainField form-control chosen chosen-select" id="delivery_location_state" tabindex="238" style="display: none;"><option value="">Select State/Province</option><optgroup label="United States"><option value="AL">AL (Alabama)</option><option value="AK">AK (Alaska)</option><option value="AZ">AZ (Arizona)</option><option value="AR">AR (Arkansas)</option><option value="CA">CA (California)</option><option value="CO">CO (Colorado)</option><option value="CT">CT (Connecticut)</option><option value="DE">DE (Delaware)</option><option value="DC">DC (District of Columbia)</option><option value="FL">FL (Florida)</option><option value="GA">GA (Georgia)</option><option value="HI">HI (Hawaii)</option><option value="ID">ID (Idaho)</option><option value="IL">IL (Illinois)</option><option value="IN">IN (Indiana)</option><option value="IA">IA (Iowa)</option><option value="KS">KS (Kansas)</option><option value="KY">KY (Kentucky)</option><option value="LA">LA (Louisiana)</option><option value="ME">ME (Maine)</option><option value="MD">MD (Maryland)</option><option value="MA">MA (Massachusetts)</option><option value="MI">MI (Michigan)</option><option value="MN">MN (Minnesota)</option><option value="MS">MS (Mississippi)</option><option value="MO">MO (Missouri)</option><option value="MT">MT (Montana)</option><option value="NE">NE (Nebraska)</option><option value="NV">NV (Nevada)</option><option value="NH">NH (New Hampshire)</option><option value="NJ">NJ (New Jersey)</option><option value="NM">NM (New Mexico)</option><option value="NY">NY (New York)</option><option value="NC">NC (North Carolina)</option><option value="ND">ND (North Dakota)</option><option value="OH">OH (Ohio)</option><option value="OK">OK (Oklahoma)</option><option value="OR">OR (Oregon)</option><option value="PA">PA (Pennsylvania)</option><option value="PR">PR (Puerto Rico)</option><option value="RI">RI (Rhode Island)</option><option value="SC">SC (South Carolina)</option><option value="SD">SD (South Dakota)</option><option value="TN">TN (Tennessee)</option><option value="TX">TX (Texas)</option><option value="UT">UT (Utah)</option><option value="VT">VT (Vermont)</option><option value="VA">VA (Virginia)</option><option value="WA">WA (Washington)</option><option value="WV">WV (West Virginia)</option><option value="WI">WI (Wisconsin)</option><option value="WY">WY (Wyoming)</option></optgroup><optgroup label="Canada"><option value="AB">AB (Alberta)</option><option value="BC">BC (British Columbia)</option><option value="MB">MB (Manitoba)</option><option value="NB">NB (New Brunswick)</option><option value="NF">NF (Newfoundland)</option><option value="NT">NT (Northwest Territory)</option><option value="NS">NS (Nova Scotia)</option><option value="NU">NU (Nunavut)</option><option value="ON">ON (Ontario)</option><option value="PE">PE (Prince Edward Island)</option><option value="QC">QC (Quebec)</option><option value="SK">SK (Saskatchewan)</option><option value="YT">YT (Yukon Territory)</option></optgroup><optgroup label="Mexican"><option value="AG">AG (Aguascalientes)</option><option value="BJ">BJ (Baja California)</option><option value="BS">BS (Baja California Sur)</option><option value="CP">CP (Campeche)</option><option value="CH">CH (Chiapas)</option><option value="CI">CI (Chihuahua)</option><option value="CU">CU (Coahuila)</option><option value="CL">CL (Colima)</option><option value="DF">DF (Distrito Federal)</option><option value="DG">DG (Durango)</option><option value="GJ">GJ (Guanajuato)</option><option value="GR">GR (Guerrero)</option><option value="HG">HG (Hidalgo)</option><option value="JA">JA (Jalisco)</option><option value="EM">EM (Mexico)</option><option value="MH">MH (Michoacan)</option><option value="MR">MR (Morelos)</option><option value="NA">NA (Nayarit)</option><option value="NL">NL (Nuevo León)</option><option value="OA">OA (Oaxaca)</option><option value="PU">PU (Puebla)</option><option value="QA">QA (Queretaro)</option><option value="QR">QR (Quintana Roo)</option><option value="SL">SL (San Luis Potosi)</option><option value="SI">SI (Sinaloa)</option><option value="SO">SO (Sonora)</option><option value="TA">TA (Tabasco)</option><option value="TM">TM (Tamaulipas)</option><option value="TL">TL (Tlaxcala)</option><option value="VZ">VZ (Veracruz)</option><option value="YC">YC (Yucatan)</option><option value="ZT">ZT (Zacatecas)</option></optgroup></select><div class="chosen-container chosen-container-single" style="width: 100%;" title="" id="delivery_location_state_chosen"><a class="chosen-single" tabindex="-1"><span>Select State/Province</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off" tabindex="239"></div><ul class="chosen-results"></ul></div></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label class="control-label">BOL Payment Term</label>
                                                    <div class="form-group">
                                                        <div class="col-sm-6 col-xs-6" style="padding-left:0px;">
                                                            <select name="load_customer[third_party_billing]" id="load_customer_third_party_billing" class="form-control" tabindex="259"><option selected="selected" value="0">Prepaid</option>
                                                                <option value="1">Collect</option>
                                                                <option value="2">Third Party</option></select>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-6">
                                                            <a id="third-party-billing-action" class="action-link" href="javascript:" title="Add 3rd Party Billing"><i class="fa fa-plus"></i> 3rd Party Billing</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Zip Code</label>
                                                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;"><input type="text" id="delivery_location_zip_code" name="load_customer[delivery_location_zip_code]" value="" class="form-control editMainField tt-input" placeholder="Enter zip code" tabindex="241" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><span class="tt-dropdown-menu" style="position: fixed; z-index: 100; display: none;"><div class="tt-dataset-15"></div></span></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">BOL #</label>
                                                        <input type="text" name="load_customer[delivery_location_bol_number]" value="" class="form-control editMainField" placeholder="Enter BOL #" tabindex="260">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="" style="text-align: right">
                                                        <a href="javascript:" class="add-class-dimensions" onclick="addNewClassDimensionsRow()"><i class="glyphicon glyphicon-plus"></i>
                                                            Class/Dimensions</a>
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
                                                                <select name="freight_class" id="freight-classes" class="form-control" tabindex="242"><option value="">Select Freight Class</option><option value="FAK">FAK</option>
                                                                    <option value="50">50</option>
                                                                    <option value="55">55</option>
                                                                    <option value="60">60</option>
                                                                    <option value="65">65</option>
                                                                    <option value="70">70</option>
                                                                    <option value="77.5">77.5</option>
                                                                    <option value="85">85</option>
                                                                    <option value="92.5">92.5</option>
                                                                    <option value="100">100</option>
                                                                    <option value="110">110</option>
                                                                    <option value="125">125</option>
                                                                    <option value="150">150</option>
                                                                    <option value="175">175</option>
                                                                    <option value="200">200</option>
                                                                    <option value="250">250</option>
                                                                    <option value="300">300</option>
                                                                    <option value="400">400</option>
                                                                    <option value="500">500</option></select>
                                                            </td>
                                                            <td class="nmfc-td-width">
                                                                <input type="text" name="load_customer[national_motor_freight_class]" value="" class="form-control" tabindex="243">
                                                            </td>
                                                            <td class="prod-td-width">
                                                                <input type="text" name="load_customer[bol_product]" value="general goods" class="form-control" tabindex="244">
                                                            </td>
                                                            <td class="qty-td-width">
                                                                <input type="text" name="load_customer[delivery_location_quantity]" value="" class="form-control" tabindex="245">
                                                            </td>
                                                            <td class="type-td-width">
                                                                <select name="load_customer[delivery_location_type]" id="item-types" class="form-control" tabindex="246"><option value="">Select Type</option><option value="Blueberries">Blueberries</option>
                                                                    <option value="Boxes">Boxes</option>
                                                                    <option value="Carrier Fee">Carrier Fee</option>
                                                                    <option value="Cartons">Cartons</option>
                                                                    <option value="CWT">CWT</option>
                                                                    <option value="Flat Rate">Flat Rate</option>
                                                                    <option value="Miles">Miles</option>
                                                                    <option value="Pallets">Pallets</option>
                                                                    <option value="Pounds">Pounds</option>
                                                                    <option value="Strawberries">Strawberries</option>
                                                                    <option value="Tons">Tons</option>
                                                                    <option value="Truck Ordered/Not Used">Truck Ordered/Not Used</option></select>
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
                                                                <input type="text" name="load_customer[length]" value="" class="form-control" tabindex="247">
                                                            </td>
                                                            <td class="width-td-width">
                                                                <input type="text" name="load_customer[width]" value="" class="form-control" tabindex="248">
                                                            </td>
                                                            <td class="height-td-width">
                                                                <input type="text" name="load_customer[height]" value="" class="form-control" tabindex="249">
                                                            </td>
                                                            <td class="weight-td-width">
                                                                <input type="text" name="load_customer[delivery_location_weight]" value="" class="form-control" tabindex="250">
                                                            </td>
                                                            <td class="haz-mat-td-width">
                                                                <input style="height:25px;width:25px" type="checkbox" name="load_customer[haz_mat]" class="form-control" tabindex="251">
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                </div>

                                                <div class="row bol-report-row">
                                                    <div class="col-sm-12" style="margin-top:10px;padding:0px;">
                                                        <div class="form-group">
                                                            <div style="float:left;width:80%">
                                                                <label class="control-label label-wrapper">
                                                                    <span>BOL Note</span>
                                                                </label>
                                                            </div>
                                                            <div style="text-align:right;float:right;width:20%">
                                                                <a href="javascript:" class="bol-report-action" onclick="showBolReportEmailDialog();" title="Email BOL Report"><i class="fa fa-envelope-o"></i></a>
                                                                <a href="/loads/11113/1613/create_bol_report" target="_blank" class="bol-report-action"><i class="fa fa-file-pdf-o"></i> Bill of Lading</a>
                                                            </div>
                                                            <textarea class="form-control editMainField" name="load_customer[delivery_location_bol_notes]" placeholder="Enter BOL note" tabindex="252"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Delivery Note</label>
                                                        <textarea class="form-control editMainField" id="delivery_location_notes" name="load_customer[delivery_location_notes]" placeholder="Enter delivery notes" tabindex="253"></textarea>
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
                                                        <label class="control-label" style="width:100%;">Carrier</label>
                                                        <div style="padding:0;" class="col-sm-11">
                                                            <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;"><input type="text" id="loadCarrierSelect" name="" value="" class="form-control editMainField tt-input" placeholder="Click to see Suggested Carriers or Search by Name / MC" tabindex="261" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><span class="tt-dropdown-menu" style="position: fixed; z-index: 100; display: none;"><div class="tt-dataset-9"></div></span></span>
                                                            <input type="hidden" name="carrier_id" id="carrier-id" tabindex="262">
                                                            <input type="hidden" name="hidden_carrier_id" id="hidden-carrier-id" tabindex="263">
                                                            <div class="hidden new-carrier-link">https://login.brokerpro.com/carriers/new</div>
                                                        </div>
                                                        <div style="padding:0;" class="col-sm-1" id="loadCarrierRemove">
                                                            <button title="Remove the selected carrier from this load." type="button" class="btn btn-default btn-sm" style="margin: 0px;" onclick="$('#loadCarrierSelect').val('');$('#hidden-carrier-id').val('');$('#carrier-id').val('');">
                                                                <i class="fa fa-times" style="font-size: 16px;"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
{{--                                                <script type="text/javascript">--}}
{{--                                                    function carrierChanged(flag, flagged) {--}}
{{--                                                        onCarrierSelectionChanged(16931, 244839, '247579', '', true, '', flag, flagged);--}}
{{--                                                    }--}}
{{--                                                </script>--}}

                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Dispatcher</label>
                                                        <select id="dispatcherUserSelect" name="dispatcher_user_id" class="form-control editMainField" tabindex="66">
                                                            <option value="">-- No Dispatcher Selected --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Truck #</label>
                                                        <input type="text" name="truck_number" value="" class="form-control editMainField" placeholder="Enter carrier truck number" tabindex="264">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Trailer #</label>
                                                        <input type="text" name="trailer_number" value="" class="form-control editMainField" placeholder="Enter carrier trailer number" tabindex="267">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Driver</label>
                                                        <input type="text" name="driver" value="" class="form-control editMainField" placeholder="Enter carrier driver name" tabindex="265">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Driver Cell #</label>
                                                        <input type="text" name="driver_number" value="" class="form-control editMainField phoneMask" placeholder="Enter carrier driver number" tabindex="268">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Pro #</label>
                                                        <input type="text" name="pro_number" value="" class="form-control editMainField" placeholder="Enter carrier pro number" tabindex="266">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Driver Email</label>
                                                        <input type="email" name="driver_email" value="" class="form-control editMainField" placeholder="Enter the driver's email address" tabindex="269">
                                                    </div>
                                                </div>
                                            </div>
                                            <a style="margin-right:10px;" href="javascript:" onclick="showDispatcherEmailDialog()" title="Select a dispatcher to view information" class="bol-report-action" onmouseover="var dispid = (($('#dispatcherUserSelect').prop('selectedIndex'))-1); var dispinfo = 'Click to email \n' + carrier_contacts[dispid]['email']; dispinfo += '\n' + carrier_contacts[dispid]['phone']; $(this).prop('title', dispinfo);"><span class="fa fa-envelope-o"></span> Email Dispatcher</a>
                                            <a style="margin-right:10px;" href="javascript:" title="Email the driver a load confirmation." class="bol-report-action" onclick="showSendDriverConfirmationDialog();"><span class="fa fa-envelope-o" title="Send an email confirmation to the driver"></span> Email Load Instructions</a>
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
                                                        <select name="load_carrier_costs[0][units_id]" class=" form-control editMainField input-sm carrierCostUnitsInput" onchange="onCarrierCostUnitsChanged()" tabindex="73">
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
                                                        <input id="load_carrier_cost_0_id" type="hidden" name="load_carrier_costs[0][id]" value="2234957" tabindex="74">
                                                    </td>
                                                    <td class="qtyColumn"><input name="load_carrier_costs[0][quantity]" type="text" value="1.0" class=" form-control editMainField input-sm carrierCostInput carrierCostQuantityInput" onkeyup="updateCarrierCosts()" onchange="updateCarrierCosts()" disabled="" tabindex="75"></td>
                                                    <td class="amtColumn">
                                                        <div class="input-group input-group-sm carrierCostInput">
                                                            <span class="input-group-addon">$</span>
                                                            <input name="load_carrier_costs[0][rate_per_unit]" type="text" class=" form-control editMainField input-sm carrierCostPerUnitInput" value="0.00" onkeyup="updateCarrierCosts()" tabindex="76">
                                                        </div>
                                                    </td>
                                                    <td class="suggestColumn">
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="grossColumn carrierCostGrossColumn">$0.00</span>
                                                    </td>
                                                    <td class="delColumn">
                                                        <span class="tableAction glyphicon glyphicon-remove carrierRemoveCost" title="Remove this cost" onclick="removeCarrierCostRow(this)" style="display: none;"></span>
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
                                                    <td><input id="load_customer_carrier_stop" name="stops" type="number" min="0" value="0" class=" form-control editMainField input-sm carrierCostInput carrierCostStopsInput" onkeyup="updateCarrierCosts()" onchange="updateCarrierCosts()" tabindex="77"></td>
                                                    <td>
                                                        <div class="input-group input-group-sm carrierCostInput">
                                                            <span class="input-group-addon">$</span>
                                                            <input name="cost_per_stop" type="text" class=" form-control editMainField input-sm carrierCostPerStopInput" value="" onkeyup="updateCarrierCosts()" tabindex="78">
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
                                                    <td><input id="carrierMilesInput" name="miles" type="number" min="0" value="" class=" form-control editMainField input-sm carrierCostInput carrierCostNumberMilesInput" onkeyup="updateCarrierCosts()" onchange="updateCarrierCosts()" tabindex="79"></td>
                                                    <td>
                                                        <select id="carrierFuelSurchargeSelect" name="fuel_surcharge_type" class=" form-control editMainField input-sm" onchange="onCarrierFuelSurchargeChanged()" tabindex="80">
                                                            <option selected="">None</option>  <option>Flat Rate</option>  <option>Per Mile</option>  <option>Percentage</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <div id="carrierFuelSurchargeDollarContainer" class="input-group input-group-sm carrierCostInput" style="">
                                                            <span class="input-group-addon">$</span>
                                                            <input id="carrierFuelSurchargeDollarInput" name="fuel_surcharge_rate_dollar" type="text" class=" form-control editMainField input-sm carrierCostFSRateInput" value="" disabled="" onkeyup="updateCarrierCosts()" tabindex="81">
                                                        </div>
                                                        <div id="carrierFuelSurchargePercentageContainer" class="input-group input-group-sm carrierCostInput" style="display:none">
                                                            <input id="carrierFuelSurchargePercentageInput" name="fuel_surcharge_rate_percentage" type="text" class=" form-control editMainField input-sm carrierCostFSPCNTGInput" value="0" disabled="" onkeyup="updateCarrierCosts()" onchange="updateCarrierCosts()" tabindex="82">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
                                                    </td>
                                                    <td><div id="carrierSuggestedFuelSurchargeRate"></div></td>
                                                    <td class="text-right">  <span class="grossColumn carrierCostMilesGrossColumn">$0.00</span></td>
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
                                                        <div class="input-group input-group-sm carrierCostInput" style="float: right">
                                                            <span class="input-group-addon">$</span>
                                                            <input name="driver_advance_gross" type="text" style="color: red" class="form-control editMainField input-sm carrierCostDriverAdvanceInput" value="" onkeyup="updateCarrierCosts()" tabindex="83">
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                </tr>

                                                <tr class="costBalanceDueRow">
                                                    <td colspan="4" style="text-align: right">Balance Due</td>
                                                    <td class="text-right">  <span class="grossColumn carrierCostBalanceDueColumn">$0.00</span></td>
                                                    <td class="delColumn"></td>
                                                </tr>

                                                </tbody>
                                            </table>

                                            <a href="javascript:" onclick="showSendCarrierConfirmationOneDialog()" title="Email carrier confirmation one" class=""><i class="fa fa-envelope-o"></i></a>
                                            <a href="/loads/11113/1613/carrier_confirmation_one.pdf" class="actionLink " target="_blank"><i class="fa fa-file-pdf-o"></i> Carrier Confirmation One</a>
                                            <a href="javascript:" onclick="showSendCarrierConfirmationTwoDialog()" title="Email carrier confirmation two" class=""><i class="fa fa-envelope-o"></i></a>
                                            <a href="/loads/11113/1613/carrier_confirmation_two.pdf" class="actionLink " target="_blank"><i class="fa fa-file-pdf-o"></i> Carrier Confirmation Two</a>

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
                                                <div class="col-sm-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Company</div>
                                                        <div class="entityValue">AG SOURCE, INC.</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Status</div>
                                                        <div class="entityValue">Active</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Phone</div>
                                                        <div class="entityValue"><a href="tel:(785) 841-1315">(785) 841-1315</a></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Address</div>
                                                        <div class="entityValue"><a href="https://maps.google.com/?q=4910 CORPORATE CENTRE DR., STE 110 LAWRENCE, KS 66047" target="_blank">4910 CORPORATE CENTRE DR., STE 110<br>LAWRENCE, KS 66047</a></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Shipper</div>
                                                        <div class="entityValue">No</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Consignee</div>
                                                        <div class="entityValue">No</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Credit Limit</div>
                                                        <div class="entityValue">$10000</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Currency</div>
                                                        <div class="entityValue">USD</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Product</div>
                                                        <div class="entityValue">general goods</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Smart Way Carriers Preferred</div>
                                                        <div class="entityValue">No</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-item">
                                        <div class="card">
                                            <div class="card-header">
                                                <span>Preferred Carriers</span>
                                                <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <p class="noEntitiesDefined">No Preferred Carriers.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <!-- Company Information -->
                        <div class="col-sm-4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="entityPanelTitle">Billing Information</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Company</div>
                                                    <div class="entityValue">AG SOURCE, INC.</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Phone</div>
                                                    <div class="entityValue"><a href="tel:(785) 841-1315">(785) 841-1315</a></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Address</div>
                                                    <div class="entityValue"><a href="https://maps.google.com/?q=4910 CORPORATE CENTRE DR., STE 110 LAWRENCE, KS 66047" target="_blank">4910 CORPORATE CENTRE DR., STE 110<br>LAWRENCE, KS 66047</a></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Require PO # to Invoice</div>
                                                    <div class="entityValue">No</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                        <div class="card-header">
                                            <div class="entityPanelTitle">Reports</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4"><div class="entityLabelValue"><a href="/accounting/customers/aging?customer=16931-AG SOURCE, INC.">Aging Detail</a></div></div>
                                                <div class="col-sm-4"><div class="entityLabelValue"><a href="/loads/search/advanced/results?customers[]=16931-AG SOURCE, INC.">Load History</a></div></div>
                                                <!--<div class="col-sm-4"><div class="entityLabelValue"><a href="?customer=-"><nobr>Aging Summary</nobr></a></div></div>-->
                                                <div class="col-sm-4"><div class="entityLabelValue"><a href="/accounting/customers/invoice_summary?customer=16931-AG SOURCE, INC.">Invoice Status</a></div></div>
                                                <div class="col-sm-4"><div class="entityLabelValue"><a href="/accounting/show_commissions_report?customers[]=16931&amp;single_customer=true&amp;status=Invoiced">Commissions Report</a></div></div>
                                                <div class="col-sm-4"><div class="entityLabelValue"><a href="javascript:" onclick="showCustomerAgingSummary(16931, null, false, function(){});" id="aging-summary"><nobr>Aging Summary</nobr></a></div></div>
                                                <div class="col-sm-4"><div class="entityLabelValue"><a href="/accounting/customers/sales_summary?customer=16931-AG SOURCE, INC."><nobr>Sales Summary</nobr></a></div></div>
                                                <div class="col-sm-4"><div class="entityLabelValue"><a href="/accounting/customers/performance?customer=16931-AG SOURCE, INC.">Performance</a></div></div>
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
@endsection
