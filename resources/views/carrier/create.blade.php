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
    <div class="col-md-12">
        <div class="row justify-content-center">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-md-12">
                <div class="card-header">Create Carrier</div>
                <form method="POST" action="{{route('carriers.store')}}">
                    @csrf
                    <div class="card col-md-6">
{{--                        <div class="card-header">*Companie information</div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Company</label>--}}
{{--                                <input name="company" type="text" class="form-control" placeholder="Company name" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleFormControlSelect1">Status</label>--}}
{{--                                <select class="form-control" name="status">--}}
{{--                                    <option>Active</option>--}}
{{--                                    <option>Inactive</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Phone</label>--}}
{{--                                <input name="phone" type="text" class="form-control" placeholder="Phone Number" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Fax</label>--}}
{{--                                <input name="fax" type="text" class="form-control" placeholder="Fax Number">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Address</label>--}}
{{--                                <input name="address" type="text" class="form-control" placeholder="Address" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Currency</label>--}}
{{--                                <input name="currency" type="text" class="form-control" placeholder="Currency" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Payee Company</label>--}}
{{--                                <input name="payeeCompany" type="text" class="form-control" placeholder="Payee Company" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Payee Phone</label>--}}
{{--                                <input name="payeePhone" type="text" class="form-control" placeholder="Payee Phone">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Payee Address</label>--}}
{{--                                <input name="payeeAddress" type="text" class="form-control" placeholder="Payee Address" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>MC Number</label>--}}
{{--                                <input name="mcNumber" type="text" class="form-control" placeholder="Payee Address" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Dot Number</label>--}}
{{--                                <input name="dotNumber" type="number" class="form-control" placeholder="MC Number" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-check" style="padding: 0 0 21px 0;">--}}
{{--                                <input name="preferredCarrierStatus" type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--                                <label class="form-check-label" for="exampleCheck1" style="padding-left: 20px;">Preferred Carrier Status</label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check" style="padding: 0 0 21px 0;">--}}
{{--                                <input name="smartwayCertified" type="checkbox" class="form-check-input" id="exampleCheck2">--}}
{{--                                <label class="form-check-label" for="exampleCheck2" style="padding-left: 20px;">Smartway Certified</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <div class="card col-md-6">
{{--                        <div class="card-header">Payee information</div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Company</label>--}}
{{--                                <input name="company" type="text" class="form-control" placeholder="Company name" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleFormControlSelect1">Status</label>--}}
{{--                                <select class="form-control" name="status">--}}
{{--                                    <option>Active</option>--}}
{{--                                    <option>Inactive</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Phone</label>--}}
{{--                                <input name="phone" type="text" class="form-control" placeholder="Phone Number" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Fax</label>--}}
{{--                                <input name="fax" type="text" class="form-control" placeholder="Fax Number">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Address</label>--}}
{{--                                <input name="address" type="text" class="form-control" placeholder="Address" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Currency</label>--}}
{{--                                <input name="currency" type="text" class="form-control" placeholder="Currency" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Payee Company</label>--}}
{{--                                <input name="payeeCompany" type="text" class="form-control" placeholder="Payee Company" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Payee Phone</label>--}}
{{--                                <input name="payeePhone" type="text" class="form-control" placeholder="Payee Phone">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Payee Address</label>--}}
{{--                                <input name="payeeAddress" type="text" class="form-control" placeholder="Payee Address" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>MC Number</label>--}}
{{--                                <input name="mcNumber" type="text" class="form-control" placeholder="Payee Address" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Dot Number</label>--}}
{{--                                <input name="dotNumber" type="number" class="form-control" placeholder="MC Number" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-check" style="padding: 0 0 21px 0;">--}}
{{--                                <input name="preferredCarrierStatus" type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--                                <label class="form-check-label" for="exampleCheck1" style="padding-left: 20px;">Preferred Carrier Status</label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check" style="padding: 0 0 21px 0;">--}}
{{--                                <input name="smartwayCertified" type="checkbox" class="form-check-input" id="exampleCheck2">--}}
{{--                                <label class="form-check-label" for="exampleCheck2" style="padding-left: 20px;">Smartway Certified</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
{{--//////////////////////////////////////////////////////////--}}
                    <div class="col-md-6">
                        <div class="entityPanel entityFillPanel carrierPanel" >
                            <div class="entityPanelHeading">
                                <div class="entityPanelTitle">*Company Information</div>
                            </div>
                            <div class="entityPanelBody tabIndexContainer">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input name="carrier[carrier_flag]" type="hidden" value="0" tabindex="1"><input class="checkbox-group" check_box_name="carrier" onclick="setCarrier();" type="checkbox" value="1" checked="checked" name="carrier[carrier_flag]" id="carrier_carrier_flag" tabindex="2">
                                                Carrier
                                                <span class="formInfo glyphicon glyphicon-info-sign" title="Selecting carrier will require insurance policy"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="van">
                                                <label class="form-check-label" for="inlineCheckbox1">Van</label>
                                            </div>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="reefer">
                                                <label class="form-check-label" for="inlineCheckbox2">Reefer</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input name="carrier[vendor_flag]" type="hidden" value="0" tabindex="17"><input class="checkbox-group" check_box_name="vendor" onclick="setVendor();" type="checkbox" value="1" name="carrier[vendor_flag]" id="carrier_vendor_flag" tabindex="18"> Vendor
                                                <span class="formInfo glyphicon glyphicon-info-sign" title="Selecting vendor will not require insurance policy"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Contracted</label>
                                            <div class="input-group date datePicker defaultDatePicker">
                                                <input id="carrier_contracted_on" name="carrier[contracted_on]" type="date" class="form-control focusOnLoad" value="" tabindex="3" min={{date('Y-m-d')}}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_status">*Status</label>
                                            <select class="form-control" name="carrier[status]" id="carrier_status" tabindex="19"><option value="Active">Active</option>
                                                <option value="Do Not Use">Do Not Use</option>
                                                <option value="Inactive">Inactive</option>
                                                <option value="Prospect">Prospect</option></select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_company">*Company</label>
                                            <input class="form-control requiredInputCarrier" placeholder="Enter company" required="required" type="text" name="carrier[company]" id="carrier_company" tabindex="4">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_phone">*Phone</label>
                                            <input class="form-control requiredInputCarrier phoneMask" placeholder="Enter phone" required="required" type="text" name="carrier[phone]" id="carrier_phone" tabindex="20">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_dba_name">DBA name</label>
                                            <input class="form-control" placeholder="Enter DBA name" type="text" name="carrier[dba_name]" id="carrier_dba_name" tabindex="5">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_phone_extension">Phone Extension</label>
                                            <input class="form-control" placeholder="Enter phone extension" type="text" name="carrier[phone_extension]" id="carrier_phone_extension" tabindex="21">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_address1">*Address 1</label>
                                            <input class="form-control requiredInputCarrier" placeholder="Enter address" required="required" type="text" name="carrier[address1]" id="carrier_address1" tabindex="6">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_cell_phone">Cellphone</label>
                                            <input class="form-control phoneMask" placeholder="Enter cellphone" type="text" name="carrier[cell_phone]" id="carrier_cell_phone" tabindex="22">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_address2">Address 2</label>
                                            <input class="form-control" placeholder="Enter address 2" type="text" name="carrier[address2]" id="carrier_address2" tabindex="7">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_fax">Fax</label>
                                            <input class="form-control phoneMask" placeholder="Enter fax number" type="text" name="carrier[fax]" id="carrier_fax" tabindex="23">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_city">*City</label>
                                            <input class="form-control requiredInputCarrier" placeholder="Enter city" required="required" type="text" name="carrier[city]" id="carrier_city" tabindex="8">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_website">Website</label>
                                            <input class="form-control" placeholder="Enter website" type="text" name="carrier[website]" id="carrier_website" tabindex="24">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">*State/Province</label>
                                            <select name="carrier[state]" class="selectpicker" required="true" data-live-search="true">
                                                <option disabled selected value>Select State/Province</option>
                                                <option value="AL">AL (Alabama)</option>
                                                <option value="AK">AK (Alaska)</option>
                                                <option value="AZ">AZ (Arizona)</option>
                                                <option value="AR">AR (Arkansas)</option>
                                                <option value="CA">CA (California)</option>
                                                <option value="CO">CO (Colorado)</option>
                                                <option value="CT">CT (Connecticut)</option>
                                                <option value="DE">DE (Delaware)</option>
                                                <option value="DC">DC (District of Columbia)</option>
                                                <option value="FL">FL (Florida)</option>
                                                <option value="GA">GA (Georgia)</option>
                                                <option value="HI">HI (Hawaii)</option>
                                                <option value="ID">ID (Idaho)</option>
                                                <option value="IL">IL (Illinois)</option>
                                                <option value="IN">IN (Indiana)</option>
                                                <option value="IA">IA (Iowa)</option>
                                                <option value="KS">KS (Kansas)</option>
                                                <option value="KY">KY (Kentucky)</option>
                                                <option value="LA">LA (Louisiana)</option>
                                                <option value="ME">ME (Maine)</option>
                                                <option value="MD">MD (Maryland)</option>
                                                <option value="MA">MA (Massachusetts)</option>
                                                <option value="MI">MI (Michigan)</option>
                                                <option value="MN">MN (Minnesota)</option>
                                                <option value="MS">MS (Mississippi)</option>
                                                <option value="MO">MO (Missouri)</option>
                                                <option value="MT">MT (Montana)</option>
                                                <option value="NE">NE (Nebraska)</option>
                                                <option value="NV">NV (Nevada)</option>
                                                <option value="NH">NH (New Hampshire)</option>
                                                <option value="NJ">NJ (New Jersey)</option>
                                                <option value="NM">NM (New Mexico)</option>
                                                <option value="NY">NY (New York)</option>
                                                <option value="NC">NC (North Carolina)</option>
                                                <option value="ND">ND (North Dakota)</option>
                                                <option value="OH">OH (Ohio)</option>
                                                <option value="OK">OK (Oklahoma)</option>
                                                <option value="OR">OR (Oregon)</option>
                                                <option value="PA">PA (Pennsylvania)</option>
                                                <option value="PR">PR (Puerto Rico)</option>
                                                <option value="RI">RI (Rhode Island)</option>
                                                <option value="SC">SC (South Carolina)</option>
                                                <option value="SD">SD (South Dakota)</option>
                                                <option value="TN">TN (Tennessee)</option>
                                                <option value="TX">TX (Texas)</option>
                                                <option value="UT">UT (Utah)</option>
                                                <option value="VT">VT (Vermont)</option>
                                                <option value="VA">VA (Virginia)</option>
                                                <option value="WA">WA (Washington)</option>
                                                <option value="WV">WV (West Virginia)</option>
                                                <option value="WI">WI (Wisconsin)</option>
                                                <option value="WY">WY (Wyoming)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_email">Email</label>
                                            <input class="form-control" placeholder="Enter email" type="email" name="carrier[email]" id="carrier_email" tabindex="25">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_zip_code">*Zip Code</label>
                                            <input class="form-control requiredInputCarrier" placeholder="Enter zip code" required="required" type="text" name="carrier[zip_code]" id="carrier_zip_code" tabindex="11">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_currency">Currency</label>
                                            <span class="formInfo glyphicon glyphicon-info-sign" title="Select the default currency type to be used when calculating invoices and payments."></span>
                                            <select class="form-control" name="carrier[currency]" id="carrier_currency" tabindex="26"><option value="">Select Currency</option>
                                                <option value="CAD">CAD</option>
                                                <option value="MXN">MXN</option>
                                                <option selected="selected" value="USD">USD</option></select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="addPaymentTermTerm" class="control-label">Payment Term</label>
                                            <select class="form-control" name="carrier[payment_term_id]" id="carrier_payment_term_id" tabindex="12"><option value="">Select Payment Term</option></select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_carrier_fee">Carrier Fee</label>
                                            <div class="input-group">
                                                <input class="form-control editMainField" type="number" step=".01" placeholder="Enter Carrier Fee" value="0.0" name="carrier[carrier_fee]" id="carrier_carrier_fee" tabindex="13">
                                                <span class="input-group-addon">%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                <input name="carrier[preferred_carrier_status]" type="hidden" value="0"><input type="checkbox" value="1" name="carrier[preferred_carrier_status]" id="carrier_preferred_carrier_status"> Preferred Carrier Status
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input name="carrier[smart_way_certified]" type="hidden" value="0"><input type="checkbox" value="1" name="carrier[smart_way_certified]" id="carrier_smart_way_certified"> SmartWay Certified
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input name="carrier[carb_compliant]" type="hidden" value="0"><input type="checkbox" value="1" name="carrier[carb_compliant]" id="carrier_carb_compliant"> Clean Air Compliant(CARB)
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input name="carrier[use_dba_name]" type="hidden" value="0"><input type="checkbox" value="1" name="carrier[use_dba_name]" id="carrier_use_dba_name"> Use DBA name
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input name="carrier[require_carrier_agreement]" type="hidden" value="0"><input type="checkbox" value="1" name="carrier[require_carrier_agreement]" id="carrier_require_carrier_agreement"> Require Carrier Agreement to Assign to Load
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_flag">Flag</label>
                                            <span class="formInfo glyphicon glyphicon-info-sign" data-toggle="tooltip" title="A flag will be displayed to users when adding this carrier to a load."></span>
                                            <span><input name="carrier[flagged]" type="hidden" value="0" tabindex="14"><input class="pull-left" style="margin-right:5px;" type="checkbox" value="1" name="carrier[flagged]" id="carrier_flagged" tabindex="15"></span>
                                            <textarea class="form-control" placeholder="Enter flag" name="carrier[flag]" id="carrier_flag" tabindex="16"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!--  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="carrierNote" class="control-label">Note</label>
                                        <textarea class="form-control" id="carrierNote" name="carrier_note" placeholder="Enter a note about this carrier" rows="2"><#%= @carrier_note.message %></textarea>
                                      </div>
                                    </div>
                                  </div> -->
                            </div>
                        </div>

                        <!-- Primary Contact -->
                        <div class="entityPanel entityFillPanel carrierPanel">
                            <div class="entityPanelHeading">
                                <div class="entityPanelTitle">Primary Contact</div>
                            </div>
                            <div class="entityPanelBody tabIndexContainer">
                                <div class="row"><div class="col-md-12"><p>More contacts can be added once this carrier is created.</p></div></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="primaryContactNameGroup" class="form-group">
                                            <label for="primaryContactName" class="control-label">Name</label>
                                            <input type="text" class="form-control focusOnShow" id="primaryContactName" name="primary_contact_name" placeholder="Enter contact name" value="" tabindex="27">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="primaryContactName" class="control-label">Title</label>
                                            <input type="text" class="form-control contactOptional" id="primaryContactTitle" name="primary_contact_title" placeholder="Enter contact title" value="" tabindex="34">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="primaryContactAddress1" class="control-label">Address 1</label>
                                            <input type="text" class="form-control contactOptional" id="primaryContactAddress1" name="primary_contact_address1" placeholder="Enter contact address" value="" tabindex="28">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="primaryContactDepartment" class="control-label">Department</label>
                                            <input type="text" class="form-control contactOptional" id="primaryContactDepartment" name="primary_contact_department" placeholder="Enter contact department" value="" tabindex="35">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="primaryContactAddress2" class="control-label">Address 2</label>
                                            <input type="text" class="form-control contactOptional" id="primaryContactAddress2" name="primary_contact_address2" placeholder="Enter contact address" value="" tabindex="29">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="primaryContactPhone" class="control-label">Phone</label>
                                            <input type="text" class="form-control contactOptional phoneMask" id="primaryContactPhone" name="primary_contact_phone" placeholder="Enter contact phone" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="primaryContactPhoneExtension" class="control-label">Ext</label>
                                            <input type="text" class="form-control contactOptional" id="primaryContactPhoneExtension" name="primary_contact_phone_extension" placeholder="Enter extension" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="primaryContactCity" class="control-label">City</label>
                                            <input type="text" class="form-control contactOptional" id="primaryContactCity" name="primary_contact_city" placeholder="Enter contact city" value="" tabindex="30">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="primaryContactCellPhone" class="control-label">Cell Phone</label>
                                            <input type="text" class="form-control contactOptional phoneMask" id="primaryContactCellPhone" name="primary_contact_cell_phone" placeholder="Enter contact cell phone" value="" tabindex="36">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="primaryContactState" class="control-label">State/Province</label>
                                            <select id="primaryContactState" name="carrier[state]" class="selectpicker" required="true" data-live-search="true">
                                                <option disabled selected value>Select State/Province</option>
                                                <option value="AL">AL (Alabama)</option>
                                                <option value="AK">AK (Alaska)</option>
                                                <option value="AZ">AZ (Arizona)</option>
                                                <option value="AR">AR (Arkansas)</option>
                                                <option value="CA">CA (California)</option>
                                                <option value="CO">CO (Colorado)</option>
                                                <option value="CT">CT (Connecticut)</option>
                                                <option value="DE">DE (Delaware)</option>
                                                <option value="DC">DC (District of Columbia)</option>
                                                <option value="FL">FL (Florida)</option>
                                                <option value="GA">GA (Georgia)</option>
                                                <option value="HI">HI (Hawaii)</option>
                                                <option value="ID">ID (Idaho)</option>
                                                <option value="IL">IL (Illinois)</option>
                                                <option value="IN">IN (Indiana)</option>
                                                <option value="IA">IA (Iowa)</option>
                                                <option value="KS">KS (Kansas)</option>
                                                <option value="KY">KY (Kentucky)</option>
                                                <option value="LA">LA (Louisiana)</option>
                                                <option value="ME">ME (Maine)</option>
                                                <option value="MD">MD (Maryland)</option>
                                                <option value="MA">MA (Massachusetts)</option>
                                                <option value="MI">MI (Michigan)</option>
                                                <option value="MN">MN (Minnesota)</option>
                                                <option value="MS">MS (Mississippi)</option>
                                                <option value="MO">MO (Missouri)</option>
                                                <option value="MT">MT (Montana)</option>
                                                <option value="NE">NE (Nebraska)</option>
                                                <option value="NV">NV (Nevada)</option>
                                                <option value="NH">NH (New Hampshire)</option>
                                                <option value="NJ">NJ (New Jersey)</option>
                                                <option value="NM">NM (New Mexico)</option>
                                                <option value="NY">NY (New York)</option>
                                                <option value="NC">NC (North Carolina)</option>
                                                <option value="ND">ND (North Dakota)</option>
                                                <option value="OH">OH (Ohio)</option>
                                                <option value="OK">OK (Oklahoma)</option>
                                                <option value="OR">OR (Oregon)</option>
                                                <option value="PA">PA (Pennsylvania)</option>
                                                <option value="PR">PR (Puerto Rico)</option>
                                                <option value="RI">RI (Rhode Island)</option>
                                                <option value="SC">SC (South Carolina)</option>
                                                <option value="SD">SD (South Dakota)</option>
                                                <option value="TN">TN (Tennessee)</option>
                                                <option value="TX">TX (Texas)</option>
                                                <option value="UT">UT (Utah)</option>
                                                <option value="VT">VT (Vermont)</option>
                                                <option value="VA">VA (Virginia)</option>
                                                <option value="WA">WA (Washington)</option>
                                                <option value="WV">WV (West Virginia)</option>
                                                <option value="WI">WI (Wisconsin)</option>
                                                <option value="WY">WY (Wyoming)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="primaryContactFax" class="control-label">Fax</label>
                                            <input type="text" class="form-control contactOptional phoneMask" id="primaryContactFax" name="primary_contact_fax" placeholder="Enter contact fax number" value="" tabindex="37">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="primaryContactCity" class="control-label">Zip</label>
                                            <input type="text" class="form-control contactOptional" id="primaryContactZip" name="primary_contact_zip_code" placeholder="Enter contact zip" value="" tabindex="33">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="primaryContactEmail" class="control-label">Email</label>
                                            <input type="email" class="form-control contactOptional" id="primaryContactEmail" name="primary_contact_email" placeholder="Enter contact email" value="" tabindex="38">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
{{--//////////////////////////////////////////////////////////--}}

                    <div class="col-md-6">
                        <div class="entityPanel entityFillPanel carrierPanel">

                            <div class="entityPanelHeading">
                                <div class="entityPanelTitle">
                                    <div class="row">
                                        <div class="col-md-4">Payee Information</div>
                                        <div class="col-md-8 panelTitleLinkContainer">
                                            <a class="actionLink" href="javascript:" onclick="copyCompanyInfoToPayeeInfo()"><i class="fa fa-copy"></i>
                                                Copy from Company Information</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="entityPanelBody tabIndexContainer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_company">Company</label>
                                            <input class="form-control" placeholder="Enter company" type="text" name="carrier[payee_company]" id="carrier_payee_company" tabindex="39">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_phone">Phone</label>
                                            <input class="form-control phoneMask" placeholder="Enter phone" type="text" name="carrier[payee_phone]" id="carrier_payee_phone" tabindex="47">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_dba_name">Payee DBA name</label>
                                            <input class="form-control" placeholder="Enter Payee DBA name" type="text" name="carrier[payee_dba_name]" id="carrier_payee_dba_name" tabindex="40">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_phone_extension">Phone Extension</label>
                                            <input class="form-control" placeholder="Enter phone extension" type="text" name="carrier[payee_phone_extension]" id="carrier_payee_phone_extension" tabindex="48">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_address1">Address 1</label>
                                            <input class="form-control" placeholder="Enter address" type="text" name="carrier[payee_address1]" id="carrier_payee_address1" tabindex="41">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_cell_phone">Cellphone</label>
                                            <input class="form-control phoneMask" placeholder="Enter phone" type="text" name="carrier[payee_cell_phone]" id="carrier_payee_cell_phone" tabindex="49">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_address2">Address 2</label>
                                            <input class="form-control" placeholder="Enter address 2" type="text" name="carrier[payee_address2]" id="carrier_payee_address2" tabindex="42">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_fax">Fax</label>
                                            <input class="form-control phoneMask" placeholder="Enter fax number" type="text" name="carrier[payee_fax]" id="carrier_payee_fax" tabindex="50">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_city">City</label>
                                            <input class="form-control" placeholder="Enter city" type="text" name="carrier[payee_city]" id="carrier_payee_city" tabindex="43">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_fed_id">Federal ID</label>
                                            <input class="form-control" placeholder="Enter federal ID" type="text" name="carrier[payee_fed_id]" id="carrier_payee_fed_id" tabindex="51">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_state">State/Province</label>
                                            <select id="carrier_payee_state" name="carrier[state]" class="selectpicker" required="true" data-live-search="true">
                                                <option disabled selected value>Select State/Province</option>
                                                <option value="AL">AL (Alabama)</option>
                                                <option value="AK">AK (Alaska)</option>
                                                <option value="AZ">AZ (Arizona)</option>
                                                <option value="AR">AR (Arkansas)</option>
                                                <option value="CA">CA (California)</option>
                                                <option value="CO">CO (Colorado)</option>
                                                <option value="CT">CT (Connecticut)</option>
                                                <option value="DE">DE (Delaware)</option>
                                                <option value="DC">DC (District of Columbia)</option>
                                                <option value="FL">FL (Florida)</option>
                                                <option value="GA">GA (Georgia)</option>
                                                <option value="HI">HI (Hawaii)</option>
                                                <option value="ID">ID (Idaho)</option>
                                                <option value="IL">IL (Illinois)</option>
                                                <option value="IN">IN (Indiana)</option>
                                                <option value="IA">IA (Iowa)</option>
                                                <option value="KS">KS (Kansas)</option>
                                                <option value="KY">KY (Kentucky)</option>
                                                <option value="LA">LA (Louisiana)</option>
                                                <option value="ME">ME (Maine)</option>
                                                <option value="MD">MD (Maryland)</option>
                                                <option value="MA">MA (Massachusetts)</option>
                                                <option value="MI">MI (Michigan)</option>
                                                <option value="MN">MN (Minnesota)</option>
                                                <option value="MS">MS (Mississippi)</option>
                                                <option value="MO">MO (Missouri)</option>
                                                <option value="MT">MT (Montana)</option>
                                                <option value="NE">NE (Nebraska)</option>
                                                <option value="NV">NV (Nevada)</option>
                                                <option value="NH">NH (New Hampshire)</option>
                                                <option value="NJ">NJ (New Jersey)</option>
                                                <option value="NM">NM (New Mexico)</option>
                                                <option value="NY">NY (New York)</option>
                                                <option value="NC">NC (North Carolina)</option>
                                                <option value="ND">ND (North Dakota)</option>
                                                <option value="OH">OH (Ohio)</option>
                                                <option value="OK">OK (Oklahoma)</option>
                                                <option value="OR">OR (Oregon)</option>
                                                <option value="PA">PA (Pennsylvania)</option>
                                                <option value="PR">PR (Puerto Rico)</option>
                                                <option value="RI">RI (Rhode Island)</option>
                                                <option value="SC">SC (South Carolina)</option>
                                                <option value="SD">SD (South Dakota)</option>
                                                <option value="TN">TN (Tennessee)</option>
                                                <option value="TX">TX (Texas)</option>
                                                <option value="UT">UT (Utah)</option>
                                                <option value="VT">VT (Vermont)</option>
                                                <option value="VA">VA (Virginia)</option>
                                                <option value="WA">WA (Washington)</option>
                                                <option value="WV">WV (West Virginia)</option>
                                                <option value="WI">WI (Wisconsin)</option>
                                                <option value="WY">WY (Wyoming)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_default_pay_day">Pay in Days</label>
                                            <input class="form-control" min="0" placeholder="Enter no of days" type="number" name="carrier[default_pay_day]" id="carrier_default_pay_day" tabindex="52">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_zip_code">Zip Code</label>
                                            <input class="form-control" placeholder="Enter zip code" type="text" name="carrier[payee_zip_code]" id="carrier_payee_zip_code" tabindex="46">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="checkbox" style="margin-top: 30px">
                                            <label>
                                                <input name="carrier[use_payee_dba_name]" type="hidden" value="0" tabindex="53"><input type="checkbox" value="1" name="carrier[use_payee_dba_name]" id="carrier_use_payee_dba_name" tabindex="54"> Use Payee DBA name
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--Factoring remit -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="entityPanel entityFillPanel carrierPanel">
                                    <div class="entityPanelHeading">
                                        <div class="entityPanelTitle">Factoring Company
                                            <label style="cursor:pointer;float:right;font-weight:normal;color:#333">
                                                <input name="carrier[remit_payment_to]" type="hidden" value="0"><input class="editMainField" type="checkbox" value="1" name="carrier[remit_payment_to]" id="carrier_remit_payment_to"> Remit Payment to Factoring Company by default.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="entityPanelBody tabIndexContainer">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_company_name">Company</label>
                                                    <input class="form-control editMainField" placeholder="Enter factoring company name" maxlength="41" size="41" type="text" name="carrier[factoring_remit_attributes][factoring_company_name]" id="carrier_factoring_remit_attributes_factoring_company_name" tabindex="55">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_phone">Phone</label>
                                                    <input class="form-control editMainField phoneMask" placeholder="Enter phone" type="text" name="carrier[factoring_remit_attributes][factoring_phone]" id="carrier_factoring_remit_attributes_factoring_phone" tabindex="62">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_remit_address">Address 1</label>
                                                    <input class="form-control editMainField" placeholder="Enter address" maxlength="41" size="41" type="text" name="carrier[factoring_remit_attributes][factoring_remit_address]" id="carrier_factoring_remit_attributes_factoring_remit_address" tabindex="56">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_remit_email">Email</label>
                                                    <input class="form-control editMainField" placeholder="Enter email" maxlength="41" size="41" type="text" name="carrier[factoring_remit_attributes][factoring_remit_email]" id="carrier_factoring_remit_attributes_factoring_remit_email" tabindex="63">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_remit_address2">Address 2</label>
                                                    <input class="form-control editMainField" placeholder="Enter address 2" type="text" name="carrier[factoring_remit_attributes][factoring_remit_address2]" id="carrier_factoring_remit_attributes_factoring_remit_address2" tabindex="57">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_remit_city">City</label>
                                                    <input class="form-control editMainField" placeholder="Enter city" maxlength="41" size="41" type="text" name="carrier[factoring_remit_attributes][factoring_remit_city]" id="carrier_factoring_remit_attributes_factoring_remit_city" tabindex="58">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_remit_state_province">State/Province</label>
                                                    <select id="carrier_factoring_remit_attributes_factoring_remit_state_province" name="carrier[state]" class="selectpicker" required="true" data-live-search="true">
                                                        <option disabled selected value>Select State/Province</option>
                                                        <option value="AL">AL (Alabama)</option>
                                                        <option value="AK">AK (Alaska)</option>
                                                        <option value="AZ">AZ (Arizona)</option>
                                                        <option value="AR">AR (Arkansas)</option>
                                                        <option value="CA">CA (California)</option>
                                                        <option value="CO">CO (Colorado)</option>
                                                        <option value="CT">CT (Connecticut)</option>
                                                        <option value="DE">DE (Delaware)</option>
                                                        <option value="DC">DC (District of Columbia)</option>
                                                        <option value="FL">FL (Florida)</option>
                                                        <option value="GA">GA (Georgia)</option>
                                                        <option value="HI">HI (Hawaii)</option>
                                                        <option value="ID">ID (Idaho)</option>
                                                        <option value="IL">IL (Illinois)</option>
                                                        <option value="IN">IN (Indiana)</option>
                                                        <option value="IA">IA (Iowa)</option>
                                                        <option value="KS">KS (Kansas)</option>
                                                        <option value="KY">KY (Kentucky)</option>
                                                        <option value="LA">LA (Louisiana)</option>
                                                        <option value="ME">ME (Maine)</option>
                                                        <option value="MD">MD (Maryland)</option>
                                                        <option value="MA">MA (Massachusetts)</option>
                                                        <option value="MI">MI (Michigan)</option>
                                                        <option value="MN">MN (Minnesota)</option>
                                                        <option value="MS">MS (Mississippi)</option>
                                                        <option value="MO">MO (Missouri)</option>
                                                        <option value="MT">MT (Montana)</option>
                                                        <option value="NE">NE (Nebraska)</option>
                                                        <option value="NV">NV (Nevada)</option>
                                                        <option value="NH">NH (New Hampshire)</option>
                                                        <option value="NJ">NJ (New Jersey)</option>
                                                        <option value="NM">NM (New Mexico)</option>
                                                        <option value="NY">NY (New York)</option>
                                                        <option value="NC">NC (North Carolina)</option>
                                                        <option value="ND">ND (North Dakota)</option>
                                                        <option value="OH">OH (Ohio)</option>
                                                        <option value="OK">OK (Oklahoma)</option>
                                                        <option value="OR">OR (Oregon)</option>
                                                        <option value="PA">PA (Pennsylvania)</option>
                                                        <option value="PR">PR (Puerto Rico)</option>
                                                        <option value="RI">RI (Rhode Island)</option>
                                                        <option value="SC">SC (South Carolina)</option>
                                                        <option value="SD">SD (South Dakota)</option>
                                                        <option value="TN">TN (Tennessee)</option>
                                                        <option value="TX">TX (Texas)</option>
                                                        <option value="UT">UT (Utah)</option>
                                                        <option value="VT">VT (Vermont)</option>
                                                        <option value="VA">VA (Virginia)</option>
                                                        <option value="WA">WA (Washington)</option>
                                                        <option value="WV">WV (West Virginia)</option>
                                                        <option value="WI">WI (Wisconsin)</option>
                                                        <option value="WY">WY (Wyoming)</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_remit_zipcode">Zip code</label>
                                                    <input class="form-control editMainField" placeholder="Enter zip code" type="text" name="carrier[factoring_remit_attributes][factoring_remit_zipcode]" id="carrier_factoring_remit_attributes_factoring_remit_zipcode" tabindex="61">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="entityPanel entityFillPanel carrierPanel" >
                            <div class="entityPanelHeading">
                                <div class="entityPanelTitle">Licenses &amp; Certificates</div>
                            </div>
                            <div class="entityPanelBody tabIndexContainer">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_mc_number">MC #</label>
                                            <input class="form-control" placeholder="Enter MC Number" type="text" name="carrier[mc_number]" id="carrier_mc_number" tabindex="64">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_dot_number">DOT #</label>
                                            <input class="form-control" placeholder="Enter DOT Number" type="text" name="carrier[dot_number]" id="carrier_dot_number" tabindex="66">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_hazmat_number">HAZMAT #</label>
                                            <input class="form-control" placeholder="Enter Hazmat Number" type="text" name="carrier[hazmat_number]" id="carrier_hazmat_number" tabindex="65">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_scac_number">SCAC #</label>
                                            <input class="form-control" placeholder="Enter SCAC Number" type="text" name="carrier[scac_number]" id="carrier_scac_number" tabindex="67">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="entityPanel entityFillPanel carrierPanel newCarrierPolicy" >
                            <div class="entityPanelHeading">
                                <div class="entityPanelTitle">Insurance Policy #1</div>
                            </div>
                            <div class="entityPanelBody tabIndexContainer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insuranceType" class="control-label">*Type</label>
                                            <select class="form-control" required="required" name="carrier[carrier_insurance_policies_attributes][0][insurance_type]" id="carrier_carrier_insurance_policies_attributes_0_insurance_type" tabindex="68"><option value=""></option>
                                                <option value="Auto Liability">Auto Liability</option>
                                                <option value="Cargo">Cargo</option>
                                                <option value="Excess Liability">Excess Liability</option>
                                                <option selected="selected" value="General Liability">General Liability</option>
                                                <option value="Supplemental - Cargo">Supplemental - Cargo</option>
                                                <option value="Umbrella Liability">Umbrella Liability</option>
                                                <option value="Workmans Comp">Workmans Comp</option></select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insuranceInsurer" class="control-label">Insurer</label>
                                            <input class="form-control" placeholder="Enter insurer name" type="text" name="carrier[carrier_insurance_policies_attributes][0][insurer]" id="carrier_carrier_insurance_policies_attributes_0_insurer" tabindex="72">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="insuranceAmountGroup" class="form-group">
                                            <label for="insuranceAmount" class="control-label">*Amount</label>
                                            <input class="form-control" placeholder="Enter amount" min="0.01" step="0.01" required="required" type="number" name="carrier[carrier_insurance_policies_attributes][0][amount]" id="carrier_carrier_insurance_policies_attributes_0_amount" tabindex="69">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurancePolicyNumber" class="control-label">Policy #</label>
                                            <input class="form-control" placeholder="Enter insurance policy number" type="text" name="carrier[carrier_insurance_policies_attributes][0][policy_number]" id="carrier_carrier_insurance_policies_attributes_0_policy_number" tabindex="73">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="insuranceEffectiveDateGroup" class="form-group">
                                            <label class="control-label">Effective Date</label>
                                            <div class="input-group date datePicker defaultDatePicker">
                                                <input class="form-control" placeholder="Enter effective on date" value="" type="date" name="carrier[carrier_insurance_policies_attributes][0][effective_on]" id="carrier_carrier_insurance_policies_attributes_0_effective_on" tabindex="70" min={{date('Y-m-d')}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">*Expiration Date</label>
                                            <div class="input-group date datePicker defaultDatePicker">
                                                <input class="form-control" placeholder="Enter expires on date" required="required" value="" type="date" name="carrier[carrier_insurance_policies_attributes][0][expires_on]" id="carrier_carrier_insurance_policies_attributes_0_expires_on" tabindex="74" min={{date('Y-m-d')}}>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurancePhone" class="control-label">Phone</label>
                                            <input class="form-control phoneMask" placeholder="Enter phone" type="text" name="carrier[carrier_insurance_policies_attributes][0][phone]" id="carrier_carrier_insurance_policies_attributes_0_phone" tabindex="71">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insuranceEmail" class="control-label">Email</label>
                                            <input class="form-control" placeholder="Enter email" type="email" name="carrier[carrier_insurance_policies_attributes][0][email]" id="carrier_carrier_insurance_policies_attributes_0_email" tabindex="75">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="entityPanel entityFillPanel carrierPanel newCarrierPolicy">
                            <div class="entityPanelHeading">
                                <div class="entityPanelTitle">Insurance Policy #2</div>
                            </div>
                            <div class="entityPanelBody tabIndexContainer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insuranceType" class="control-label">*Type</label>
                                            <select class="form-control" required="required" name="carrier[carrier_insurance_policies_attributes][1][insurance_type]" id="carrier_carrier_insurance_policies_attributes_1_insurance_type" tabindex="76"><option value=""></option>
                                                <option value="Auto Liability">Auto Liability</option>
                                                <option selected="selected" value="Cargo">Cargo</option>
                                                <option value="Excess Liability">Excess Liability</option>
                                                <option value="General Liability">General Liability</option>
                                                <option value="Supplemental - Cargo">Supplemental - Cargo</option>
                                                <option value="Umbrella Liability">Umbrella Liability</option>
                                                <option value="Workmans Comp">Workmans Comp</option></select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insuranceInsurer" class="control-label">Insurer</label>
                                            <input class="form-control" placeholder="Enter insurer name" type="text" name="carrier[carrier_insurance_policies_attributes][1][insurer]" id="carrier_carrier_insurance_policies_attributes_1_insurer" tabindex="80">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="insuranceAmountGroup" class="form-group">
                                            <label for="insuranceAmount" class="control-label">*Amount</label>
                                            <input class="form-control" placeholder="Enter amount" min="0.01" step="0.01" required="required" type="number" name="carrier[carrier_insurance_policies_attributes][1][amount]" id="carrier_carrier_insurance_policies_attributes_1_amount" tabindex="77">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurancePolicyNumber" class="control-label">Policy #</label>
                                            <input class="form-control" placeholder="Enter insurance policy number" type="text" name="carrier[carrier_insurance_policies_attributes][1][policy_number]" id="carrier_carrier_insurance_policies_attributes_1_policy_number" tabindex="81">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="insuranceEffectiveDateGroup" class="form-group">
                                            <label class="control-label">Effective Date</label>
                                            <div class="input-group date datePicker defaultDatePicker">
                                                <input class="form-control" placeholder="Enter effective on date" value="" type="date" name="carrier[carrier_insurance_policies_attributes][1][effective_on]" id="carrier_carrier_insurance_policies_attributes_1_effective_on" tabindex="78" min={{date('Y-m-d')}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">*Expiration Date</label>
                                            <div class="input-group date datePicker defaultDatePicker">
                                                <input class="form-control" placeholder="Enter expires on date" required="required" value="" type="date" name="carrier[carrier_insurance_policies_attributes][1][expires_on]" id="carrier_carrier_insurance_policies_attributes_1_expires_on" tabindex="82" min={{date('Y-m-d')}}>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurancePhone" class="control-label">Phone</label>
                                            <input class="form-control phoneMask" placeholder="Enter phone" type="text" name="carrier[carrier_insurance_policies_attributes][1][phone]" id="carrier_carrier_insurance_policies_attributes_1_phone" tabindex="79">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insuranceEmail" class="control-label">Email</label>
                                            <input class="form-control" placeholder="Enter email" type="email" name="carrier[carrier_insurance_policies_attributes][1][email]" id="carrier_carrier_insurance_policies_attributes_1_email" tabindex="83">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
{{--//////////////////////////////////////////////////////////--}}

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection

