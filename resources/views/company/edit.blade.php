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
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    @endif
    <div class="container" style="max-width: 100%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Company Profile</span>
                    </div>
                    <div class="col-md-9">
                        <form method="POST"  enctype="multipart/form-data" action="{{url(\App::make('currentCompany')->id.'/companies/'.$company->id)}}">
                            @method('PATCH')
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyInput">Name *</label>
                                    <input required="required" type="text" class="form-control focusOnLoad" name="name" placeholder="Enter the name of the company" value="{{$company->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyInput">MC# *</label>
                                    <input required="required" type="text" class="form-control focusOnLoad" name="mc_number" placeholder="Enter the MC# of the company" value="{{$company->mc_number}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyInput">Phone 1 *</label>
                                    <input required="required" type="text" class="form-control focusOnLoad" name="phone_one" placeholder="Enter the phone# of the company" value="{{$company->phone_one}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyInput">address *</label>
                                    <input type="text" class="form-control focusOnLoad" name="address" placeholder="Enter the address of the company" value="{{$company->address}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="zipCodeInput">*Postal Code</label>
                                    <input type="text" class="form-control" name="zip_code" placeholder="Enter the  postal code" value="{{$company->zip_code}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cityInput">*City</label>
                                    <input type="text" class="form-control" id="cityInput" name="city" placeholder="Enter the  city" value="{{$company->city}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyInput">Invoice last Number *</label>
                                    <input type="text" class="form-control focusOnLoad" name="invoice_last_number" value="{{$company->invoice_last_number}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyInput">Load last Number *</label>
                                    <input type="text" class="form-control focusOnLoad" name="load_last_number" value="{{$company->load_last_number}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyInput">Invite Carrier Link</label>
                                    <input type="text" class="form-control focusOnLoad" disabled name="" value="{{env('APP_URL')}}/invite-carrier/{{$company->invite_alias}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Carrier Logo</label>
                                <input name="logo" class="form-control" style="padding: 3px" type="file" accept="image/*">
                            </div>
                            <br>
                            <br>
                            <div id="stateInputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="accountState">*State</label>
                                    <select name="state" class="consignee_delivery_state selectpickeraa" required="true" data-live-search="true">
                                        <option disabled selected value>Select State/Province</option>
                                        <option @if($company->state  === 'AL') selected @endif value="AL">AL (Alabama)</option>
                                        <option @if($company->state  === 'AK') selected @endif value="AK">AK (Alaska)</option>
                                        <option @if($company->state  === 'AZ') selected @endif value="AZ">AZ (Arizona)</option>
                                        <option @if($company->state  === 'AR') selected @endif value="AR">AR (Arkansas)</option>
                                        <option @if($company->state  === 'CA') selected @endif value="CA">CA (California)</option>
                                        <option @if($company->state  === 'CO') selected @endif value="CO">CO (Colorado)</option>
                                        <option @if($company->state  === 'CT') selected @endif value="CT">CT (Connecticut)</option>
                                        <option @if($company->state  === 'DE') selected @endif value="DE">DE (Delaware)</option>
                                        <option @if($company->state  === 'DC') selected @endif value="DC">DC (District of Columbia)</option>
                                        <option @if($company->state  === 'FL') selected @endif value="FL">FL (Florida)</option>
                                        <option @if($company->state  === 'GA') selected @endif value="GA">GA (Georgia)</option>
                                        <option @if($company->state  === 'HI') selected @endif value="HI">HI (Hawaii)</option>
                                        <option @if($company->state  === 'ID') selected @endif value="ID">ID (Idaho)</option>
                                        <option @if($company->state  === 'IL') selected @endif value="IL">IL (Illinois)</option>
                                        <option @if($company->state  === 'IN') selected @endif value="IN">IN (Indiana)</option>
                                        <option @if($company->state  === 'IA') selected @endif value="IA">IA (Iowa)</option>
                                        <option @if($company->state  === 'KS') selected @endif value="KS">KS (Kansas)</option>
                                        <option @if($company->state  === 'KY') selected @endif value="KY">KY (Kentucky)</option>
                                        <option @if($company->state  === 'LA') selected @endif value="LA">LA (Louisiana)</option>
                                        <option @if($company->state  === 'ME') selected @endif value="ME">ME (Maine)</option>
                                        <option @if($company->state  === 'MD') selected @endif value="MD">MD (Maryland)</option>
                                        <option @if($company->state  === 'MA') selected @endif value="MA">MA (Massachusetts)</option>
                                        <option @if($company->state  === 'MI') selected @endif value="MI">MI (Michigan)</option>
                                        <option @if($company->state  === 'MN') selected @endif value="MN">MN (Minnesota)</option>
                                        <option @if($company->state  === 'MS') selected @endif value="MS">MS (Mississippi)</option>
                                        <option @if($company->state  === 'MO') selected @endif value="MO">MO (Missouri)</option>
                                        <option @if($company->state  === 'MT') selected @endif value="MT">MT (Montana)</option>
                                        <option @if($company->state  === 'NE') selected @endif value="NE">NE (Nebraska)</option>
                                        <option @if($company->state  === 'NV') selected @endif value="NV">NV (Nevada)</option>
                                        <option @if($company->state  === 'NH') selected @endif value="NH">NH (New Hampshire)</option>
                                        <option @if($company->state  === 'NJ') selected @endif value="NJ">NJ (New Jersey)</option>
                                        <option @if($company->state  === 'NM') selected @endif value="NM">NM (New Mexico)</option>
                                        <option @if($company->state  === 'NY') selected @endif value="NY">NY (New York)</option>
                                        <option @if($company->state  === 'NC') selected @endif value="NC">NC (North Carolina)</option>
                                        <option @if($company->state  === 'ND') selected @endif value="ND">ND (North Dakota)</option>
                                        <option @if($company->state  === 'OH') selected @endif value="OH">OH (Ohio)</option>
                                        <option @if($company->state  === 'OK') selected @endif value="OK">OK (Oklahoma)</option>
                                        <option @if($company->state  === 'OR') selected @endif value="OR">OR (Oregon)</option>
                                        <option @if($company->state  === 'PA') selected @endif value="PA">PA (Pennsylvania)</option>
                                        <option @if($company->state  === 'PR') selected @endif value="PR">PR (Puerto Rico)</option>
                                        <option @if($company->state  === 'RI') selected @endif value="RI">RI (Rhode Island)</option>
                                        <option @if($company->state  === 'SC') selected @endif value="SC">SC (South Carolina)</option>
                                        <option @if($company->state  === 'SD') selected @endif value="SD">SD (South Dakota)</option>
                                        <option @if($company->state  === 'TN') selected @endif value="TN">TN (Tennessee)</option>
                                        <option @if($company->state  === 'TX') selected @endif value="TX">TX (Texas)</option>
                                        <option @if($company->state  === 'UT') selected @endif value="UT">UT (Utah)</option>
                                        <option @if($company->state  === 'VT') selected @endif value="VT">VT (Vermont)</option>
                                        <option @if($company->state  === 'VA') selected @endif value="VA">VA (Virginia)</option>
                                        <option @if($company->state  === 'WA') selected @endif value="WA">WA (Washington)</option>
                                        <option @if($company->state  === 'WV') selected @endif value="WV">WV (West Virginia)</option>
                                        <option @if($company->state  === 'WI') selected @endif value="WI">WI (Wisconsin)</option>
                                        <option @if($company->state  === 'WY') selected @endif value="WY">WY (Wyoming)</option>
                                    </select>
                                </div>
                            </div>

                            <hr style="clear: both;">
                            <button class="btn btn-success" type="submit">
                                <i class="glyphicon glyphicon-floppy-saved"></i> &nbsp;Save Changes
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
