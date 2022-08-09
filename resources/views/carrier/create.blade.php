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
                <div class="card-header">
                    <h3>Create Carrier</h3>
                </div>
                <form method="post" action="{{ url('/'.\App::make('currentCompany')->id.'/carriers')}}">
                    @csrf
                    <div class="col-md-6">
                        <div class="entityPanel entityFillPanel carrierPanel" >
                            <div class="entityPanelHeading">
                                <div class="entityPanelTitle">*Company Information</div>
                            </div>
                            <br>
                            <div class="entityPanelBody tabIndexContainer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Contracted</label>
                                            <div class="input-group date datePicker defaultDatePicker">
                                                <input id="carrier_contracted_on" name="contracted_on" value="{{old('contracted_on')}}" type="text" class="datepicker form-control focusOnLoad"  tabindex="3" min={{date('Y-m-d')}}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_status">*Status</label>
                                            <select class="form-control" name="status" id="carrier_status" tabindex="19">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_company">*Company</label>
                                            <input class="form-control requiredInputCarrier" placeholder="Enter company" required="required" type="text" name="company" value="{{old('company')}}" id="carrier_company" tabindex="4">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_phone">*Phone</label>
                                            <input class="form-control requiredInputCarrier phoneMask" placeholder="Enter phone" required="required" type="text" name="phone" value="{{old('phone')}}" id="carrier_phone" tabindex="20">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_dba_name">DBA name</label>
                                            <input class="form-control" placeholder="Enter DBA name" type="text" name="dba_name" value="{{old('dba_name')}}" id="carrier_dba_name" tabindex="5">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_phone_extension">Phone Extension</label>
                                            <input class="form-control" placeholder="Enter phone extension" type="text" name="phone_extension" value="{{old('phone_extension')}}" id="carrier_phone_extension" tabindex="21">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_address1">*Address 1</label>
                                            <input class="form-control requiredInputCarrier" placeholder="Enter address" required="required" type="text" name="address1" value="{{old('address1')}}" id="carrier_address1" tabindex="6">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_cell_phone">Cellphone</label>
                                            <input class="form-control phoneMask" placeholder="Enter cellphone" type="text" name="cell_phone" value="{{old('cell_phone')}}" id="carrier_cell_phone" tabindex="22">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_address2">Address 2</label>
                                            <input class="form-control" placeholder="Enter address 2" type="text" name="address2" value="{{old('address2')}}" id="carrier_address2" tabindex="7">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_fax">Fax</label>
                                            <input class="form-control phoneMask" placeholder="Enter fax number" type="text" name="fax" value="{{old('fax')}}" id="carrier_fax" tabindex="23">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_city">*City</label>
                                            <input class="form-control requiredInputCarrier" placeholder="Enter city" required="required" type="text" name="city" value="{{old('city')}}" id="carrier_city" tabindex="8">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">*State/Province</label>
                                            <input class="form-control" placeholder="Please Enter Select State/Province" required="required" type="text" name="state" value="{{old('state')}}" id="carrier_state" tabindex="8">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_email">*Email</label>
                                            <input class="form-control" required="required" placeholder="Enter email" type="email" name="email" value="{{old('email')}}" id="carrier_email" tabindex="25">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_zip_code">*Zip Code</label>
                                            <input class="form-control requiredInputCarrier" placeholder="Enter zip code" required="required" type="text" name="zip_code" value="{{old('zip_code')}}" id="carrier_zip_code" tabindex="11">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_carrier_fee">Carrier Fee</label>
                                            <div class="input-group">
                                                <input class="form-control editMainField" type="number" step=".01" placeholder="Enter Carrier Fee" value="0.0" name="carrier_fee" value="{{old('carrier_fee')}}" id="carrier_carrier_fee" tabindex="13">
                                                <span class="input-group-addon">%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                <input name="preferred_carrier_status" type="hidden" value="0"><input type="checkbox" value="1" name="preferred_carrier_status" value="{{old('preferred_carrier_status')}}" id="carrier_preferred_carrier_status"> Preferred Carrier Status
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input name="smart_way_certified" type="hidden" value="0"><input type="checkbox" value="1" name="smart_way_certified" value="{{old('smart_way_certified')}}" id="carrier_smart_way_certified"> SmartWay Certified
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input name="carb_compliant" type="hidden" value="0"><input type="checkbox" value="1" name="carb_compliant" value="{{old('carb_compliant')}}" id="carrier_carb_compliant"> Clean Air Compliant(CARB)
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input name="use_dba_name" type="hidden" value="0">
                                                <input type="checkbox" value="1" name="use_dba_name" value="{{old('use_dba_name')}}" id="carrier_use_dba_name"> Use DBA name
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input name="require_carrier_agreement" type="hidden" value="0"><input type="checkbox" value="1" name="require_carrier_agreement" value="{{old('require_carrier_agreement')}}" id="carrier_require_carrier_agreement"> Require Carrier Agreement to Assign to Load
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_flag">Flag</label>
                                            <span>
                                                <input name="flagged" type="hidden" value="0" tabindex="14">
                                                <input class="pull-left" style="margin-right:5px;" type="checkbox" value="1" name="flagged" id="carrier_flagged" tabindex="15">
                                            </span>
                                            <textarea class="form-control" placeholder="Enter flag" name="flag"  value="{{old('flag')}}" id="carrier_flag" tabindex="16"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="customerNote" class="control-label">Note</label>
                                            <textarea class="form-control" id="customerNote" name="note" placeholder="Enter a note about this customer" rows="4" tabindex="15">{{old('note')}}</textarea>
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
                                            <input class="form-control" placeholder="Enter company" type="text" name="payee_company" value="{{old('payee_company')}}" id="carrier_payee_company" tabindex="39">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_phone">Phone</label>
                                            <input class="form-control phoneMask" placeholder="Enter phone" type="text" name="payee_phone" value="{{old('payee_phone')}}" id="carrier_payee_phone" tabindex="47">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_dba_name">Payee DBA name</label>
                                            <input class="form-control" placeholder="Enter Payee DBA name" type="text" name="payee_dba_name" value="{{old('payee_dba_name')}}" id="carrier_payee_dba_name" tabindex="40">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_phone_extension">Phone Extension</label>
                                            <input class="form-control" placeholder="Enter phone extension" type="text" name="payee_phone_extension" value="{{old('payee_phone_extension')}}" id="carrier_payee_phone_extension" tabindex="48">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_address1">Address 1</label>
                                            <input class="form-control" placeholder="Enter address" type="text" name="payee_address1" value="{{old('payee_address1')}}" id="carrier_payee_address1" tabindex="41">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_cell_phone">Cellphone</label>
                                            <input class="form-control phoneMask" placeholder="Enter phone" type="text" name="payee_cell_phone" value="{{old('payee_cell_phone')}}" id="carrier_payee_cell_phone" tabindex="49">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_address2">Address 2</label>
                                            <input class="form-control" placeholder="Enter address 2" type="text" name="payee_address2" value="{{old('payee_address2')}}" id="carrier_payee_address2" tabindex="42">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_fax">Fax</label>
                                            <input class="form-control phoneMask" placeholder="Enter fax number" type="text" name="payee_fax" value="{{old('payee_fax')}}" id="carrier_payee_fax" tabindex="50">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_city">City</label>
                                            <input class="form-control" placeholder="Enter city" type="text" name="payee_city" value="{{old('payee_city')}}" id="carrier_payee_city" tabindex="43">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_fed_id">Federal ID</label>
                                            <input class="form-control" placeholder="Enter federal ID" type="text" name="payee_fed_id" value="{{old('payee_fed_id')}}" id="carrier_payee_fed_id" tabindex="51">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_state">State/Province*</label>
                                            <input class="form-control" placeholder="Please Enter Select State/Province" required="required" type="text" name="payee_state" value="{{old('payee_state')}}" id="carrier_payee_state" tabindex="8">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_zip_code">Zip Code</label>
                                            <input class="form-control" placeholder="Enter zip code" type="text" name="payee_zip_code" value="{{old('payee_zip_code')}}" id="carrier_payee_zip_code" tabindex="46">
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
                                        <div class="entityPanelTitle">Factoring Company</div>
                                    </div>
                                    <br>
                                    <div class="entityPanelBody tabIndexContainer">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_company_name">Company</label>
                                                    <input class="form-control editMainField" placeholder="Enter factoring company name" maxlength="41" size="41" type="text" name="factoring_company_name" value="{{old('factoring_company_name')}}" id="carrier_factoring_remit_attributes_factoring_company_name" tabindex="55">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_phone">Phone</label>
                                                    <input class="form-control editMainField phoneMask" placeholder="Enter phone" type="text" name="factoring_phone" value="{{old('factoring_phone')}}" id="carrier_factoring_remit_attributes_factoring_phone" tabindex="62">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_remit_address">Address 1</label>
                                                    <input class="form-control editMainField" placeholder="Enter address" maxlength="41" size="41" type="text" name="factoring_remit_address" value="{{old('factoring_remit_address')}}" id="carrier_factoring_remit_attributes_factoring_remit_address" tabindex="56">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_remit_email">Email</label>
                                                    <input class="form-control editMainField" placeholder="Enter email" maxlength="41" size="41" type="text" name="factoring_remit_email" value="{{old('factoring_remit_email')}}" id="carrier_factoring_remit_attributes_factoring_remit_email" tabindex="63">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_remit_address2">Address 2</label>
                                                    <input class="form-control editMainField" placeholder="Enter address 2" type="text" name="factoring_remit_address2" value="{{old('factoring_remit_address2')}}" id="carrier_factoring_remit_attributes_factoring_remit_address2" tabindex="57">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_remit_city">City</label>
                                                    <input class="form-control editMainField" placeholder="Enter city" maxlength="41" size="41" type="text" name="factoring_remit_city" value="{{old('factoring_remit_city')}}" id="carrier_factoring_remit_attributes_factoring_remit_city" tabindex="58">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_remit_state_province">State/Province</label>
                                                    <select id="carrier_factoring_remit_attributes_factoring_remit_state_province" name="factoring_state" class="selectpicker" data-live-search="true">
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
                                                    <input class="form-control editMainField" placeholder="Enter zip code" type="text" name="factoring_remit_zipcode" value="{{old('factoring_remit_zipcode')}}" id="carrier_factoring_remit_attributes_factoring_remit_zipcode" tabindex="61">
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
                                            <input class="form-control" placeholder="Enter MC Number" type="text" name="mc_number" value="{{old('mc_number')}}" id="carrier_mc_number" tabindex="64">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_dot_number">DOT #</label>
                                            <input class="form-control" placeholder="Enter DOT Number" type="text" name="dot_number" value="{{old('dot_number')}}" id="carrier_dot_number" tabindex="66">
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
                                            <select class="form-control" required="required" name="insurance1_type" id="carrier_carrier_insurance_policies_attributes_0_insurance_type" tabindex="68"><option ></option>
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
                                            <input class="form-control" placeholder="Enter insurer name" type="text" name="insurance1_insurer" value="{{old('insurance1_insurer')}}" id="carrier_carrier_insurance_policies_attributes_0_insurer" tabindex="72">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="insuranceAmountGroup" class="form-group">
                                            <label for="insuranceAmount" class="control-label">*Amount</label>
                                            <input class="form-control" placeholder="Enter amount" min="0.01" step="0.01" required="required" type="number" name="insurance1_amount" value="{{old('insurance1_amount')}}" id="carrier_carrier_insurance_policies_attributes_0_amount" tabindex="69">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurancePolicyNumber" class="control-label">Policy #</label>
                                            <input class="form-control" placeholder="Enter insurance policy number" type="text" name="insurance1_policy_number" value="{{old('insurance1_policy_number')}}" id="carrier_carrier_insurance_policies_attributes_0_policy_number" tabindex="73">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="insuranceEffectiveDateGroup" class="form-group">
                                            <label class="control-label">Effective Date</label>
                                            <div class="input-group date datePicker defaultDatePicker">
                                                <input class="datepicker form-control" placeholder="Enter effective on date"  type="text" name="insurance1_effective_on" value="{{old('insurance1_effective_on')}}" id="carrier_carrier_insurance_policies_attributes_0_effective_on" tabindex="70" min={{date('Y-m-d')}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">*Expiration Date</label>
                                            <div class="input-group date datePicker defaultDatePicker">
                                                <input class="insuranceExpirationDate datepicker form-control" placeholder="Enter expires on date" required="required" type="text" name="insurance1_expires_on" value="{{old('insurance1_expires_on')}}" id="carrier_carrier_insurance_policies_attributes_0_expires_on" tabindex="74" min={{date('Y-m-d')}}>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurancePhone" class="control-label">Phone</label>
                                            <input class="form-control phoneMask" placeholder="Enter phone" type="text" name="insurance1_phone" value="{{old('insurance1_phone')}}" id="carrier_carrier_insurance_policies_attributes_0_phone" tabindex="71">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insuranceEmail" class="control-label">Email</label>
                                            <input class="form-control" placeholder="Enter email" type="email" name="insurance1_email" value="{{old('insurance1_email')}}" id="carrier_carrier_insurance_policies_attributes_0_email" tabindex="75">
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
                                            <select class="form-control" required="required" name="insurance2_type" id="carrier_carrier_insurance_policies_attributes_1_insurance_type" tabindex="76"><option ></option>
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
                                            <input class="form-control" placeholder="Enter insurer name" type="text" name="insurance2_insurer" value="{{old('insurance2_insurer')}}" id="carrier_carrier_insurance_policies_attributes_1_insurer" tabindex="80">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="insuranceAmountGroup" class="form-group">
                                            <label for="insuranceAmount" class="control-label">*Amount</label>
                                            <input class="form-control" placeholder="Enter amount" min="0.01" step="0.01" required="required" type="number" name="insurance2_amount" value="{{old('insurance2_amount')}}" id="carrier_carrier_insurance_policies_attributes_1_amount" tabindex="77">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurancePolicyNumber" class="control-label">Policy #</label>
                                            <input class="form-control" placeholder="Enter insurance policy number" type="text" name="insurance2_policy_number" value="{{old('insurance2_policy_number')}}" id="carrier_carrier_insurance_policies_attributes_1_policy_number" tabindex="81">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="insuranceEffectiveDateGroup" class="form-group">
                                            <label class="control-label">Effective Date</label>
                                            <div class="input-group date datePicker defaultDatePicker">
                                                <input class="datepicker form-control" placeholder="Enter effective on date"  type="text" name="insurance2_effective_on" value="{{old('insurance2_effective_on')}}" id="carrier_carrier_insurance_policies_attributes_1_effective_on" tabindex="78" min={{date('Y-m-d')}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">*Expiration Date</label>
                                            <div class="input-group date datePicker defaultDatePicker">
                                                <input class="insuranceExpirationDate datepicker form-control" placeholder="Enter expires on date" required="required"  type="text" name="insurance2_expires_on" value="{{old('insurance2_expires_on')}}" id="carrier_carrier_insurance_policies_attributes_1_expires_on" tabindex="82" min={{date('Y-m-d')}}>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurancePhone" class="control-label">Phone</label>
                                            <input class="form-control phoneMask" placeholder="Enter phone" type="text" name="insurance2_phone" value="{{old('insurance2_phone')}}" id="carrier_carrier_insurance_policies_attributes_1_phone" tabindex="79">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insuranceEmail" class="control-label">Email</label>
                                            <input class="form-control" placeholder="Enter email" type="email" name="insurance2_email" value="{{old('insurance2_email')}}" id="carrier_carrier_insurance_policies_attributes_1_email" tabindex="83">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection

