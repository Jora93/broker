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

    <div class="row customer-create col-sm-12">
        <form method="post" action="{{ url('/'.\App::make('currentCompany')->id.'/customers')}}" class="col-sm-12">
        @csrf

        <!-- Company Information -->
        <div class="col-md-6">
            <div class="entityPanel entityFillPanel customerPanel">
                <div class="entityPanelHeading"a>
                    <div class="entityPanelTitle">Company Information</div>
                </div>
                <div class="entityPanelBody tabIndexContainer">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_status">*Status</label>
                                <select class="form-control" name="status" id="customer_status" tabindex="1">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">MC #</label>
                                <input class="form-control" placeholder="Enter MC Number" type="text" name="mc_number" value="{{old('mc_number')}}" tabindex="64">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_company">*Company</label>
                                <input class="form-control requiredInputCustomer focusOnLoad" placeholder="Enter company" required="required" type="text" name="company" value="{{old('company')}}" id="customer_company" tabindex="2">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_phone">*Phone</label>
                                <input class="form-control requiredInputCustomer phoneMask" placeholder="Enter phone" required="required" type="text" name="phone" value="{{old('phone')}}" id="customer_phone" tabindex="24">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_address1">*Address 1</label>
                                <input class="form-control requiredInputCustomer" placeholder="Enter address" required="required" type="text" name="address1" value="{{old('address1')}}" id="customer_address1" tabindex="3">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_phone_extension">Phone Extension</label>
                                <input class="form-control" placeholder="Enter phone extension" type="text" name="phone_extension" value="{{old('phone_extension')}}" id="customer_phone_extension" tabindex="25">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_address2">Address 2</label>
                                <input class="form-control" placeholder="Enter address 2" type="text" name="address2" value="{{old('address2')}}" id="customer_address2" tabindex="4">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_fax">Fax</label>
                                <input class="form-control phoneMask" placeholder="Enter fax number" type="text" name="fax" value="{{old('fax')}}" id="customer_fax" tabindex="26">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_city">*City</label>
                                <input class="form-control requiredInputCustomer" placeholder="Enter city" required="required" type="text" name="city" value="{{old('city')}}" id="customer_city" tabindex="5">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_email">Email</label>
                                <input class="form-control" placeholder="Enter email" type="email" name="email" value="{{old('email')}}" id="customer_email" tabindex="27">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">*State/Province</label><br>
                                <select name="state" value="{{old('state')}}" id="customer_state" class="selectpicker" required="true" data-live-search="true">
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
                                <label class="control-label" for="customer_zip_code">*Zip Code</label>
                                <input class="form-control requiredInputCustomer" placeholder="Enter zip code" required="required" type="text" name="zip_code" value="{{old('zip_code')}}" id="customer_zip_code" tabindex="8">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_credit_limit">*Credit Limit</label>
                                <input class="form-control" required="required" type="number" name="credit_limit" value="{{old('credit_limit', 10000)}}" id="credit_limit" tabindex="9">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_currency">Currency</label><span class="formInfo glyphicon glyphicon-info-sign" title="Select the default currency type to be used when calculating invoices and payments."></span>
                                <select class="form-control" name="currency" id="customer_currency" tabindex="30"><option value="{{old('currency')}}">Select Currency</option>
                                    <option selected="selected" value="USD">USD</option>
                                    <option value="CAD">CAD</option>
                                    <option value="MXN">MXN</option></select>
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

        <!-- Billing Information -->
        <div class="col-md-6">
            <div class="entityPanel entityFillPanel customerPanel">
                <div class="entityPanelHeading">
                    <div class="entityPanelTitle">
                        <div class="row">
                            <div class="col-md-4">Billing Information</div>
                            <div class="col-md-8 panelTitleLinkContainer"><a class="actionLink" href="javascript:void(0)" onclick="copyCompanyInfoToBillingInfo()"><span class="glyphicon glyphicon-copy"></span> Copy from Company Information</a></div>
                        </div>
                    </div>
                </div>
                <div class="entityPanelBody tabIndexContainer">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_billing_company">*Company</label>
                                <input class="form-control requiredInputCustomer" placeholder="Enter billing company" type="text" name="billing_company" value="{{old('billing_company')}}" id="customer_billing_company" tabindex="37">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_billing_phone">*Phone</label>
                                <input class="form-control requiredInputCustomer phoneMask" placeholder="Enter billing phone" type="text" name="billing_phone" value="{{old('billing_phone')}}" id="customer_billing_phone" tabindex="44">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_billing_address1">*Address 1</label>
                                <input class="form-control requiredInputCustomer" placeholder="Enter billing address" type="text" name="billing_address1" value="{{old('billing_address1')}}" id="customer_billing_address1" tabindex="38">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_billing_phone_extension">Phone Extension</label>
                                <input class="form-control" placeholder="Enter billing phone extension" type="text" name="billing_phone_extension" value="{{old('billing_phone_extension')}}" id="customer_billing_phone_extension" tabindex="45">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_billing_address2">Address 2</label>
                                <input class="form-control" placeholder="Enter billing address 2" type="text" name="billing_address2" value="{{old('billing_address2')}}" id="customer_billing_address2" tabindex="39">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_billing_fax">Fax</label>
                                <input class="form-control phoneMask" placeholder="Enter billing fax number" type="text" name="billing_fax" value="{{old('billing_fax')}}" id="customer_billing_fax" tabindex="46">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_billing_city">*City</label>
                                <input class="form-control requiredInputCustomer" placeholder="Enter billing city" type="text" name="billing_city" value="{{old('billing_city')}}" id="customer_billing_city" tabindex="40">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">*State/Province</label><br>
                                <select name="billing_state" value="{{old('billing_state')}}" id="customer_billing_state" class="selectpicker" required="true" data-live-search="true">
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
                                <label class="control-label" for="customer_billing_zip_code">*Zip Code</label>
                                <input class="form-control requiredInputCustomer" placeholder="Enter billing zip code" type="text" name="billing_zip_code" value="{{old('billing_zip_code')}}" id="customer_billing_zip_code" tabindex="43">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Customer</button>
            </div>
        </div>
        </form>
    </div>
@endsection
