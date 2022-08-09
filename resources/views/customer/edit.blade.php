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
                                    <input required class="form-control" placeholder="Please Enter State/Province" type="text" name="state" value="{{old('state', $customer->state)}}" id="customer_state" tabindex="27">
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
                                    <input required class="form-control" placeholder="Please Enter State/Province" type="text" name="billing_state" value="{{old('billing_state', $customer->billing_state)}}" id="customer_billing_state" tabindex="27">
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
