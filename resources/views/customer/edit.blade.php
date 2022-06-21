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
    <div class="row justify-content-center">
        <div class="customer-create col-sm-12">
            <div class="card-header">
                <h3>Edit Customer</h3>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item col-sm-2 Customer-tab">
                    <a class="nav-link active" id="customer-tab" data-toggle="tab" href="#customer" role="tab" aria-controls="load" aria-selected="true">Customer</a>
                </li>
                <li class="nav-item col-sm-2 documents-tab">
                    <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents" aria-selected="false">Documents</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="customer" role="tabpanel" aria-labelledby="customer-tab">
                    <div id="customer" class="tabcontent" style="display: block;">
                        <form method="POST" action="{{url(\App::make('currentCompany')->id.'/customers/'.$customer->id)}}" class="col-sm-12">
            @method('PATCH')
            @csrf

        <!-- Company Information -->
            <div class="col-md-6">
                <div class="entityPanel entityFillPanel customerPanel">
                    <div class="entityPanelHeading">
                        <div class="entityPanelTitle">Company Information</div>
                    </div>
                    <div class="entityPanelBody tabIndexContainer">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_status">*Status</label>
                                    <select class="form-control" name="status" id="customer_status" tabindex="1">
                                        <option  @if($customer->status == 'Active') selected @endif value="Active">Active</option>
                                        <option  @if($customer->status == 'Inactive') selected @endif value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">MC #</label>
                                    <input class="form-control" placeholder="Enter MC Number" type="text" name="mc_number" value="{{old('mc_number', $customer->mc_number)}}" tabindex="64">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_company">*Company</label>
                                    <input class="form-control requiredInputCustomer focusOnLoad" placeholder="Enter company" required="required" type="text" name="company" value="{{old('company', $customer->company)}}" id="customer_company" tabindex="2">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_phone">*Phone</label>
                                    <input class="form-control requiredInputCustomer phoneMask" placeholder="Enter phone" required="required" type="text" name="phone" value="{{old('phone', $customer->phone)}}" id="customer_phone" tabindex="24">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_address1">*Address 1</label>
                                    <input class="form-control requiredInputCustomer" placeholder="Enter address" required="required" type="text" name="address1" value="{{old('address1', $customer->address1)}}" id="customer_address1" tabindex="3">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_phone_extension">Phone Extension</label>
                                    <input class="form-control" placeholder="Enter phone extension" type="text" name="phone_extension" value="{{old('phone_extension', $customer->phone_extension)}}" id="customer_phone_extension" tabindex="25">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_address2">Address 2</label>
                                    <input class="form-control" placeholder="Enter address 2" type="text" name="address2" value="{{old('address2', $customer->address2)}}" id="customer_address2" tabindex="4">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_fax">Fax</label>
                                    <input class="form-control phoneMask" placeholder="Enter fax number" type="text" name="fax" value="{{old('fax', $customer->fax)}}" id="customer_fax" tabindex="26">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_city">*City</label>
                                    <input class="form-control requiredInputCustomer" placeholder="Enter city" required="required" type="text" name="city" value="{{old('city', $customer->city)}}" id="customer_city" tabindex="5">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_email">Email</label>
                                    <input class="form-control" placeholder="Enter email" type="email" name="email" value="{{old('email', $customer->email)}}" id="customer_email" tabindex="27">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">*State/Province</label><br>
                                    <select name="state" id="customer_state" class="selectpicker" required="true" data-live-search="true">
                                        <option disabled selected value>Select State/Province</option>
                                        <option @if($customer->state == 'AL') selected @endif value="AL">AL (Alabama)</option>
                                        <option @if($customer->state == 'AK') selected @endif value="AK">AK (Alaska)</option>
                                        <option @if($customer->state == 'AZ') selected @endif value="AZ">AZ (Arizona)</option>
                                        <option @if($customer->state == 'AR') selected @endif value="AR">AR (Arkansas)</option>
                                        <option @if($customer->state == 'CA') selected @endif value="CA">CA (California)</option>
                                        <option @if($customer->state == 'CO') selected @endif value="CO">CO (Colorado)</option>
                                        <option @if($customer->state == 'CT') selected @endif value="CT">CT (Connecticut)</option>
                                        <option @if($customer->state == 'DE') selected @endif value="DE">DE (Delaware)</option>
                                        <option @if($customer->state == 'DC') selected @endif value="DC">DC (District of Columbia)</option>
                                        <option @if($customer->state == 'FL') selected @endif value="FL">FL (Florida)</option>
                                        <option @if($customer->state == 'GA') selected @endif value="GA">GA (Georgia)</option>
                                        <option @if($customer->state == 'HI') selected @endif value="HI">HI (Hawaii)</option>
                                        <option @if($customer->state == 'ID') selected @endif value="ID">ID (Idaho)</option>
                                        <option @if($customer->state == 'IL') selected @endif value="IL">IL (Illinois)</option>
                                        <option @if($customer->state == 'IN') selected @endif value="IN">IN (Indiana)</option>
                                        <option @if($customer->state == 'IA') selected @endif value="IA">IA (Iowa)</option>
                                        <option @if($customer->state == 'KS') selected @endif value="KS">KS (Kansas)</option>
                                        <option @if($customer->state == 'KY') selected @endif value="KY">KY (Kentucky)</option>
                                        <option @if($customer->state == 'LA') selected @endif value="LA">LA (Louisiana)</option>
                                        <option @if($customer->state == 'ME') selected @endif value="ME">ME (Maine)</option>
                                        <option @if($customer->state == 'MD') selected @endif value="MD">MD (Maryland)</option>
                                        <option @if($customer->state == 'MA') selected @endif value="MA">MA (Massachusetts)</option>
                                        <option @if($customer->state == 'MI') selected @endif value="MI">MI (Michigan)</option>
                                        <option @if($customer->state == 'MN') selected @endif value="MN">MN (Minnesota)</option>
                                        <option @if($customer->state == 'MS') selected @endif value="MS">MS (Mississippi)</option>
                                        <option @if($customer->state == 'MO') selected @endif value="MO">MO (Missouri)</option>
                                        <option @if($customer->state == 'MT') selected @endif value="MT">MT (Montana)</option>
                                        <option @if($customer->state == 'NE') selected @endif value="NE">NE (Nebraska)</option>
                                        <option @if($customer->state == 'NV') selected @endif value="NV">NV (Nevada)</option>
                                        <option @if($customer->state == 'NH') selected @endif value="NH">NH (New Hampshire)</option>
                                        <option @if($customer->state == 'NJ') selected @endif value="NJ">NJ (New Jersey)</option>
                                        <option @if($customer->state == 'NM') selected @endif value="NM">NM (New Mexico)</option>
                                        <option @if($customer->state == 'NY') selected @endif value="NY">NY (New York)</option>
                                        <option @if($customer->state == 'NC') selected @endif value="NC">NC (North Carolina)</option>
                                        <option @if($customer->state == 'ND') selected @endif value="ND">ND (North Dakota)</option>
                                        <option @if($customer->state == 'OH') selected @endif value="OH">OH (Ohio)</option>
                                        <option @if($customer->state == 'OK') selected @endif value="OK">OK (Oklahoma)</option>
                                        <option @if($customer->state == 'OR') selected @endif value="OR">OR (Oregon)</option>
                                        <option @if($customer->state == 'PA') selected @endif value="PA">PA (Pennsylvania)</option>
                                        <option @if($customer->state == 'PR') selected @endif value="PR">PR (Puerto Rico)</option>
                                        <option @if($customer->state == 'RI') selected @endif value="RI">RI (Rhode Island)</option>
                                        <option @if($customer->state == 'SC') selected @endif value="SC">SC (South Carolina)</option>
                                        <option @if($customer->state == 'SD') selected @endif value="SD">SD (South Dakota)</option>
                                        <option @if($customer->state == 'TN') selected @endif value="TN">TN (Tennessee)</option>
                                        <option @if($customer->state == 'TX') selected @endif value="TX">TX (Texas)</option>
                                        <option @if($customer->state == 'UT') selected @endif value="UT">UT (Utah)</option>
                                        <option @if($customer->state == 'VT') selected @endif value="VT">VT (Vermont)</option>
                                        <option @if($customer->state == 'VA') selected @endif value="VA">VA (Virginia)</option>
                                        <option @if($customer->state == 'WA') selected @endif value="WA">WA (Washington)</option>
                                        <option @if($customer->state == 'WV') selected @endif value="WV">WV (West Virginia)</option>
                                        <option @if($customer->state == 'WI') selected @endif value="WI">WI (Wisconsin)</option>
                                        <option @if($customer->state == 'WY') selected @endif value="WY">WY (Wyoming)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_zip_code">*Zip Code</label>
                                    <input class="form-control requiredInputCustomer" placeholder="Enter zip code" required="required" type="text" name="zip_code" value="{{old('zip_code', $customer->zip_code)}}" id="customer_zip_code" tabindex="8">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_credit_limit">*Credit Limit</label>
                                    <input class="form-control" required="required" type="number" name="credit_limit" value="{{old('credit_limit', $customer->credit_limit)}}" id="credit_limit" tabindex="9">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_currency">Currency</label><span class="formInfo glyphicon glyphicon-info-sign" title="Select the default currency type to be used when calculating invoices and payments."></span>
                                    <select class="form-control" name="currency" id="customer_currency" tabindex="30"><option value="{{old('currency', $customer->currency)}}">Select Currency</option>
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
                                    <textarea class="form-control" id="customerNote" name="note" placeholder="Enter a note about this customer" rows="4" tabindex="15">{{old('note', $customer->note)}}</textarea>
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
                                    <input class="form-control requiredInputCustomer" placeholder="Enter billing company" type="text" name="billing_company" value="{{old('billing_company', $customer->billing_company)}}" id="customer_billing_company" tabindex="37">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_billing_phone">*Phone</label>
                                    <input class="form-control requiredInputCustomer phoneMask" placeholder="Enter billing phone" type="text" name="billing_phone" value="{{old('billing_phone', $customer->billing_phone)}}" id="customer_billing_phone" tabindex="44">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_billing_address1">*Address 1</label>
                                    <input class="form-control requiredInputCustomer" placeholder="Enter billing address" type="text" name="billing_address1" value="{{old('billing_address1', $customer->billing_address1)}}" id="customer_billing_address1" tabindex="38">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_billing_phone_extension">Phone Extension</label>
                                    <input class="form-control" placeholder="Enter billing phone extension" type="text" name="billing_phone_extension" value="{{old('billing_phone_extension', $customer->billing_phone_extension)}}" id="customer_billing_phone_extension" tabindex="45">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_billing_address2">Address 2</label>
                                    <input class="form-control" placeholder="Enter billing address 2" type="text" name="billing_address2" value="{{old('billing_address2', $customer->billing_address2)}}" id="customer_billing_address2" tabindex="39">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_billing_fax">Fax</label>
                                    <input class="form-control phoneMask" placeholder="Enter billing fax number" type="text" name="billing_fax" value="{{old('billing_fax', $customer->billing_fax)}}" id="customer_billing_fax" tabindex="46">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_billing_city">*City</label>
                                    <input class="form-control requiredInputCustomer" placeholder="Enter billing city" type="text" name="billing_city" value="{{old('billing_city', $customer->billing_city)}}" id="customer_billing_city" tabindex="40">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">*State/Province</label><br>
                                    <select name="billing_state" id="customer_billing_state" class="selectpicker" required="true" data-live-search="true">
                                        <option disabled selected value>Select State/Province</option>
                                        <option @if($customer->billing_state == 'AL') selected @endif value="AL">AL (Alabama)</option>
                                        <option @if($customer->billing_state == 'AK') selected @endif value="AK">AK (Alaska)</option>
                                        <option @if($customer->billing_state == 'AZ') selected @endif value="AZ">AZ (Arizona)</option>
                                        <option @if($customer->billing_state == 'AR') selected @endif value="AR">AR (Arkansas)</option>
                                        <option @if($customer->billing_state == 'CA') selected @endif value="CA">CA (California)</option>
                                        <option @if($customer->billing_state == 'CO') selected @endif value="CO">CO (Colorado)</option>
                                        <option @if($customer->billing_state == 'CT') selected @endif value="CT">CT (Connecticut)</option>
                                        <option @if($customer->billing_state == 'DE') selected @endif value="DE">DE (Delaware)</option>
                                        <option @if($customer->billing_state == 'DC') selected @endif value="DC">DC (District of Columbia)</option>
                                        <option @if($customer->billing_state == 'FL') selected @endif value="FL">FL (Florida)</option>
                                        <option @if($customer->billing_state == 'GA') selected @endif value="GA">GA (Georgia)</option>
                                        <option @if($customer->billing_state == 'HI') selected @endif value="HI">HI (Hawaii)</option>
                                        <option @if($customer->billing_state == 'ID') selected @endif value="ID">ID (Idaho)</option>
                                        <option @if($customer->billing_state == 'IL') selected @endif value="IL">IL (Illinois)</option>
                                        <option @if($customer->billing_state == 'IN') selected @endif value="IN">IN (Indiana)</option>
                                        <option @if($customer->billing_state == 'IA') selected @endif value="IA">IA (Iowa)</option>
                                        <option @if($customer->billing_state == 'KS') selected @endif value="KS">KS (Kansas)</option>
                                        <option @if($customer->billing_state == 'KY') selected @endif value="KY">KY (Kentucky)</option>
                                        <option @if($customer->billing_state == 'LA') selected @endif value="LA">LA (Louisiana)</option>
                                        <option @if($customer->billing_state == 'ME') selected @endif value="ME">ME (Maine)</option>
                                        <option @if($customer->billing_state == 'MD') selected @endif value="MD">MD (Maryland)</option>
                                        <option @if($customer->billing_state == 'MA') selected @endif value="MA">MA (Massachusetts)</option>
                                        <option @if($customer->billing_state == 'MI') selected @endif value="MI">MI (Michigan)</option>
                                        <option @if($customer->billing_state == 'MN') selected @endif value="MN">MN (Minnesota)</option>
                                        <option @if($customer->billing_state == 'MS') selected @endif value="MS">MS (Mississippi)</option>
                                        <option @if($customer->billing_state == 'MO') selected @endif value="MO">MO (Missouri)</option>
                                        <option @if($customer->billing_state == 'MT') selected @endif value="MT">MT (Montana)</option>
                                        <option @if($customer->billing_state == 'NE') selected @endif value="NE">NE (Nebraska)</option>
                                        <option @if($customer->billing_state == 'NV') selected @endif value="NV">NV (Nevada)</option>
                                        <option @if($customer->billing_state == 'NH') selected @endif value="NH">NH (New Hampshire)</option>
                                        <option @if($customer->billing_state == 'NJ') selected @endif value="NJ">NJ (New Jersey)</option>
                                        <option @if($customer->billing_state == 'NM') selected @endif value="NM">NM (New Mexico)</option>
                                        <option @if($customer->billing_state == 'NY') selected @endif value="NY">NY (New York)</option>
                                        <option @if($customer->billing_state == 'NC') selected @endif value="NC">NC (North Carolina)</option>
                                        <option @if($customer->billing_state == 'ND') selected @endif value="ND">ND (North Dakota)</option>
                                        <option @if($customer->billing_state == 'OH') selected @endif value="OH">OH (Ohio)</option>
                                        <option @if($customer->billing_state == 'OK') selected @endif value="OK">OK (Oklahoma)</option>
                                        <option @if($customer->billing_state == 'OR') selected @endif value="OR">OR (Oregon)</option>
                                        <option @if($customer->billing_state == 'PA') selected @endif value="PA">PA (Pennsylvania)</option>
                                        <option @if($customer->billing_state == 'PR') selected @endif value="PR">PR (Puerto Rico)</option>
                                        <option @if($customer->billing_state == 'RI') selected @endif value="RI">RI (Rhode Island)</option>
                                        <option @if($customer->billing_state == 'SC') selected @endif value="SC">SC (South Carolina)</option>
                                        <option @if($customer->billing_state == 'SD') selected @endif value="SD">SD (South Dakota)</option>
                                        <option @if($customer->billing_state == 'TN') selected @endif value="TN">TN (Tennessee)</option>
                                        <option @if($customer->billing_state == 'TX') selected @endif value="TX">TX (Texas)</option>
                                        <option @if($customer->billing_state == 'UT') selected @endif value="UT">UT (Utah)</option>
                                        <option @if($customer->billing_state == 'VT') selected @endif value="VT">VT (Vermont)</option>
                                        <option @if($customer->billing_state == 'VA') selected @endif value="VA">VA (Virginia)</option>
                                        <option @if($customer->billing_state == 'WA') selected @endif value="WA">WA (Washington)</option>
                                        <option @if($customer->billing_state == 'WV') selected @endif value="WV">WV (West Virginia)</option>
                                        <option @if($customer->billing_state == 'WI') selected @endif value="WI">WI (Wisconsin)</option>
                                        <option @if($customer->billing_state == 'WY') selected @endif value="WY">WY (Wyoming)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="customer_billing_zip_code">*Zip Code</label>
                                    <input class="form-control requiredInputCustomer" placeholder="Enter billing zip code" type="text" name="billing_zip_code" value="{{old('billing_zip_code', $customer->billing_zip_code)}}" id="customer_billing_zip_code" tabindex="43">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Customer</button>
                </div>
            </div>
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
                                                @include('helpers.document-table', ['model' => $customer])
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
    @include('helpers.document-create-modal', ['model' => $customer, 'inputName' => 'customer_id', 'loads' => $customer->loads])
    @include('helpers.document-edit-modal', ['model' => $customer, 'inputName' => 'customer_id', 'loads' => $customer->loads])
@endsection
