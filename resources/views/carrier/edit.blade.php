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
                    <h3>Edit Carrier</h3>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item col-sm-2 Carrier-tab">
                        <a class="nav-link active" id="carrier-tab" data-toggle="tab" href="#carrier" role="tab" aria-controls="load" aria-selected="true">Carrier</a>
                    </li>
                    <li class="nav-item col-sm-2 documents-tab">
                        <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents" aria-selected="false">Documents</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="carrier" role="tabpanel" aria-labelledby="carrier-tab">
                        <div id="carrier" class="tabcontent" style="display: block;">
                            <form method="POST" action="{{url(\App::make('currentCompany')->id.'/carriers/'.$carrier->id)}}" class="col-sm-12">
                    @method('PATCH')
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
                                                <input id="carrier_contracted_on" name="contracted_on" value="{{old('contracted_on', $carrier->contracted_on)}}" type="text" class="form-control datepicker focusOnLoad"  tabindex="3" min={{date('Y-m-d')}}>
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
                                            <input class="form-control requiredInputCarrier" placeholder="Enter company" required="required" type="text" name="company" value="{{old('company', $carrier->company)}}" id="carrier_company" tabindex="4">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_phone">*Phone</label>
                                            <input class="form-control requiredInputCarrier phoneMask" placeholder="Enter phone" required="required" type="text" name="phone" value="{{old('phone', $carrier->phone)}}" id="carrier_phone" tabindex="20">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_dba_name">DBA name</label>
                                            <input class="form-control" placeholder="Enter DBA name" type="text" name="dba_name" value="{{old('dba_name', $carrier->dba_name)}}" id="carrier_dba_name" tabindex="5">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_phone_extension">Phone Extension</label>
                                            <input class="form-control" placeholder="Enter phone extension" type="text" name="phone_extension" value="{{old('phone_extension', $carrier->phone_extension)}}" id="carrier_phone_extension" tabindex="21">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_address1">*Address 1</label>
                                            <input class="form-control requiredInputCarrier" placeholder="Enter address" required="required" type="text" name="address1" value="{{old('address1', $carrier->address1)}}" id="carrier_address1" tabindex="6">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_cell_phone">Cellphone</label>
                                            <input class="form-control phoneMask" placeholder="Enter cellphone" type="text" name="cell_phone" value="{{old('cell_phone', $carrier->cell_phone)}}" id="carrier_cell_phone" tabindex="22">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_address2">Address 2</label>
                                            <input class="form-control" placeholder="Enter address 2" type="text" name="address2" value="{{old('address2', $carrier->address2)}}" id="carrier_address2" tabindex="7">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_fax">Fax</label>
                                            <input class="form-control phoneMask" placeholder="Enter fax number" type="text" name="fax" value="{{old('fax', $carrier->fax)}}" id="carrier_fax" tabindex="23">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_city">*City</label>
                                            <input class="form-control requiredInputCarrier" placeholder="Enter city" required="required" type="text" name="city" value="{{old('city', $carrier->city)}}" id="carrier_city" tabindex="8">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">*State/Province</label>
                                            <select name="state" class="selectpicker" required="true" data-live-search="true">
                                                <option disabled selected value>Select State/Province</option>
                                                <option @if($carrier->state == 'AL') selected @endif value="AL">AL (Alabama)</option>
                                                <option @if($carrier->state == 'AK') selected @endif value="AK">AK (Alaska)</option>
                                                <option @if($carrier->state == 'AZ') selected @endif value="AZ">AZ (Arizona)</option>
                                                <option @if($carrier->state == 'AR') selected @endif value="AR">AR (Arkansas)</option>
                                                <option @if($carrier->state == 'CA') selected @endif value="CA">CA (California)</option>
                                                <option @if($carrier->state == 'CO') selected @endif value="CO">CO (Colorado)</option>
                                                <option @if($carrier->state == 'CT') selected @endif value="CT">CT (Connecticut)</option>
                                                <option @if($carrier->state == 'DE') selected @endif value="DE">DE (Delaware)</option>
                                                <option @if($carrier->state == 'DC') selected @endif value="DC">DC (District of Columbia)</option>
                                                <option @if($carrier->state == 'FL') selected @endif value="FL">FL (Florida)</option>
                                                <option @if($carrier->state == 'GA') selected @endif value="GA">GA (Georgia)</option>
                                                <option @if($carrier->state == 'HI') selected @endif value="HI">HI (Hawaii)</option>
                                                <option @if($carrier->state == 'ID') selected @endif value="ID">ID (Idaho)</option>
                                                <option @if($carrier->state == 'IL') selected @endif value="IL">IL (Illinois)</option>
                                                <option @if($carrier->state == 'IN') selected @endif value="IN">IN (Indiana)</option>
                                                <option @if($carrier->state == 'IA') selected @endif value="IA">IA (Iowa)</option>
                                                <option @if($carrier->state == 'KS') selected @endif value="KS">KS (Kansas)</option>
                                                <option @if($carrier->state == 'KY') selected @endif value="KY">KY (Kentucky)</option>
                                                <option @if($carrier->state == 'LA') selected @endif value="LA">LA (Louisiana)</option>
                                                <option @if($carrier->state == 'ME') selected @endif value="ME">ME (Maine)</option>
                                                <option @if($carrier->state == 'MD') selected @endif value="MD">MD (Maryland)</option>
                                                <option @if($carrier->state == 'MA') selected @endif value="MA">MA (Massachusetts)</option>
                                                <option @if($carrier->state == 'MI') selected @endif value="MI">MI (Michigan)</option>
                                                <option @if($carrier->state == 'MN') selected @endif value="MN">MN (Minnesota)</option>
                                                <option @if($carrier->state == 'MS') selected @endif value="MS">MS (Mississippi)</option>
                                                <option @if($carrier->state == 'MO') selected @endif value="MO">MO (Missouri)</option>
                                                <option @if($carrier->state == 'MT') selected @endif value="MT">MT (Montana)</option>
                                                <option @if($carrier->state == 'NE') selected @endif value="NE">NE (Nebraska)</option>
                                                <option @if($carrier->state == 'NV') selected @endif value="NV">NV (Nevada)</option>
                                                <option @if($carrier->state == 'NH') selected @endif value="NH">NH (New Hampshire)</option>
                                                <option @if($carrier->state == 'NJ') selected @endif value="NJ">NJ (New Jersey)</option>
                                                <option @if($carrier->state == 'NM') selected @endif value="NM">NM (New Mexico)</option>
                                                <option @if($carrier->state == 'NY') selected @endif value="NY">NY (New York)</option>
                                                <option @if($carrier->state == 'NC') selected @endif value="NC">NC (North Carolina)</option>
                                                <option @if($carrier->state == 'ND') selected @endif value="ND">ND (North Dakota)</option>
                                                <option @if($carrier->state == 'OH') selected @endif value="OH">OH (Ohio)</option>
                                                <option @if($carrier->state == 'OK') selected @endif value="OK">OK (Oklahoma)</option>
                                                <option @if($carrier->state == 'OR') selected @endif value="OR">OR (Oregon)</option>
                                                <option @if($carrier->state == 'PA') selected @endif value="PA">PA (Pennsylvania)</option>
                                                <option @if($carrier->state == 'PR') selected @endif value="PR">PR (Puerto Rico)</option>
                                                <option @if($carrier->state == 'RI') selected @endif value="RI">RI (Rhode Island)</option>
                                                <option @if($carrier->state == 'SC') selected @endif value="SC">SC (South Carolina)</option>
                                                <option @if($carrier->state == 'SD') selected @endif value="SD">SD (South Dakota)</option>
                                                <option @if($carrier->state == 'TN') selected @endif value="TN">TN (Tennessee)</option>
                                                <option @if($carrier->state == 'TX') selected @endif value="TX">TX (Texas)</option>
                                                <option @if($carrier->state == 'UT') selected @endif value="UT">UT (Utah)</option>
                                                <option @if($carrier->state == 'VT') selected @endif value="VT">VT (Vermont)</option>
                                                <option @if($carrier->state == 'VA') selected @endif value="VA">VA (Virginia)</option>
                                                <option @if($carrier->state == 'WA') selected @endif value="WA">WA (Washington)</option>
                                                <option @if($carrier->state == 'WV') selected @endif value="WV">WV (West Virginia)</option>
                                                <option @if($carrier->state == 'WI') selected @endif value="WI">WI (Wisconsin)</option>
                                                <option @if($carrier->state == 'WY') selected @endif value="WY">WY (Wyoming)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_email">*Email</label>
                                            <input class="form-control" required="required" placeholder="Enter email" type="email" name="email" value="{{old('email', $carrier->email)}}" id="carrier_email" tabindex="25">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_zip_code">*Zip Code</label>
                                            <input class="form-control requiredInputCarrier" placeholder="Enter zip code" required="required" type="text" name="zip_code" value="{{old('zip_code', $carrier->zip_code)}}" id="carrier_zip_code" tabindex="11">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_carrier_fee">Carrier Fee</label>
                                            <div class="input-group">
                                                <input class="form-control editMainField" type="number" step=".01" placeholder="Enter Carrier Fee" value="0.0" name="carrier_fee" value="{{old('carrier_fee', $carrier->carrier_fee)}}" id="carrier_carrier_fee" tabindex="13">
                                                <span class="input-group-addon">%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                <input @if($carrier->preferred_carrier_status) checked @endif type="checkbox" name="preferred_carrier_status"> Preferred Carrier Status
                                            </label>
                                        </div>
{{--                                        {{dd($carrier->smart_way_certified)}}--}}
                                        <div class="checkbox">
                                            <label>
                                                <input @if($carrier->smart_way_certified) checked @endif type="checkbox"  name="smart_way_certified"> SmartWay Certified
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input @if($carrier->carb_compliant) checked @endif type="checkbox" name="carb_compliant" value="{{old('carb_compliant', $carrier->carb_compliant)}}" id="carrier_carb_compliant"> Clean Air Compliant(CARB)
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input @if($carrier->use_dba_name) checked @endif type="checkbox" name="use_dba_name" value="{{old('use_dba_name', $carrier->use_dba_name)}}" id="carrier_use_dba_name"> Use DBA name
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input @if($carrier->require_carrier_agreement) checked @endif type="checkbox" name="require_carrier_agreement" value="{{old('require_carrier_agreement', $carrier->require_carrier_agreement)}}" id="carrier_require_carrier_agreement"> Require Carrier Agreement to Assign to Load
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_flag">Flag</label>
                                            <span>
                                                <input @if($carrier->flagged) checked @endif class="pull-left" style="margin-right:5px;" type="checkbox"  name="flagged" tabindex="15">
                                            </span>
                                            <textarea class="form-control" placeholder="Enter flag" name="flag"  value="{{old('flag', $carrier->flag)}}" id="carrier_flag" tabindex="16"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="customerNote" class="control-label">Note</label>
                                            <textarea class="form-control" id="customerNote" name="note" placeholder="Enter a note about this customer" rows="4" tabindex="15">{{old('note', $carrier->note)}}</textarea>
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
                                            <input class="form-control" placeholder="Enter company" type="text" name="payee_company" value="{{old('payee_company', $carrier->payee_company)}}" id="carrier_payee_company" tabindex="39">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_phone">Phone</label>
                                            <input class="form-control phoneMask" placeholder="Enter phone" type="text" name="payee_phone" value="{{old('payee_phone', $carrier->payee_phone)}}" id="carrier_payee_phone" tabindex="47">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_dba_name">Payee DBA name</label>
                                            <input class="form-control" placeholder="Enter Payee DBA name" type="text" name="payee_dba_name" value="{{old('payee_dba_name', $carrier->payee_dba_name)}}" id="carrier_payee_dba_name" tabindex="40">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_phone_extension">Phone Extension</label>
                                            <input class="form-control" placeholder="Enter phone extension" type="text" name="payee_phone_extension" value="{{old('payee_phone_extension', $carrier->payee_phone_extension)}}" id="carrier_payee_phone_extension" tabindex="48">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_address1">Address 1</label>
                                            <input class="form-control" placeholder="Enter address" type="text" name="payee_address1" value="{{old('payee_address1', $carrier->payee_address1)}}" id="carrier_payee_address1" tabindex="41">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_cell_phone">Cellphone</label>
                                            <input class="form-control phoneMask" placeholder="Enter phone" type="text" name="payee_cell_phone" value="{{old('payee_cell_phone', $carrier->payee_cell_phone)}}" id="carrier_payee_cell_phone" tabindex="49">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_address2">Address 2</label>
                                            <input class="form-control" placeholder="Enter address 2" type="text" name="payee_address2" value="{{old('payee_address2', $carrier->payee_address2)}}" id="carrier_payee_address2" tabindex="42">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_fax">Fax</label>
                                            <input class="form-control phoneMask" placeholder="Enter fax number" type="text" name="payee_fax" value="{{old('payee_fax', $carrier->payee_fax)}}" id="carrier_payee_fax" tabindex="50">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_city">City</label>
                                            <input class="form-control" placeholder="Enter city" type="text" name="payee_city" value="{{old('payee_city', $carrier->payee_city)}}" id="carrier_payee_city" tabindex="43">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_fed_id">Federal ID</label>
                                            <input class="form-control" placeholder="Enter federal ID" type="text" name="payee_fed_id" value="{{old('payee_fed_id', $carrier->payee_fed_id)}}" id="carrier_payee_fed_id" tabindex="51">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_state">State/Province</label>
                                            <select id="carrier_payee_state" name="payee_state" class="selectpicker" data-live-search="true">
                                                <option disabled selected value>Select State/Province</option>
                                                <option @if($carrier->payee_state == 'AL') selected @endif value="AL">AL (Alabama)</option>
                                                <option @if($carrier->payee_state == 'AK') selected @endif value="AK">AK (Alaska)</option>
                                                <option @if($carrier->payee_state == 'AZ') selected @endif value="AZ">AZ (Arizona)</option>
                                                <option @if($carrier->payee_state == 'AR') selected @endif value="AR">AR (Arkansas)</option>
                                                <option @if($carrier->payee_state == 'CA') selected @endif value="CA">CA (California)</option>
                                                <option @if($carrier->payee_state == 'CO') selected @endif value="CO">CO (Colorado)</option>
                                                <option @if($carrier->payee_state == 'CT') selected @endif value="CT">CT (Connecticut)</option>
                                                <option @if($carrier->payee_state == 'DE') selected @endif value="DE">DE (Delaware)</option>
                                                <option @if($carrier->payee_state == 'DC') selected @endif value="DC">DC (District of Columbia)</option>
                                                <option @if($carrier->payee_state == 'FL') selected @endif value="FL">FL (Florida)</option>
                                                <option @if($carrier->payee_state == 'GA') selected @endif value="GA">GA (Georgia)</option>
                                                <option @if($carrier->payee_state == 'HI') selected @endif value="HI">HI (Hawaii)</option>
                                                <option @if($carrier->payee_state == 'ID') selected @endif value="ID">ID (Idaho)</option>
                                                <option @if($carrier->payee_state == 'IL') selected @endif value="IL">IL (Illinois)</option>
                                                <option @if($carrier->payee_state == 'IN') selected @endif value="IN">IN (Indiana)</option>
                                                <option @if($carrier->payee_state == 'IA') selected @endif value="IA">IA (Iowa)</option>
                                                <option @if($carrier->payee_state == 'KS') selected @endif value="KS">KS (Kansas)</option>
                                                <option @if($carrier->payee_state == 'KY') selected @endif value="KY">KY (Kentucky)</option>
                                                <option @if($carrier->payee_state == 'LA') selected @endif value="LA">LA (Louisiana)</option>
                                                <option @if($carrier->payee_state == 'ME') selected @endif value="ME">ME (Maine)</option>
                                                <option @if($carrier->payee_state == 'MD') selected @endif value="MD">MD (Maryland)</option>
                                                <option @if($carrier->payee_state == 'MA') selected @endif value="MA">MA (Massachusetts)</option>
                                                <option @if($carrier->payee_state == 'MI') selected @endif value="MI">MI (Michigan)</option>
                                                <option @if($carrier->payee_state == 'MN') selected @endif value="MN">MN (Minnesota)</option>
                                                <option @if($carrier->payee_state == 'MS') selected @endif value="MS">MS (Mississippi)</option>
                                                <option @if($carrier->payee_state == 'MO') selected @endif value="MO">MO (Missouri)</option>
                                                <option @if($carrier->payee_state == 'MT') selected @endif value="MT">MT (Montana)</option>
                                                <option @if($carrier->payee_state == 'NE') selected @endif value="NE">NE (Nebraska)</option>
                                                <option @if($carrier->payee_state == 'NV') selected @endif value="NV">NV (Nevada)</option>
                                                <option @if($carrier->payee_state == 'NH') selected @endif value="NH">NH (New Hampshire)</option>
                                                <option @if($carrier->payee_state == 'NJ') selected @endif value="NJ">NJ (New Jersey)</option>
                                                <option @if($carrier->payee_state == 'NM') selected @endif value="NM">NM (New Mexico)</option>
                                                <option @if($carrier->payee_state == 'NY') selected @endif value="NY">NY (New York)</option>
                                                <option @if($carrier->payee_state == 'NC') selected @endif value="NC">NC (North Carolina)</option>
                                                <option @if($carrier->payee_state == 'ND') selected @endif value="ND">ND (North Dakota)</option>
                                                <option @if($carrier->payee_state == 'OH') selected @endif value="OH">OH (Ohio)</option>
                                                <option @if($carrier->payee_state == 'OK') selected @endif value="OK">OK (Oklahoma)</option>
                                                <option @if($carrier->payee_state == 'OR') selected @endif value="OR">OR (Oregon)</option>
                                                <option @if($carrier->payee_state == 'PA') selected @endif value="PA">PA (Pennsylvania)</option>
                                                <option @if($carrier->payee_state == 'PR') selected @endif value="PR">PR (Puerto Rico)</option>
                                                <option @if($carrier->payee_state == 'RI') selected @endif value="RI">RI (Rhode Island)</option>
                                                <option @if($carrier->payee_state == 'SC') selected @endif value="SC">SC (South Carolina)</option>
                                                <option @if($carrier->payee_state == 'SD') selected @endif value="SD">SD (South Dakota)</option>
                                                <option @if($carrier->payee_state == 'TN') selected @endif value="TN">TN (Tennessee)</option>
                                                <option @if($carrier->payee_state == 'TX') selected @endif value="TX">TX (Texas)</option>
                                                <option @if($carrier->payee_state == 'UT') selected @endif value="UT">UT (Utah)</option>
                                                <option @if($carrier->payee_state == 'VT') selected @endif value="VT">VT (Vermont)</option>
                                                <option @if($carrier->payee_state == 'VA') selected @endif value="VA">VA (Virginia)</option>
                                                <option @if($carrier->payee_state == 'WA') selected @endif value="WA">WA (Washington)</option>
                                                <option @if($carrier->payee_state == 'WV') selected @endif value="WV">WV (West Virginia)</option>
                                                <option @if($carrier->payee_state == 'WI') selected @endif value="WI">WI (Wisconsin)</option>
                                                <option @if($carrier->payee_state == 'WY') selected @endif value="WY">WY (Wyoming)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_payee_zip_code">Zip Code</label>
                                            <input class="form-control" placeholder="Enter zip code" type="text" name="payee_zip_code" value="{{old('payee_zip_code', $carrier->payee_zip_code)}}" id="carrier_payee_zip_code" tabindex="46">
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
                                                    <input class="form-control editMainField" placeholder="Enter factoring company name" maxlength="41" size="41" type="text" name="factoring_company_name" value="{{old('factoring_company_name', $carrier->factoring_company_name)}}" id="carrier_factoring_remit_attributes_factoring_company_name" tabindex="55">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_phone">Phone</label>
                                                    <input class="form-control editMainField phoneMask" placeholder="Enter phone" type="text" name="factoring_phone" value="{{old('factoring_phone', $carrier->factoring_phone)}}" id="carrier_factoring_remit_attributes_factoring_phone" tabindex="62">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_remit_address">Address 1</label>
                                                    <input class="form-control editMainField" placeholder="Enter address" maxlength="41" size="41" type="text" name="factoring_remit_address" value="{{old('factoring_remit_address', $carrier->factoring_remit_address)}}" id="carrier_factoring_remit_attributes_factoring_remit_address" tabindex="56">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_remit_email">Email</label>
                                                    <input class="form-control editMainField" placeholder="Enter email" maxlength="41" size="41" type="text" name="factoring_remit_email" value="{{old('factoring_remit_email', $carrier->factoring_remit_email)}}" id="carrier_factoring_remit_attributes_factoring_remit_email" tabindex="63">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_remit_address2">Address 2</label>
                                                    <input class="form-control editMainField" placeholder="Enter address 2" type="text" name="factoring_remit_address2" value="{{old('factoring_remit_address2', $carrier->factoring_remit_address2)}}" id="carrier_factoring_remit_attributes_factoring_remit_address2" tabindex="57">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_remit_city">City</label>
                                                    <input class="form-control editMainField" placeholder="Enter city" maxlength="41" size="41" type="text" name="factoring_remit_city" value="{{old('factoring_remit_city', $carrier->factoring_remit_city)}}" id="carrier_factoring_remit_attributes_factoring_remit_city" tabindex="58">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_remit_state_province">State/Province</label>
                                                    <select id="carrier_factoring_remit_attributes_factoring_remit_state_province" name="factoring_state" class="selectpicker" data-live-search="true">
                                                        <option disabled selected value>Select State/Province</option>
                                                        <option @if($carrier->factoring_state == 'AL') selected @endif value="AL">AL (Alabama)</option>
                                                        <option @if($carrier->factoring_state == 'AK') selected @endif value="AK">AK (Alaska)</option>
                                                        <option @if($carrier->factoring_state == 'AZ') selected @endif value="AZ">AZ (Arizona)</option>
                                                        <option @if($carrier->factoring_state == 'AR') selected @endif value="AR">AR (Arkansas)</option>
                                                        <option @if($carrier->factoring_state == 'CA') selected @endif value="CA">CA (California)</option>
                                                        <option @if($carrier->factoring_state == 'CO') selected @endif value="CO">CO (Colorado)</option>
                                                        <option @if($carrier->factoring_state == 'CT') selected @endif value="CT">CT (Connecticut)</option>
                                                        <option @if($carrier->factoring_state == 'DE') selected @endif value="DE">DE (Delaware)</option>
                                                        <option @if($carrier->factoring_state == 'DC') selected @endif value="DC">DC (District of Columbia)</option>
                                                        <option @if($carrier->factoring_state == 'FL') selected @endif value="FL">FL (Florida)</option>
                                                        <option @if($carrier->factoring_state == 'GA') selected @endif value="GA">GA (Georgia)</option>
                                                        <option @if($carrier->factoring_state == 'HI') selected @endif value="HI">HI (Hawaii)</option>
                                                        <option @if($carrier->factoring_state == 'ID') selected @endif value="ID">ID (Idaho)</option>
                                                        <option @if($carrier->factoring_state == 'IL') selected @endif value="IL">IL (Illinois)</option>
                                                        <option @if($carrier->factoring_state == 'IN') selected @endif value="IN">IN (Indiana)</option>
                                                        <option @if($carrier->factoring_state == 'IA') selected @endif value="IA">IA (Iowa)</option>
                                                        <option @if($carrier->factoring_state == 'KS') selected @endif value="KS">KS (Kansas)</option>
                                                        <option @if($carrier->factoring_state == 'KY') selected @endif value="KY">KY (Kentucky)</option>
                                                        <option @if($carrier->factoring_state == 'LA') selected @endif value="LA">LA (Louisiana)</option>
                                                        <option @if($carrier->factoring_state == 'ME') selected @endif value="ME">ME (Maine)</option>
                                                        <option @if($carrier->factoring_state == 'MD') selected @endif value="MD">MD (Maryland)</option>
                                                        <option @if($carrier->factoring_state == 'MA') selected @endif value="MA">MA (Massachusetts)</option>
                                                        <option @if($carrier->factoring_state == 'MI') selected @endif value="MI">MI (Michigan)</option>
                                                        <option @if($carrier->factoring_state == 'MN') selected @endif value="MN">MN (Minnesota)</option>
                                                        <option @if($carrier->factoring_state == 'MS') selected @endif value="MS">MS (Mississippi)</option>
                                                        <option @if($carrier->factoring_state == 'MO') selected @endif value="MO">MO (Missouri)</option>
                                                        <option @if($carrier->factoring_state == 'MT') selected @endif value="MT">MT (Montana)</option>
                                                        <option @if($carrier->factoring_state == 'NE') selected @endif value="NE">NE (Nebraska)</option>
                                                        <option @if($carrier->factoring_state == 'NV') selected @endif value="NV">NV (Nevada)</option>
                                                        <option @if($carrier->factoring_state == 'NH') selected @endif value="NH">NH (New Hampshire)</option>
                                                        <option @if($carrier->factoring_state == 'NJ') selected @endif value="NJ">NJ (New Jersey)</option>
                                                        <option @if($carrier->factoring_state == 'NM') selected @endif value="NM">NM (New Mexico)</option>
                                                        <option @if($carrier->factoring_state == 'NY') selected @endif value="NY">NY (New York)</option>
                                                        <option @if($carrier->factoring_state == 'NC') selected @endif value="NC">NC (North Carolina)</option>
                                                        <option @if($carrier->factoring_state == 'ND') selected @endif value="ND">ND (North Dakota)</option>
                                                        <option @if($carrier->factoring_state == 'OH') selected @endif value="OH">OH (Ohio)</option>
                                                        <option @if($carrier->factoring_state == 'OK') selected @endif value="OK">OK (Oklahoma)</option>
                                                        <option @if($carrier->factoring_state == 'OR') selected @endif value="OR">OR (Oregon)</option>
                                                        <option @if($carrier->factoring_state == 'PA') selected @endif value="PA">PA (Pennsylvania)</option>
                                                        <option @if($carrier->factoring_state == 'PR') selected @endif value="PR">PR (Puerto Rico)</option>
                                                        <option @if($carrier->factoring_state == 'RI') selected @endif value="RI">RI (Rhode Island)</option>
                                                        <option @if($carrier->factoring_state == 'SC') selected @endif value="SC">SC (South Carolina)</option>
                                                        <option @if($carrier->factoring_state == 'SD') selected @endif value="SD">SD (South Dakota)</option>
                                                        <option @if($carrier->factoring_state == 'TN') selected @endif value="TN">TN (Tennessee)</option>
                                                        <option @if($carrier->factoring_state == 'TX') selected @endif value="TX">TX (Texas)</option>
                                                        <option @if($carrier->factoring_state == 'UT') selected @endif value="UT">UT (Utah)</option>
                                                        <option @if($carrier->factoring_state == 'VT') selected @endif value="VT">VT (Vermont)</option>
                                                        <option @if($carrier->factoring_state == 'VA') selected @endif value="VA">VA (Virginia)</option>
                                                        <option @if($carrier->factoring_state == 'WA') selected @endif value="WA">WA (Washington)</option>
                                                        <option @if($carrier->factoring_state == 'WV') selected @endif value="WV">WV (West Virginia)</option>
                                                        <option @if($carrier->factoring_state == 'WI') selected @endif value="WI">WI (Wisconsin)</option>
                                                        <option @if($carrier->factoring_state == 'WY') selected @endif value="WY">WY (Wyoming)</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="carrier_factoring_remit_attributes_factoring_remit_zipcode">Zip code</label>
                                                    <input class="form-control editMainField" placeholder="Enter zip code" type="text" name="factoring_remit_zipcode" value="{{old('factoring_remit_zipcode', $carrier->factoring_remit_zipcode)}}" id="carrier_factoring_remit_attributes_factoring_remit_zipcode" tabindex="61">
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
                                            <input class="form-control" placeholder="Enter MC Number" type="text" name="mc_number" value="{{old('mc_number', $carrier->mc_number)}}" id="carrier_mc_number" tabindex="64">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="carrier_dot_number">DOT #</label>
                                            <input class="form-control" placeholder="Enter DOT Number" type="text" name="dot_number" value="{{old('dot_number', $carrier->dot_number)}}" id="carrier_dot_number" tabindex="66">
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
                                            <input class="form-control" placeholder="Enter insurer name" type="text" name="insurance1_insurer" value="{{old('insurance1_insurer', $carrier->insurance1_insurer)}}" id="carrier_carrier_insurance_policies_attributes_0_insurer" tabindex="72">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="insuranceAmountGroup" class="form-group">
                                            <label for="insuranceAmount" class="control-label">*Amount</label>
                                            <input class="form-control" placeholder="Enter amount" min="0.01" step="0.01" required="required" type="number" name="insurance1_amount" value="{{old('insurance1_amount', $carrier->insurance1_amount)}}" id="carrier_carrier_insurance_policies_attributes_0_amount" tabindex="69">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurancePolicyNumber" class="control-label">Policy #</label>
                                            <input class="form-control" placeholder="Enter insurance policy number" type="text" name="insurance1_policy_number" value="{{old('insurance1_policy_number', $carrier->insurance1_policy_number)}}" id="carrier_carrier_insurance_policies_attributes_0_policy_number" tabindex="73">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="insuranceEffectiveDateGroup" class="form-group">
                                            <label class="control-label">Effective Date</label>
                                            <div class="input-group date datePicker defaultDatePicker">
                                                <input class="datepicker form-control" placeholder="Enter effective on date"  type="text" name="insurance1_effective_on" value="{{old('insurance1_effective_on', $carrier->insurance1_effective_on)}}" id="carrier_carrier_insurance_policies_attributes_0_effective_on" tabindex="70" min={{date('Y-m-d')}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">*Expiration Date</label>
                                            <div class="input-group date datePicker defaultDatePicker">
                                                <input class="insuranceExpirationDate datepicker form-control" placeholder="Enter expires on date" required="required" type="text" name="insurance1_expires_on" value="{{old('insurance1_expires_on', $carrier->insurance1_expires_on)}}" id="carrier_carrier_insurance_policies_attributes_0_expires_on" tabindex="74" min={{date('Y-m-d')}}>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurancePhone" class="control-label">Phone</label>
                                            <input class="form-control phoneMask" placeholder="Enter phone" type="text" name="insurance1_phone" value="{{old('insurance1_phone', $carrier->insurance1_phone)}}" id="carrier_carrier_insurance_policies_attributes_0_phone" tabindex="71">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insuranceEmail" class="control-label">Email</label>
                                            <input class="form-control" placeholder="Enter email" type="email" name="insurance1_email" value="{{old('insurance1_email', $carrier->insurance1_email)}}" id="carrier_carrier_insurance_policies_attributes_0_email" tabindex="75">
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
                                            <input class="form-control" placeholder="Enter insurer name" type="text" name="insurance2_insurer" value="{{old('insurance2_insurer', $carrier->insurance2_insurer)}}" id="carrier_carrier_insurance_policies_attributes_1_insurer" tabindex="80">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="insuranceAmountGroup" class="form-group">
                                            <label for="insuranceAmount" class="control-label">*Amount</label>
                                            <input class="form-control" placeholder="Enter amount" min="0.01" step="0.01" required="required" type="number" name="insurance2_amount" value="{{old('insurance2_amount', $carrier->insurance2_amount)}}" id="carrier_carrier_insurance_policies_attributes_1_amount" tabindex="77">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurancePolicyNumber" class="control-label">Policy #</label>
                                            <input class="form-control" placeholder="Enter insurance policy number" type="text" name="insurance2_policy_number" value="{{old('insurance2_policy_number', $carrier->insurance2_policy_number)}}" id="carrier_carrier_insurance_policies_attributes_1_policy_number" tabindex="81">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="insuranceEffectiveDateGroup" class="form-group">
                                            <label class="control-label">Effective Date</label>
                                            <div class="input-group date datePicker defaultDatePicker">
                                                <input class="datepicker form-control" placeholder="Enter effective on date"  type="text" name="insurance2_effective_on" value="{{old('insurance2_effective_on', $carrier->insurance2_effective_on)}}" id="carrier_carrier_insurance_policies_attributes_1_effective_on" tabindex="78" min={{date('Y-m-d')}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">*Expiration Date</label>
                                            <div class="input-group date datePicker defaultDatePicker">
                                                <input class="insuranceExpirationDate datepicker form-control" placeholder="Enter expires on date" required="required"  type="text" name="insurance2_expires_on" value="{{old('insurance2_expires_on', $carrier->insurance2_expires_on)}}" id="carrier_carrier_insurance_policies_attributes_1_expires_on" tabindex="82" min={{date('Y-m-d')}}>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurancePhone" class="control-label">Phone</label>
                                            <input class="form-control phoneMask" placeholder="Enter phone" type="text" name="insurance2_phone" value="{{old('insurance2_phone', $carrier->insurance2_phone)}}" id="carrier_carrier_insurance_policies_attributes_1_phone" tabindex="79">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insuranceEmail" class="control-label">Email</label>
                                            <input class="form-control" placeholder="Enter email" type="email" name="insurance2_email" value="{{old('insurance2_email', $carrier->insurance2_email)}}" id="carrier_carrier_insurance_policies_attributes_1_email" tabindex="83">
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
                                                    @include('helpers.document-table', ['model' => $carrier])
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
    @include('helpers.document-create-modal', ['model' => $carrier, 'inputName' => 'carrier_id', 'loads' => $carrier->loads])
    @include('helpers.document-edit-modal', ['model' => $carrier, 'inputName' => 'carrier_id', 'loads' => $carrier->loads])
@endsection

