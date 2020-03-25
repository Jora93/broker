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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card col-md-6">
{{--                    <div class="card-header">Create Customer</div>--}}

{{--                    <div class="card-body">--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <form method="POST" action="{{route('customers.store')}}">--}}
{{--                            @csrf--}}
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
{{--                                <label>Address</label>--}}
{{--                                <input name="address" type="text" class="form-control" placeholder="Address" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Product</label>--}}
{{--                                <input name="product" type="text" class="form-control" placeholder="Product" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Currency</label>--}}
{{--                                <input name="currency" type="text" class="form-control" placeholder="Currency" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Credit Limit</label>--}}
{{--                                <input name="creditLimit" type="number" class="form-control" placeholder="Credit Limit" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-check" style="padding: 0 0 21px 0;">--}}
{{--                                <input name="smartWayCarriersPreferred" type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--                                <label class="form-check-label" for="exampleCheck1" style="padding-left: 20px;">Smart Way Carriers Preferred</label>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Billing Company</label>--}}
{{--                                <input name="billingCompany" type="text" class="form-control" placeholder="Billing Company Name" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Billing Phone</label>--}}
{{--                                <input name="billingPhone" type="text" class="form-control" placeholder="Billing Phone Number" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Billing Address</label>--}}
{{--                                <input name="billingAddress" type="text" class="form-control" placeholder="Billing Address" required>--}}
{{--                            </div>--}}
{{--                            <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>

    {{--                //////////////////////////////////////////////////////////////////////////////////////////--}}

    <div class="row customer-create col-sm-12">
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
                                <select class="form-control" name="customer[status]" id="customer_status" tabindex="1"><option value="Active">Active</option>
                                    <option value="Do Not Use">Do Not Use</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Prospect">Prospect</option></select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">

                                <label class="control-label" for="customer_rep_user_id">Rep</label>
                                <p>Assign Representative from user's profile</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_company">*Company</label>
                                <input class="form-control requiredInputCustomer focusOnLoad" placeholder="Enter company" required="required" type="text" name="customer[company]" id="customer_company" tabindex="2">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_phone">*Phone</label>
                                <input class="form-control requiredInputCustomer phoneMask" placeholder="Enter phone" required="required" type="text" name="customer[phone]" id="customer_phone" tabindex="24">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_address1">*Address 1</label>
                                <input class="form-control requiredInputCustomer" placeholder="Enter address" required="required" type="text" name="customer[address1]" id="customer_address1" tabindex="3">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_phone_extension">Phone Extension</label>
                                <input class="form-control" placeholder="Enter phone extension" type="text" name="customer[phone_extension]" id="customer_phone_extension" tabindex="25">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_address2">Address 2</label>
                                <input class="form-control" placeholder="Enter address 2" type="text" name="customer[address2]" id="customer_address2" tabindex="4">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_fax">Fax</label>
                                <input class="form-control phoneMask" placeholder="Enter fax number" type="text" name="customer[fax]" id="customer_fax" tabindex="26">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_city">*City</label>
                                <input class="form-control requiredInputCustomer" placeholder="Enter city" required="required" type="text" name="customer[city]" id="customer_city" tabindex="5">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_email">Email</label>
                                <input class="form-control" placeholder="Enter email" type="email" name="customer[email]" id="customer_email" tabindex="27">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">*State/Province</label><br>
                                <select name="customer[state]" id="customer_state" class="selectpicker" required="true" data-live-search="true">
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
                                <label class="control-label" for="customer_website">Website</label>
                                <input class="form-control" placeholder="Enter website" type="text" name="customer[website]" id="customer_website" tabindex="28">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_zip_code">*Zip Code</label>
                                <input class="form-control requiredInputCustomer" placeholder="Enter zip code" required="required" type="text" name="customer[zip_code]" id="customer_zip_code" tabindex="8">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_product">*Product</label>
                                <input class="form-control requiredInputCustomer" placeholder="Enter customer's product" required="required" type="text" name="customer[product]" id="customer_product" tabindex="29">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_credit_limit_formatted">Credit Limit</label><span class="formInfo glyphicon glyphicon-info-sign" title="Users will receive a warning when customer exceeds this Credit Limit."></span>
                                <input class="form-control" type="text" value="$5,000.00" name="customer[credit_limit_formatted]" id="customer_credit_limit_formatted" tabindex="9">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_currency">Currency</label><span class="formInfo glyphicon glyphicon-info-sign" title="Select the default currency type to be used when calculating invoices and payments."></span>
                                <select class="form-control" name="customer[currency]" id="customer_currency" tabindex="30"><option value="">Select Currency</option>
                                    <option selected="selected" value="USD">USD</option>
                                    <option value="CAD">CAD</option>
                                    <option value="MXN">MXN</option></select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addPaymentTermTerm" class="control-label">Payment Term</label>
                                <select class="form-control" name="customer[payment_term_id]" id="customer_payment_term_id" tabindex="10"><option value="">Select Payment Term</option></select>
                            </div>
                        </div>

                        <div class="col-md-6" style="padding-top: 15px;">
                            <div class="checkbox">
                                <label>
                                    <input name="customer[smart_way_carriers_preferred]" type="hidden" value="0" tabindex="31"><input type="checkbox" value="1" name="customer[smart_way_carriers_preferred]" id="customer_smart_way_carriers_preferred" tabindex="32"> SmartWay carriers preferred
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="customer[require_po_to_invoice]" type="hidden" value="0" tabindex="33"><input class="editMainField" type="checkbox" value="1" name="customer[require_po_to_invoice]" id="customer_require_po_to_invoice" tabindex="34"> Require PO # to Invoice
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="customer[require_pod_to_invoice]" type="hidden" value="0" tabindex="35"><input class="editMainField" type="checkbox" value="1" name="customer[require_pod_to_invoice]" id="customer_require_pod_to_invoice" tabindex="36"> Require Proof of Delivery to Invoice
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="customer_confirmation_note">Confirmation Note</label>
                                <textarea class="form-control editMainField" placeholder="Enter a confirmation note for this customer" name="customer[confirmation_note]" id="customer_confirmation_note" tabindex="11"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="customer_flag">Flag</label>
                                <span class="formInfo glyphicon glyphicon-info-sign" data-toggle="tooltip" title="A flag will be displayed to users when adding this customer to a load"></span>
                                <span><input name="customer[flagged]" type="hidden" value="0" tabindex="12"><input class="pull-left" style="margin-right:5px;" type="checkbox" value="1" name="customer[flagged]" id="customer_flagged" tabindex="13"></span>
                                <textarea class="form-control" rows="4" placeholder="Enter flag" name="customer[flag]" id="customer_flag" tabindex="14"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="customerNote" class="control-label">Note</label>
                                <textarea class="form-control" id="customerNote" name="customer_note" placeholder="Enter a note about this customer" rows="4" tabindex="15"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Documents_to_be_added_when_emailing_invoice">Documents to be added when emailing invoice</label>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="customer[email_docs_with_invoice][]" id="customer_email_docs_with_invoice_" value="Proof of Delivery" class="editMainField" tabindex="16"> Proof of Delivery</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="customer[email_docs_with_invoice][]" id="customer_email_docs_with_invoice_" value="Rate Quote" class="editMainField" tabindex="17"> Rate Quote</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="customer[email_docs_with_invoice][]" id="customer_email_docs_with_invoice_" value="Customer Confirmation" class="editMainField" tabindex="18"> Customer Confirmation</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="customer[email_docs_with_invoice][]" id="customer_email_docs_with_invoice_" value="Customer Agreement" class="editMainField" tabindex="19"> Customer Agreement</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="customer[email_docs_with_invoice][]" id="customer_email_docs_with_invoice_" value="Claim" class="editMainField" tabindex="20"> Claim</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="customer[email_docs_with_invoice][]" id="customer_email_docs_with_invoice_" value="Weight Ticket" class="editMainField" tabindex="21"> Weight Ticket</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="customer[email_docs_with_invoice][]" id="customer_email_docs_with_invoice_" value="Receipt" class="editMainField" tabindex="22"> Receipt</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="customer[email_docs_with_invoice][]" id="customer_email_docs_with_invoice_" value="Other" class="editMainField" tabindex="23"> Other</label>
                                </div>
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
                                <input class="form-control requiredInputCustomer" placeholder="Enter billing company" type="text" name="customer[billing_company]" id="customer_billing_company" tabindex="37">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_billing_phone">*Phone</label>
                                <input class="form-control requiredInputCustomer phoneMask" placeholder="Enter billing phone" type="text" name="customer[billing_phone]" id="customer_billing_phone" tabindex="44">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_billing_address1">*Address 1</label>
                                <input class="form-control requiredInputCustomer" placeholder="Enter billing address" type="text" name="customer[billing_address1]" id="customer_billing_address1" tabindex="38">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_billing_phone_extension">Phone Extension</label>
                                <input class="form-control" placeholder="Enter billing phone extension" type="text" name="customer[billing_phone_extension]" id="customer_billing_phone_extension" tabindex="45">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_billing_address2">Address 2</label>
                                <input class="form-control" placeholder="Enter billing address 2" type="text" name="customer[billing_address2]" id="customer_billing_address2" tabindex="39">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_billing_fax">Fax</label>
                                <input class="form-control phoneMask" placeholder="Enter billing fax number" type="text" name="customer[billing_fax]" id="customer_billing_fax" tabindex="46">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_billing_city">*City</label>
                                <input class="form-control requiredInputCustomer" placeholder="Enter billing city" type="text" name="customer[billing_city]" id="customer_billing_city" tabindex="40">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="customer_default_pay_day">Past Due In Days</label>
                                <input min="0" class="form-control" placeholder="Enter no of day" type="number" name="customer[default_pay_day]" id="customer_default_pay_day" tabindex="47">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">*State/Province</label><br>
                                <select name="customer[billing_state]" id="customer_billing_state" class="selectpicker" required="true" data-live-search="true">
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
                                <input class="form-control requiredInputCustomer" placeholder="Enter billing zip code" type="text" name="customer[billing_zip_code]" id="customer_billing_zip_code" tabindex="43">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Primary Contact -->
            <div class="entityPanel entityFillPanel customerPanel">
                <div class="entityPanelHeading">
                    <div class="entityPanelTitle">Primary Contact</div>
                </div>
                <div class="entityPanelBody tabIndexContainer">
                    <div class="row"><div class="col-md-12"><p>More contacts can be added once this customer is created.</p></div></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div id="primaryContactNameGroup" class="form-group">
                                <label for="primaryContactName" class="control-label">Name</label>
                                <input type="text" class="form-control focusOnShow" id="primaryContactName" name="primary_contact_name" placeholder="Enter contact name" value="" tabindex="48">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="primaryContactName" class="control-label">Title</label>
                                <input type="text" class="form-control contactOptional" id="primaryContactTitle" name="primary_contact_title" placeholder="Enter contact title" value="" tabindex="56">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="primaryContactAddress1" class="control-label">Address 1</label>
                                <input type="text" class="form-control contactOptional" id="primaryContactAddress1" name="primary_contact_address1" placeholder="Enter contact address" value="" tabindex="49">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="primaryContactDepartment" class="control-label">Department</label>
                                <input type="text" class="form-control contactOptional" id="primaryContactDepartment" name="primary_contact_department" placeholder="Enter contact department" value="" tabindex="57">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="primaryContactAddress2" class="control-label">Address 2</label>
                                <input type="text" class="form-control contactOptional" id="primaryContactAddress2" name="primary_contact_address2" placeholder="Enter contact address" value="" tabindex="50">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="primaryContactPhone" class="control-label">Phone</label>
                                <input type="text" class="form-control contactOptional phoneMask" id="primaryContactPhone" name="primary_contact_phone" placeholder="Enter contact phone" value="" tabindex="58">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="primaryContactCity" class="control-label">City</label>
                                <input type="text" class="form-control contactOptional" id="primaryContactCity" name="primary_contact_city" placeholder="Enter contact city" value="" tabindex="51">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="primaryContactPhoneExtension" class="control-label">Phone Extension</label>
                                <input type="text" class="form-control contactOptional" id="primaryContactPhoneExtension" name="primary_contact_phone_extension" placeholder="Enter contact phone extension" value="" tabindex="59">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">*State/Province</label><br>
                                <select name="primary_contact_state" id="primaryContactState" class="selectpicker" required="true" data-live-search="true">
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
                                <label for="primaryContactCellPhone" class="control-label">Cell Phone</label>
                                <input type="text" class="form-control contactOptional phoneMask" id="primaryContactCellPhone" name="primary_contact_cell_phone" placeholder="Enter contact cell phone" value="" tabindex="60">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="primaryContactCity" class="control-label">Zip</label>
                                <input type="text" class="form-control contactOptional" id="primaryContactZip" name="primary_contact_zip_code" placeholder="Enter contact zip" value="" tabindex="54">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="primaryContactFax" class="control-label">Fax</label>
                                <input type="text" class="form-control contactOptional phoneMask" id="primaryContactFax" name="primary_contact_fax" placeholder="Enter contact fax number" value="" tabindex="61">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="primaryContactEmail" class="control-label">Email</label>
                                <input type="email" class="form-control contactOptional" id="primaryContactEmail" name="primary_contact_email" placeholder="Enter contact email" value="" tabindex="55">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row customer-create col-sm-12">
        <div class="col-md-12">
            <div class="entityPanel entityFillPanel customerPanel">
                <div class="entityPanelHeading">
                    <div class="entityPanelTitle">
                        <div class="row">
                            <div class="col-md-6">Default Location</div>
                            <div class="col-md-6 panelTitleLinkContainer"><a class="actionLink" href="javascript:void(0)" onclick="copyCompanyInfoToDefaultLocation()"><span class="glyphicon glyphicon-copy"></span> Copy from Company Information</a> <a class="actionLink" href="javascript:void(0)" onclick="copyBillingInfoToDefaultLocation()"><span class="glyphicon glyphicon-copy"></span> Copy from Billing Information</a></div>
                        </div>
                    </div>
                </div>
                <div class="entityPanelBody tabIndexContainer">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="defaultLocationCompany" class="control-label">Company</label>
                                <input type="text" class="form-control defaultLocationValue defaultLocationRequired" id="defaultLocationCompany" name="default_location_company" placeholder="Enter location company name" value="" tabindex="62">
                            </div>

                            <div class="form-group">
                                <label for="defaultLocationAddress1" class="control-label">Address 1</label>
                                <input type="text" class="form-control defaultLocationValue  defaultLocationRequired" id="defaultLocationAddress1" name="default_location_address1" placeholder="Enter the location's address" value="" tabindex="63">
                            </div>

                            <div class="form-group">
                                <label for="defaultLocationAddress2" class="control-label">Address 2</label>
                                <input type="text" class="form-control defaultLocationValue" id="defaultLocationAddress2" name="default_location_address2" placeholder="Enter the location's address" value="" tabindex="64">
                            </div>

                            <div class="form-group">
                                <label for="defaultLocationCity" class="control-label">City</label>
                                <input type="text" class="form-control defaultLocationValue  defaultLocationRequired" id="defaultLocationCity" name="default_location_city" placeholder="Enter the location's city" value="" tabindex="65">
                            </div>

                            <div class="form-group">
                                <label class="control-label">*State/Province</label><br>
                                <select name="default_location_state" id="defaultLocationState" class="selectpicker" required="true" data-live-search="true">
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

                            <div class="form-group">
                                <label for="defaultLocationZip" class="control-label">Zip</label>
                                <input type="text" class="form-control defaultLocationValue defaultLocationRequired" id="defaultLocationZip" name="default_location_zip_code" placeholder="Enter the location's zip code" value="" tabindex="68">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="defaultLocationPhone" class="control-label">Phone</label>
                                <input type="text" class="form-control defaultLocationValue defaultLocationRequired phoneMask" id="defaultLocationPhone" name="default_location_phone" placeholder="Enter location phone" value="" tabindex="71">
                            </div>
                            <div class="form-group">
                                <label for="defaultLocationPhoneExtension" class="control-label">Phone Extension</label>
                                <input type="text" class="form-control defaultLocationValue" id="defaultLocationPhoneExtension" name="default_location_phone_extension" placeholder="Enter location phone extension" value="" tabindex="72">
                            </div>
                            <div class="form-group">
                                <label for="defaultLocationCellPhone" class="control-label">Cell Phone</label>
                                <input type="text" class="form-control defaultLocationValue phoneMask" id="defaultLocationCellPhone" name="default_location_cell_phone" placeholder="Enter location cell phone" value="" tabindex="73">
                            </div>
                            <div class="form-group">
                                <label for="defaultLocationFax" class="control-label">Fax</label>
                                <input type="text" class="form-control defaultLocationValue phoneMask" id="defaultLocationFax" name="default_location_fax" placeholder="Enter location fax number" value="" tabindex="74">
                            </div>
                            <div class="form-group">
                                <label for="defaultLocationEmail" class="control-label">Email</label>
                                <input type="email" class="form-control defaultLocationValue" id="defaultLocationEmail" name="default_location_email" placeholder="Enter location email" value="" tabindex="75">
                            </div>
                            <div class="row" style="margin-top: 35px;">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="defaultLocationShipper" name="default_location_shipper" tabindex="76"> Shipper
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="defaultLocationConsignee" name="default_location_consignee" tabindex="77"> Consignee
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="defaultLocationNote">Note</label>
                                <textarea class="form-control defaultLocationValue" id="defaultLocationNote" name="default_location_note" style="height: 160px;" placeholder="Enter a note about this location" tabindex="70"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
