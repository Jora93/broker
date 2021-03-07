@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 100%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Company Profile</span>
                    </div>
                    <div class="col-md-9">
                        <form class="edit_account" id="editCompanyProfileForm" name="account_edit" enctype="multipart/form-data" action="{{url(\Request::route('company_id').'/companies.update')}}">
                            <div class="col-md-6">
                                <div id="companyInputGroup" class="form-group">
                                    <label for="companyInput">*Company</label>
                                    <input type="text" class="form-control focusOnLoad" name="name" placeholder="Enter the name of the company" value="{{old('name')}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div id="timeZoneSelectGroup" class="form-group">
                                    <label for="timeZoneSelect">*Time Zone</label>
                                    <select name="time_zone" class="form-control chosen chosen-select" tabindex="-1" >
                                        <option value="UTC" selected="">UTC +00:00</option>
                                        <option value="International Date Line West">International Date Line West -12:00</option>
                                        <option value="American Samoa">American Samoa -11:00</option>
                                        <option value="Midway Island">Midway Island -11:00</option>
                                        <option value="Hawaii">Hawaii -10:00</option>
                                        <option value="Alaska">Alaska -09:00</option>
                                        <option value="Pacific Time (US &amp; Canada)">Pacific Time (US &amp; Canada) -08:00</option>
                                        <option value="Tijuana">Tijuana -08:00</option>
                                        <option value="Arizona">Arizona -07:00</option>
                                        <option value="Chihuahua">Chihuahua -07:00</option>
                                        <option value="Mazatlan">Mazatlan -07:00</option>
                                        <option value="Mountain Time (US &amp; Canada)">Mountain Time (US &amp; Canada) -07:00</option>
                                        <option value="Central America">Central America -06:00</option>
                                        <option value="Central Time (US &amp; Canada)">Central Time (US &amp; Canada) -06:00</option>
                                        <option value="Guadalajara">Guadalajara -06:00</option>
                                        <option value="Mexico City">Mexico City -06:00</option>
                                        <option value="Monterrey">Monterrey -06:00</option>
                                        <option value="Saskatchewan">Saskatchewan -06:00</option>
                                        <option value="Bogota">Bogota -05:00</option>
                                        <option value="Eastern Time (US &amp; Canada)">Eastern Time (US &amp; Canada) -05:00</option>
                                        <option value="Indiana (East)">Indiana (East) -05:00</option>
                                        <option value="Lima">Lima -05:00</option>
                                        <option value="Quito">Quito -05:00</option>
                                        <option value="Atlantic Time (Canada)">Atlantic Time (Canada) -04:00</option>
                                        <option value="Caracas">Caracas -04:00</option>
                                        <option value="Georgetown">Georgetown -04:00</option>
                                        <option value="La Paz">La Paz -04:00</option>
                                        <option value="Puerto Rico">Puerto Rico -04:00</option>
                                        <option value="Santiago">Santiago -04:00</option>
                                        <option value="Newfoundland">Newfoundland -03:30</option>
                                        <option value="Brasilia">Brasilia -03:00</option>
                                        <option value="Buenos Aires">Buenos Aires -03:00</option>
                                        <option value="Greenland">Greenland -03:00</option>
                                        <option value="Montevideo">Montevideo -03:00</option>
                                        <option value="Mid-Atlantic">Mid-Atlantic -02:00</option>
                                        <option value="Azores">Azores -01:00</option>
                                        <option value="Cape Verde Is.">Cape Verde Is. -01:00</option>
                                        <option value="Edinburgh">Edinburgh +00:00</option>
                                        <option value="Lisbon">Lisbon +00:00</option>
                                        <option value="London">London +00:00</option>
                                        <option value="Monrovia">Monrovia +00:00</option>
                                        <option value="Amsterdam">Amsterdam +01:00</option>
                                        <option value="Belgrade">Belgrade +01:00</option>
                                        <option value="Berlin">Berlin +01:00</option>
                                        <option value="Bern">Bern +01:00</option>
                                        <option value="Bratislava">Bratislava +01:00</option>
                                        <option value="Brussels">Brussels +01:00</option>
                                        <option value="Budapest">Budapest +01:00</option>
                                        <option value="Casablanca">Casablanca +01:00</option>
                                        <option value="Copenhagen">Copenhagen +01:00</option>
                                        <option value="Dublin">Dublin +01:00</option>
                                        <option value="Ljubljana">Ljubljana +01:00</option>
                                        <option value="Madrid">Madrid +01:00</option>
                                        <option value="Paris">Paris +01:00</option>
                                        <option value="Prague">Prague +01:00</option>
                                        <option value="Rome">Rome +01:00</option>
                                        <option value="Sarajevo">Sarajevo +01:00</option>
                                        <option value="Skopje">Skopje +01:00</option>
                                        <option value="Stockholm">Stockholm +01:00</option>
                                        <option value="Vienna">Vienna +01:00</option>
                                        <option value="Warsaw">Warsaw +01:00</option>
                                        <option value="West Central Africa">West Central Africa +01:00</option>
                                        <option value="Zagreb">Zagreb +01:00</option>
                                        <option value="Zurich">Zurich +01:00</option>
                                        <option value="Athens">Athens +02:00</option>
                                        <option value="Bucharest">Bucharest +02:00</option>
                                        <option value="Cairo">Cairo +02:00</option>
                                        <option value="Harare">Harare +02:00</option>
                                        <option value="Helsinki">Helsinki +02:00</option>
                                        <option value="Jerusalem">Jerusalem +02:00</option>
                                        <option value="Kaliningrad">Kaliningrad +02:00</option>
                                        <option value="Kyiv">Kyiv +02:00</option>
                                        <option value="Pretoria">Pretoria +02:00</option>
                                        <option value="Riga">Riga +02:00</option>
                                        <option value="Sofia">Sofia +02:00</option>
                                        <option value="Tallinn">Tallinn +02:00</option>
                                        <option value="Vilnius">Vilnius +02:00</option>
                                        <option value="Baghdad">Baghdad +03:00</option>
                                        <option value="Istanbul">Istanbul +03:00</option>
                                        <option value="Kuwait">Kuwait +03:00</option>
                                        <option value="Minsk">Minsk +03:00</option>
                                        <option value="Moscow">Moscow +03:00</option>
                                        <option value="Nairobi">Nairobi +03:00</option>
                                        <option value="Riyadh">Riyadh +03:00</option>
                                        <option value="St. Petersburg">St. Petersburg +03:00</option>
                                        <option value="Volgograd">Volgograd +03:00</option>
                                        <option value="Tehran">Tehran +03:30</option>
                                        <option value="Abu Dhabi">Abu Dhabi +04:00</option>
                                        <option value="Baku">Baku +04:00</option>
                                        <option value="Muscat">Muscat +04:00</option>
                                        <option value="Samara">Samara +04:00</option>
                                        <option value="Tbilisi">Tbilisi +04:00</option>
                                        <option value="Yerevan">Yerevan +04:00</option>
                                        <option value="Kabul">Kabul +04:30</option>
                                        <option value="Ekaterinburg">Ekaterinburg +05:00</option>
                                        <option value="Islamabad">Islamabad +05:00</option>
                                        <option value="Karachi">Karachi +05:00</option>
                                        <option value="Tashkent">Tashkent +05:00</option>
                                        <option value="Chennai">Chennai +05:30</option>
                                        <option value="Kolkata">Kolkata +05:30</option>
                                        <option value="Mumbai">Mumbai +05:30</option>
                                        <option value="New Delhi">New Delhi +05:30</option>
                                        <option value="Sri Jayawardenepura">Sri Jayawardenepura +05:30</option>
                                        <option value="Kathmandu">Kathmandu +05:45</option>
                                        <option value="Almaty">Almaty +06:00</option>
                                        <option value="Astana">Astana +06:00</option>
                                        <option value="Dhaka">Dhaka +06:00</option>
                                        <option value="Urumqi">Urumqi +06:00</option>
                                        <option value="Rangoon">Rangoon +06:30</option>
                                        <option value="Bangkok">Bangkok +07:00</option>
                                        <option value="Hanoi">Hanoi +07:00</option>
                                        <option value="Jakarta">Jakarta +07:00</option>
                                        <option value="Krasnoyarsk">Krasnoyarsk +07:00</option>
                                        <option value="Novosibirsk">Novosibirsk +07:00</option>
                                        <option value="Beijing">Beijing +08:00</option>
                                        <option value="Chongqing">Chongqing +08:00</option>
                                        <option value="Hong Kong">Hong Kong +08:00</option>
                                        <option value="Irkutsk">Irkutsk +08:00</option>
                                        <option value="Kuala Lumpur">Kuala Lumpur +08:00</option>
                                        <option value="Perth">Perth +08:00</option>
                                        <option value="Singapore">Singapore +08:00</option>
                                        <option value="Taipei">Taipei +08:00</option>
                                        <option value="Ulaanbaatar">Ulaanbaatar +08:00</option>
                                        <option value="Osaka">Osaka +09:00</option>
                                        <option value="Sapporo">Sapporo +09:00</option>
                                        <option value="Seoul">Seoul +09:00</option>
                                        <option value="Tokyo">Tokyo +09:00</option>
                                        <option value="Yakutsk">Yakutsk +09:00</option>
                                        <option value="Adelaide">Adelaide +09:30</option>
                                        <option value="Darwin">Darwin +09:30</option>
                                        <option value="Brisbane">Brisbane +10:00</option>
                                        <option value="Canberra">Canberra +10:00</option>
                                        <option value="Guam">Guam +10:00</option>
                                        <option value="Hobart">Hobart +10:00</option>
                                        <option value="Melbourne">Melbourne +10:00</option>
                                        <option value="Port Moresby">Port Moresby +10:00</option>
                                        <option value="Sydney">Sydney +10:00</option>
                                        <option value="Vladivostok">Vladivostok +10:00</option>
                                        <option value="Magadan">Magadan +11:00</option>
                                        <option value="New Caledonia">New Caledonia +11:00</option>
                                        <option value="Solomon Is.">Solomon Is. +11:00</option>
                                        <option value="Srednekolymsk">Srednekolymsk +11:00</option>
                                        <option value="Auckland">Auckland +12:00</option>
                                        <option value="Fiji">Fiji +12:00</option>
                                        <option value="Kamchatka">Kamchatka +12:00</option>
                                        <option value="Marshall Is.">Marshall Is. +12:00</option>
                                        <option value="Wellington">Wellington +12:00</option>
                                        <option value="Chatham Is.">Chatham Is. +12:45</option>
                                        <option value="Nuku">Nuku'alofa +13:00</option>
                                        <option value="Samoa">Samoa +13:00</option>
                                        <option value="Tokelau Is.">Tokelau Is. +13:00</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div id="firstNameInputGroup" class="form-group">
                                    <label for="firstNameInput">*Contact First Name</label>
                                    <input type="text" class="form-control" id="firstNameInput" name="first_name" placeholder="Enter the first name of this company's contact" value="Eric">
                                </div>
                            </div>

                            <div id="lastNameInputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="lastNameInput">*Contact Last Name</label>
                                    <input type="text" class="form-control" id="lastNameInput" name="last_name" placeholder="Enter the last name of this company's contact" value="Greg">
                                </div>
                            </div>

                            <div id="address1InputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="address1Input">*Address 1</label>
                                    <input type="text" class="form-control" id="address1Input" name="address1" placeholder="Enter the company's address" value="1810 e sahara ave ste 701">
                                </div>
                            </div>

                            <div id="phone1InputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="phone1Input">*Primary Phone</label>
                                    <input type="text" class="form-control phoneMask" id="phone1Input" name="phone_one" placeholder="Enter the company's primary phone number" value="(702) 793-2221">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address2Input">Address 2</label>
                                    <input type="text" class="form-control" id="address2Input" name="address2" placeholder="Enter the company's address" value="">
                                </div>
                            </div>
                            <div id="phone1InputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="phone2Input">Secondary Phone</label>
                                    <input type="text" class="form-control phoneMask" id="phone2Input" name="phone_two" placeholder="Enter the company's secondary phone number" value="">
                                </div>
                            </div>

                            <div id="cityInputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="cityInput">*City</label>
                                    <input type="text" class="form-control" id="cityInput" name="city" placeholder="Enter the company's city" value="Las Vegas ">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tollFreePhoneInput">Toll Free Phone</label>
                                    <input type="text" class="form-control phoneMask" id="tollFreePhoneInput" name="toll_free_phone" placeholder="Enter the company's toll free phone number" value="">
                                </div>
                            </div>

                            <div id="stateInputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="accountState">*State</label>
                                    <select name="state" value="{{old('consignee_delivery_state')}}" class="consignee_delivery_state selectpickeraa" required="true" data-live-search="true">
                                        <option disabled selected value>Select State/Province</option>
                                        <option @if(old('shipper_state') === 'AL') selected @endif value="AL">AL (Alabama)</option>
                                        <option @if(old('shipper_state') === 'AK') selected @endif value="AK">AK (Alaska)</option>
                                        <option @if(old('shipper_state') === 'AZ') selected @endif value="AZ">AZ (Arizona)</option>
                                        <option @if(old('shipper_state') === 'AR') selected @endif value="AR">AR (Arkansas)</option>
                                        <option @if(old('shipper_state') === 'CA') selected @endif value="CA">CA (California)</option>
                                        <option @if(old('shipper_state') === 'CO') selected @endif value="CO">CO (Colorado)</option>
                                        <option @if(old('shipper_state') === 'CT') selected @endif value="CT">CT (Connecticut)</option>
                                        <option @if(old('shipper_state') === 'DE') selected @endif value="DE">DE (Delaware)</option>
                                        <option @if(old('shipper_state') === 'DC') selected @endif value="DC">DC (District of Columbia)</option>
                                        <option @if(old('shipper_state') === 'FL') selected @endif value="FL">FL (Florida)</option>
                                        <option @if(old('shipper_state') === 'GA') selected @endif value="GA">GA (Georgia)</option>
                                        <option @if(old('shipper_state') === 'HI') selected @endif value="HI">HI (Hawaii)</option>
                                        <option @if(old('shipper_state') === 'ID') selected @endif value="ID">ID (Idaho)</option>
                                        <option @if(old('shipper_state') === 'IL') selected @endif value="IL">IL (Illinois)</option>
                                        <option @if(old('shipper_state') === 'IN') selected @endif value="IN">IN (Indiana)</option>
                                        <option @if(old('shipper_state') === 'IA') selected @endif value="IA">IA (Iowa)</option>
                                        <option @if(old('shipper_state') === 'KS') selected @endif value="KS">KS (Kansas)</option>
                                        <option @if(old('shipper_state') === 'KY') selected @endif value="KY">KY (Kentucky)</option>
                                        <option @if(old('shipper_state') === 'LA') selected @endif value="LA">LA (Louisiana)</option>
                                        <option @if(old('shipper_state') === 'ME') selected @endif value="ME">ME (Maine)</option>
                                        <option @if(old('shipper_state') === 'MD') selected @endif value="MD">MD (Maryland)</option>
                                        <option @if(old('shipper_state') === 'MA') selected @endif value="MA">MA (Massachusetts)</option>
                                        <option @if(old('shipper_state') === 'MI') selected @endif value="MI">MI (Michigan)</option>
                                        <option @if(old('shipper_state') === 'MN') selected @endif value="MN">MN (Minnesota)</option>
                                        <option @if(old('shipper_state') === 'MS') selected @endif value="MS">MS (Mississippi)</option>
                                        <option @if(old('shipper_state') === 'MO') selected @endif value="MO">MO (Missouri)</option>
                                        <option @if(old('shipper_state') === 'MT') selected @endif value="MT">MT (Montana)</option>
                                        <option @if(old('shipper_state') === 'NE') selected @endif value="NE">NE (Nebraska)</option>
                                        <option @if(old('shipper_state') === 'NV') selected @endif value="NV">NV (Nevada)</option>
                                        <option @if(old('shipper_state') === 'NH') selected @endif value="NH">NH (New Hampshire)</option>
                                        <option @if(old('shipper_state') === 'NJ') selected @endif value="NJ">NJ (New Jersey)</option>
                                        <option @if(old('shipper_state') === 'NM') selected @endif value="NM">NM (New Mexico)</option>
                                        <option @if(old('shipper_state') === 'NY') selected @endif value="NY">NY (New York)</option>
                                        <option @if(old('shipper_state') === 'NC') selected @endif value="NC">NC (North Carolina)</option>
                                        <option @if(old('shipper_state') === 'ND') selected @endif value="ND">ND (North Dakota)</option>
                                        <option @if(old('shipper_state') === 'OH') selected @endif value="OH">OH (Ohio)</option>
                                        <option @if(old('shipper_state') === 'OK') selected @endif value="OK">OK (Oklahoma)</option>
                                        <option @if(old('shipper_state') === 'OR') selected @endif value="OR">OR (Oregon)</option>
                                        <option @if(old('shipper_state') === 'PA') selected @endif value="PA">PA (Pennsylvania)</option>
                                        <option @if(old('shipper_state') === 'PR') selected @endif value="PR">PR (Puerto Rico)</option>
                                        <option @if(old('shipper_state') === 'RI') selected @endif value="RI">RI (Rhode Island)</option>
                                        <option @if(old('shipper_state') === 'SC') selected @endif value="SC">SC (South Carolina)</option>
                                        <option @if(old('shipper_state') === 'SD') selected @endif value="SD">SD (South Dakota)</option>
                                        <option @if(old('shipper_state') === 'TN') selected @endif value="TN">TN (Tennessee)</option>
                                        <option @if(old('shipper_state') === 'TX') selected @endif value="TX">TX (Texas)</option>
                                        <option @if(old('shipper_state') === 'UT') selected @endif value="UT">UT (Utah)</option>
                                        <option @if(old('shipper_state') === 'VT') selected @endif value="VT">VT (Vermont)</option>
                                        <option @if(old('shipper_state') === 'VA') selected @endif value="VA">VA (Virginia)</option>
                                        <option @if(old('shipper_state') === 'WA') selected @endif value="WA">WA (Washington)</option>
                                        <option @if(old('shipper_state') === 'WV') selected @endif value="WV">WV (West Virginia)</option>
                                        <option @if(old('shipper_state') === 'WI') selected @endif value="WI">WI (Wisconsin)</option>
                                        <option @if(old('shipper_state') === 'WY') selected @endif value="WY">WY (Wyoming)</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="faxInput">Fax</label>
                                    <input type="text" class="form-control phoneMask" id="faxInput" name="fax" placeholder="Enter the company's fax number" value="">
                                </div>
                            </div>

                            <div id="zipCodeInputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="zipCodeInput">*Postal Code</label>
                                    <input type="text" class="form-control" id="zipCodeInput" name="zip_code" placeholder="Enter the company's postal code" value="89104">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="officeIdInput">Office ID</label>
                                    <input type="text" class="form-control" id="officeIdInput" name="office_id" placeholder="Enter the company's office id" value="">
                                </div>
                            </div>

                            <div id="emailInputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="emailInput">*Email</label>
                                    <input type="text" class="form-control" id="emailInput" name="email" placeholder="Enter the company's contact email address" value="americansuccessinvoice@gmail.com">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="websiteInput">Website</label>
                                    <input type="text" class="form-control" id="websiteInput" name="website" placeholder="Enter the company's website" value="">
                                </div>
                            </div>

                            <div id="emailInputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="default_currency">*Currency Type</label>
                                    <select name="default_currency" id="default_currency" class="form-control" tabindex="20"><option selected="selected" value="0">USD</option>
                                        <option value="1">CAD</option></select>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fedIdInput">Fed ID</label>
                                    <input type="text" class="form-control" id="fedIdInput" name="fed_id" placeholder="Enter the company's federal identifier" value="">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="scacInput">SCAC</label>
                                    <input type="text" class="form-control" id="scacInput" name="scac" placeholder="Enter the company's scac" value="">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mcNumberInput">MC Number</label>
                                    <input type="text" class="form-control" id="mcNumberInput" name="mc_number" placeholder="Enter the company's mc number" value="">
                                </div>
                            </div>


                            <div id="emailInputGroup" class="col-md-12">
                                <div class="form-group">
                                    <label for="logoInput">Upload Company Logo</label>
                                    <input type="file" id="logoInput" name="logo">
                                    <div style="color: #469C46; font-size: 12px; margin-top: 5px;"> Recommended logo size 250x75 </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <img src="https://attachments-bpro-bucket.s3.amazonaws.com/uploads/account/logo/509/thumb_logo_new.png?X-Amz-Expires=600&amp;X-Amz-Date=20210228T173352Z&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=AKIAJDVDVYWFSOWH5TUA%2F20210228%2Fus-east-1%2Fs3%2Faws4_request&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Signature=5ff2b24d1534bc9e69cacd369a50f64fa94f2a67d289da7e6f0a1fd092a12771"><br>
                                    <a href="/administration/account/remove_logo">Remove</a>
                                </div>
                            </div>
                        </form>      <hr style="clear: both;">
                        <button class="btn btn-success" onclick="submitCompanyProfile()">
                            <i class="glyphicon glyphicon-floppy-saved"></i> &nbsp;Save Changes
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
