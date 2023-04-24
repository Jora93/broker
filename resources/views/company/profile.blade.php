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
                        <form method="POST" class="edit_account" id="editCompanyProfileForm" name="account_edit" enctype="multipart/form-data" action="{{url(\App::make('currentCompany')->id.'/profileSettings/')}}">
                            @csrf
                            <div class="col-md-6">
                                <div id="companyInputGroup" class="form-group">
                                    <label for="companyInput">*Company</label>
                                    <input type="text" class="form-control focusOnLoad" name="generalSettings[name]" placeholder="Enter the name of the company" value="{{$generalSettings->name}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div id="timeZoneSelectGroup" class="form-group">
                                    <label for="timeZoneSelect">*Time Zone</label>
                                    <select name="generalSettings[time_zone]" class="form-control chosen chosen-select" tabindex="-1" >
                                        <option @if($generalSettings->time_zone === 'UTC') selected @endif value="UTC">UTC +00:00</option>
                                        <option @if($generalSettings->time_zone === 'International Date Line West') selected @endif value="International Date Line West">International Date Line West -12:00</option>
                                        <option @if($generalSettings->time_zone === 'American Samoa') selected @endif value="American Samoa">American Samoa -11:00</option>
                                        <option @if($generalSettings->time_zone === 'Midway Island') selected @endif value="Midway Island">Midway Island -11:00</option>
                                        <option @if($generalSettings->time_zone === 'Hawaii') selected @endif value="Hawaii">Hawaii -10:00</option>
                                        <option @if($generalSettings->time_zone === 'Alaska') selected @endif value="Alaska">Alaska -09:00</option>
                                        <option @if($generalSettings->time_zone === 'Pacific Time (US &amp; Canada)') selected @endif value="Pacific Time (US &amp; Canada)">Pacific Time (US &amp; Canada) -08:00</option>
                                        <option @if($generalSettings->time_zone === 'Tijuana') selected @endif value="Tijuana">Tijuana -08:00</option>
                                        <option @if($generalSettings->time_zone === 'Arizona') selected @endif value="Arizona">Arizona -07:00</option>
                                        <option @if($generalSettings->time_zone === 'Chihuahua') selected @endif value="Chihuahua">Chihuahua -07:00</option>
                                        <option @if($generalSettings->time_zone === 'Mazatlan') selected @endif value="Mazatlan">Mazatlan -07:00</option>
                                        <option @if($generalSettings->time_zone === 'Mountain Time (US &amp; Canada)') selected @endif value="Mountain Time (US &amp; Canada)">Mountain Time (US &amp; Canada) -07:00</option>
                                        <option @if($generalSettings->time_zone === 'Central America') selected @endif value="Central America">Central America -06:00</option>
                                        <option @if($generalSettings->time_zone === 'Central Time (US &amp; Canada)') selected @endif value="Central Time (US &amp; Canada)">Central Time (US &amp; Canada) -06:00</option>
                                        <option @if($generalSettings->time_zone === 'Guadalajara') selected @endif value="Guadalajara">Guadalajara -06:00</option>
                                        <option @if($generalSettings->time_zone === 'Mexico City') selected @endif value="Mexico City">Mexico City -06:00</option>
                                        <option @if($generalSettings->time_zone === 'Monterrey') selected @endif value="Monterrey">Monterrey -06:00</option>
                                        <option @if($generalSettings->time_zone === 'Saskatchewan') selected @endif value="Saskatchewan">Saskatchewan -06:00</option>
                                        <option @if($generalSettings->time_zone === 'Bogota') selected @endif value="Bogota">Bogota -05:00</option>
                                        <option @if($generalSettings->time_zone === 'Eastern Time (US &amp; Canada)') selected @endif value="Eastern Time (US &amp; Canada)">Eastern Time (US &amp; Canada) -05:00</option>
                                        <option @if($generalSettings->time_zone === 'Indiana (East)') selected @endif value="Indiana (East)">Indiana (East) -05:00</option>
                                        <option @if($generalSettings->time_zone === 'Lima') selected @endif value="Lima">Lima -05:00</option>
                                        <option @if($generalSettings->time_zone === 'Quito') selected @endif value="Quito">Quito -05:00</option>
                                        <option @if($generalSettings->time_zone === 'Atlantic Time (Canada)') selected @endif value="Atlantic Time (Canada)">Atlantic Time (Canada) -04:00</option>
                                        <option @if($generalSettings->time_zone === 'Caracas') selected @endif value="Caracas">Caracas -04:00</option>
                                        <option @if($generalSettings->time_zone === 'Georgetown') selected @endif value="Georgetown">Georgetown -04:00</option>
                                        <option @if($generalSettings->time_zone === 'La Paz') selected @endif value="La Paz">La Paz -04:00</option>
                                        <option @if($generalSettings->time_zone === 'Puerto Rico') selected @endif value="Puerto Rico">Puerto Rico -04:00</option>
                                        <option @if($generalSettings->time_zone === 'Santiago') selected @endif value="Santiago">Santiago -04:00</option>
                                        <option @if($generalSettings->time_zone === 'Newfoundland') selected @endif value="Newfoundland">Newfoundland -03:30</option>
                                        <option @if($generalSettings->time_zone === 'Brasilia') selected @endif value="Brasilia">Brasilia -03:00</option>
                                        <option @if($generalSettings->time_zone === 'Buenos Aires') selected @endif value="Buenos Aires">Buenos Aires -03:00</option>
                                        <option @if($generalSettings->time_zone === 'Greenland') selected @endif value="Greenland">Greenland -03:00</option>
                                        <option @if($generalSettings->time_zone === 'Montevideo') selected @endif value="Montevideo">Montevideo -03:00</option>
                                        <option @if($generalSettings->time_zone === 'Mid-Atlantic') selected @endif value="Mid-Atlantic">Mid-Atlantic -02:00</option>
                                        <option @if($generalSettings->time_zone === 'Azores') selected @endif value="Azores">Azores -01:00</option>
                                        <option @if($generalSettings->time_zone === 'Cape Verde Is.') selected @endif value="Cape Verde Is.">Cape Verde Is. -01:00</option>
                                        <option @if($generalSettings->time_zone === 'Edinburgh') selected @endif value="Edinburgh">Edinburgh +00:00</option>
                                        <option @if($generalSettings->time_zone === 'Lisbon') selected @endif value="Lisbon">Lisbon +00:00</option>
                                        <option @if($generalSettings->time_zone === 'London') selected @endif value="London">London +00:00</option>
                                        <option @if($generalSettings->time_zone === 'Monrovia') selected @endif value="Monrovia">Monrovia +00:00</option>
                                        <option @if($generalSettings->time_zone === 'Amsterdam') selected @endif value="Amsterdam">Amsterdam +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Belgrade') selected @endif value="Belgrade">Belgrade +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Berlin') selected @endif value="Berlin">Berlin +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Bern') selected @endif value="Bern">Bern +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Bratislava') selected @endif value="Bratislava">Bratislava +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Brussels') selected @endif value="Brussels">Brussels +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Budapest') selected @endif value="Budapest">Budapest +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Casablanca') selected @endif value="Casablanca">Casablanca +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Copenhagen') selected @endif value="Copenhagen">Copenhagen +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Dublin') selected @endif value="Dublin">Dublin +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Ljubljana') selected @endif value="Ljubljana">Ljubljana +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Madrid') selected @endif value="Madrid">Madrid +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Paris') selected @endif value="Paris">Paris +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Prague') selected @endif value="Prague">Prague +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Rome') selected @endif value="Rome">Rome +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Sarajevo') selected @endif value="Sarajevo">Sarajevo +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Skopje') selected @endif value="Skopje">Skopje +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Stockholm') selected @endif value="Stockholm">Stockholm +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Vienna') selected @endif value="Vienna">Vienna +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Warsaw') selected @endif value="Warsaw">Warsaw +01:00</option>
                                        <option @if($generalSettings->time_zone === 'West Central Africa') selected @endif value="West Central Africa">West Central Africa +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Zagreb') selected @endif value="Zagreb">Zagreb +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Zurich') selected @endif value="Zurich">Zurich +01:00</option>
                                        <option @if($generalSettings->time_zone === 'Athens') selected @endif value="Athens">Athens +02:00</option>
                                        <option @if($generalSettings->time_zone === 'Bucharest') selected @endif value="Bucharest">Bucharest +02:00</option>
                                        <option @if($generalSettings->time_zone === 'Cairo') selected @endif value="Cairo">Cairo +02:00</option>
                                        <option @if($generalSettings->time_zone === 'Harare') selected @endif value="Harare">Harare +02:00</option>
                                        <option @if($generalSettings->time_zone === 'Helsinki') selected @endif value="Helsinki">Helsinki +02:00</option>
                                        <option @if($generalSettings->time_zone === 'Jerusalem') selected @endif value="Jerusalem">Jerusalem +02:00</option>
                                        <option @if($generalSettings->time_zone === 'Kaliningrad') selected @endif value="Kaliningrad">Kaliningrad +02:00</option>
                                        <option @if($generalSettings->time_zone === 'Kyiv') selected @endif value="Kyiv">Kyiv +02:00</option>
                                        <option @if($generalSettings->time_zone === 'Pretoria') selected @endif value="Pretoria">Pretoria +02:00</option>
                                        <option @if($generalSettings->time_zone === 'Riga') selected @endif value="Riga">Riga +02:00</option>
                                        <option @if($generalSettings->time_zone === 'Sofia') selected @endif value="Sofia">Sofia +02:00</option>
                                        <option @if($generalSettings->time_zone === 'Tallinn') selected @endif value="Tallinn">Tallinn +02:00</option>
                                        <option @if($generalSettings->time_zone === 'Vilnius') selected @endif value="Vilnius">Vilnius +02:00</option>
                                        <option @if($generalSettings->time_zone === 'Baghdad') selected @endif value="Baghdad">Baghdad +03:00</option>
                                        <option @if($generalSettings->time_zone === 'Istanbul') selected @endif value="Istanbul">Istanbul +03:00</option>
                                        <option @if($generalSettings->time_zone === 'Kuwait') selected @endif value="Kuwait">Kuwait +03:00</option>
                                        <option @if($generalSettings->time_zone === 'Minsk') selected @endif value="Minsk">Minsk +03:00</option>
                                        <option @if($generalSettings->time_zone === 'Moscow') selected @endif value="Moscow">Moscow +03:00</option>
                                        <option @if($generalSettings->time_zone === 'Nairobi') selected @endif value="Nairobi">Nairobi +03:00</option>
                                        <option @if($generalSettings->time_zone === 'Riyadh') selected @endif value="Riyadh">Riyadh +03:00</option>
                                        <option @if($generalSettings->time_zone === 'St. Petersburg') selected @endif value="St. Petersburg">St. Petersburg +03:00</option>
                                        <option @if($generalSettings->time_zone === 'Volgograd') selected @endif value="Volgograd">Volgograd +03:00</option>
                                        <option @if($generalSettings->time_zone === 'Tehran') selected @endif value="Tehran">Tehran +03:30</option>
                                        <option @if($generalSettings->time_zone === 'Abu Dhabi') selected @endif value="Abu Dhabi">Abu Dhabi +04:00</option>
                                        <option @if($generalSettings->time_zone === 'Baku') selected @endif value="Baku">Baku +04:00</option>
                                        <option @if($generalSettings->time_zone === 'Muscat') selected @endif value="Muscat">Muscat +04:00</option>
                                        <option @if($generalSettings->time_zone === 'Samara') selected @endif value="Samara">Samara +04:00</option>
                                        <option @if($generalSettings->time_zone === 'Tbilisi') selected @endif value="Tbilisi">Tbilisi +04:00</option>
                                        <option @if($generalSettings->time_zone === 'Yerevan') selected @endif value="Yerevan">Yerevan +04:00</option>
                                        <option @if($generalSettings->time_zone === 'Kabul') selected @endif value="Kabul">Kabul +04:30</option>
                                        <option @if($generalSettings->time_zone === 'Ekaterinburg') selected @endif value="Ekaterinburg">Ekaterinburg +05:00</option>
                                        <option @if($generalSettings->time_zone === 'Islamabad') selected @endif value="Islamabad">Islamabad +05:00</option>
                                        <option @if($generalSettings->time_zone === 'Karachi') selected @endif value="Karachi">Karachi +05:00</option>
                                        <option @if($generalSettings->time_zone === 'Tashkent') selected @endif value="Tashkent">Tashkent +05:00</option>
                                        <option @if($generalSettings->time_zone === 'Chennai') selected @endif value="Chennai">Chennai +05:30</option>
                                        <option @if($generalSettings->time_zone === 'Kolkata') selected @endif value="Kolkata">Kolkata +05:30</option>
                                        <option @if($generalSettings->time_zone === 'Mumbai') selected @endif value="Mumbai">Mumbai +05:30</option>
                                        <option @if($generalSettings->time_zone === 'New Delhi') selected @endif value="New Delhi">New Delhi +05:30</option>
                                        <option @if($generalSettings->time_zone === 'Sri Jayawardenepura') selected @endif value="Sri Jayawardenepura">Sri Jayawardenepura +05:30</option>
                                        <option @if($generalSettings->time_zone === 'Kathmandu') selected @endif value="Kathmandu">Kathmandu +05:45</option>
                                        <option @if($generalSettings->time_zone === 'Almaty') selected @endif value="Almaty">Almaty +06:00</option>
                                        <option @if($generalSettings->time_zone === 'Astana') selected @endif value="Astana">Astana +06:00</option>
                                        <option @if($generalSettings->time_zone === 'Astana') selected @endif value="Dhaka">Dhaka +06:00</option>
                                        <option @if($generalSettings->time_zone === 'Urumqi') selected @endif value="Urumqi">Urumqi +06:00</option>
                                        <option @if($generalSettings->time_zone === 'Rangoon') selected @endif value="Rangoon">Rangoon +06:30</option>
                                        <option @if($generalSettings->time_zone === 'Bangkok') selected @endif value="Bangkok">Bangkok +07:00</option>
                                        <option @if($generalSettings->time_zone === 'Hanoi') selected @endif value="Hanoi">Hanoi +07:00</option>
                                        <option @if($generalSettings->time_zone === 'Jakarta') selected @endif value="Jakarta">Jakarta +07:00</option>
                                        <option @if($generalSettings->time_zone === 'Krasnoyarsk') selected @endif value="Krasnoyarsk">Krasnoyarsk +07:00</option>
                                        <option @if($generalSettings->time_zone === 'Novosibirsk') selected @endif value="Novosibirsk">Novosibirsk +07:00</option>
                                        <option @if($generalSettings->time_zone === 'Beijing') selected @endif value="Beijing">Beijing +08:00</option>
                                        <option @if($generalSettings->time_zone === 'Chongqing') selected @endif value="Chongqing">Chongqing +08:00</option>
                                        <option @if($generalSettings->time_zone === 'Hong Kong') selected @endif value="Hong Kong">Hong Kong +08:00</option>
                                        <option @if($generalSettings->time_zone === 'Irkutsk') selected @endif value="Irkutsk">Irkutsk +08:00</option>
                                        <option @if($generalSettings->time_zone === 'Kuala Lumpur') selected @endif value="Kuala Lumpur">Kuala Lumpur +08:00</option>
                                        <option @if($generalSettings->time_zone === 'Perth') selected @endif value="Perth">Perth +08:00</option>
                                        <option @if($generalSettings->time_zone === 'Singapore') selected @endif value="Singapore">Singapore +08:00</option>
                                        <option @if($generalSettings->time_zone === 'Taipei') selected @endif value="Taipei">Taipei +08:00</option>
                                        <option @if($generalSettings->time_zone === 'Ulaanbaatar') selected @endif value="Ulaanbaatar">Ulaanbaatar +08:00</option>
                                        <option @if($generalSettings->time_zone === 'Osaka') selected @endif value="Osaka">Osaka +09:00</option>
                                        <option @if($generalSettings->time_zone === 'Sapporo') selected @endif value="Sapporo">Sapporo +09:00</option>
                                        <option @if($generalSettings->time_zone === 'Seoul') selected @endif value="Seoul">Seoul +09:00</option>
                                        <option @if($generalSettings->time_zone === 'Tokyo') selected @endif value="Tokyo">Tokyo +09:00</option>
                                        <option @if($generalSettings->time_zone === 'Yakutsk') selected @endif value="Yakutsk">Yakutsk +09:00</option>
                                        <option @if($generalSettings->time_zone === 'Adelaide') selected @endif value="Adelaide">Adelaide +09:30</option>
                                        <option @if($generalSettings->time_zone === 'Darwin') selected @endif value="Darwin">Darwin +09:30</option>
                                        <option @if($generalSettings->time_zone === 'Brisbane') selected @endif value="Brisbane">Brisbane +10:00</option>
                                        <option @if($generalSettings->time_zone === 'Canberra') selected @endif value="Canberra">Canberra +10:00</option>
                                        <option @if($generalSettings->time_zone === 'Guam') selected @endif value="Guam">Guam +10:00</option>
                                        <option @if($generalSettings->time_zone === 'Hobart') selected @endif value="Hobart">Hobart +10:00</option>
                                        <option @if($generalSettings->time_zone === 'Melbourne') selected @endif value="Melbourne">Melbourne +10:00</option>
                                        <option @if($generalSettings->time_zone === 'Port Moresby') selected @endif value="Port Moresby">Port Moresby +10:00</option>
                                        <option @if($generalSettings->time_zone === 'Sydney') selected @endif value="Sydney">Sydney +10:00</option>
                                        <option @if($generalSettings->time_zone === 'Vladivostok') selected @endif value="Vladivostok">Vladivostok +10:00</option>
                                        <option @if($generalSettings->time_zone === 'Magadan') selected @endif value="Magadan">Magadan +11:00</option>
                                        <option @if($generalSettings->time_zone === 'New Caledonia') selected @endif value="New Caledonia">New Caledonia +11:00</option>
                                        <option @if($generalSettings->time_zone === 'Solomon Is.') selected @endif value="Solomon Is.">Solomon Is. +11:00</option>
                                        <option @if($generalSettings->time_zone === 'Srednekolymsk') selected @endif value="Srednekolymsk">Srednekolymsk +11:00</option>
                                        <option @if($generalSettings->time_zone === 'Auckland') selected @endif value="Auckland">Auckland +12:00</option>
                                        <option @if($generalSettings->time_zone === 'Fiji') selected @endif value="Fiji">Fiji +12:00</option>
                                        <option @if($generalSettings->time_zone === 'Kamchatka') selected @endif value="Kamchatka">Kamchatka +12:00</option>
                                        <option @if($generalSettings->time_zone === 'Marshall Is.') selected @endif value="Marshall Is.">Marshall Is. +12:00</option>
                                        <option @if($generalSettings->time_zone === 'Wellington') selected @endif value="Wellington">Wellington +12:00</option>
                                        <option @if($generalSettings->time_zone === 'Chatham Is.') selected @endif value="Chatham Is.">Chatham Is. +12:45</option>
                                        <option @if($generalSettings->time_zone === 'Nuku') selected @endif value="Nuku">Nuku'alofa +13:00</option>
                                        <option @if($generalSettings->time_zone === 'Samoa') selected @endif value="Samoa">Samoa +13:00</option>
                                        <option @if($generalSettings->time_zone === 'Tokelau Is.') selected @endif value="Tokelau Is.">Tokelau Is. +13:00</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div id="firstNameInputGroup" class="form-group">
                                    <label for="firstNameInput">*Contact First Name</label>
                                    <input type="text" class="form-control" id="firstNameInput" name="generalSettings[first_name]" placeholder="Enter the first name of this company's contact" value="{{$generalSettings->first_name}}">
                                </div>
                            </div>

                            <div id="lastNameInputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="lastNameInput">*Contact Last Name</label>
                                    <input type="text" class="form-control" id="lastNameInput" name="generalSettings[last_name]" placeholder="Enter the last name of this company's contact" value="{{$generalSettings->last_name}}">
                                </div>
                            </div>

                            <div id="address1InputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="address1Input">*Address 1</label>
                                    <input type="text" class="form-control" id="address1Input" name="generalSettings[address1]" placeholder="Enter the company's address" value="{{$generalSettings->address1}}">
                                </div>
                            </div>

                            <div id="phone1InputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="phone1Input">*Primary Phone</label>
                                    <input type="text" class="form-control phoneMask" id="phone1Input" name="generalSettings[phone]" placeholder="Enter the company's primary phone number" value="{{$generalSettings->phone}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address2Input">Address 2</label>
                                    <input type="text" class="form-control" id="address2Input" name="generalSettings[address2]" placeholder="Enter the company's address" value="{{$generalSettings->address2}}">
                                </div>
                            </div>

                            <div id="cityInputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="cityInput">*City</label>
                                    <input type="text" class="form-control" id="cityInput" name="generalSettings[city]" placeholder="Enter the company's city" value="{{$generalSettings->city}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tollFreePhoneInput">Toll Free Phone</label>
                                    <input type="text" class="form-control phoneMask" id="tollFreePhoneInput" name="generalSettings[toll_free_phone]" placeholder="Enter the company's toll free phone number" value="{{$generalSettings->toll_free_phone}}">
                                </div>
                            </div>

                            <div id="stateInputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="accountState">*State</label>
                                    <select name="generalSettings[state]" class="consignee_delivery_state selectpickeraa" required="true" data-live-search="true">
                                        <option disabled selected value>Select State/Province</option>
                                        <option @if($generalSettings->state  === 'AL') selected @endif value="AL">AL (Alabama)</option>
                                        <option @if($generalSettings->state  === 'AK') selected @endif value="AK">AK (Alaska)</option>
                                        <option @if($generalSettings->state  === 'AZ') selected @endif value="AZ">AZ (Arizona)</option>
                                        <option @if($generalSettings->state  === 'AR') selected @endif value="AR">AR (Arkansas)</option>
                                        <option @if($generalSettings->state  === 'CA') selected @endif value="CA">CA (California)</option>
                                        <option @if($generalSettings->state  === 'CO') selected @endif value="CO">CO (Colorado)</option>
                                        <option @if($generalSettings->state  === 'CT') selected @endif value="CT">CT (Connecticut)</option>
                                        <option @if($generalSettings->state  === 'DE') selected @endif value="DE">DE (Delaware)</option>
                                        <option @if($generalSettings->state  === 'DC') selected @endif value="DC">DC (District of Columbia)</option>
                                        <option @if($generalSettings->state  === 'FL') selected @endif value="FL">FL (Florida)</option>
                                        <option @if($generalSettings->state  === 'GA') selected @endif value="GA">GA (Georgia)</option>
                                        <option @if($generalSettings->state  === 'HI') selected @endif value="HI">HI (Hawaii)</option>
                                        <option @if($generalSettings->state  === 'ID') selected @endif value="ID">ID (Idaho)</option>
                                        <option @if($generalSettings->state  === 'IL') selected @endif value="IL">IL (Illinois)</option>
                                        <option @if($generalSettings->state  === 'IN') selected @endif value="IN">IN (Indiana)</option>
                                        <option @if($generalSettings->state  === 'IA') selected @endif value="IA">IA (Iowa)</option>
                                        <option @if($generalSettings->state  === 'KS') selected @endif value="KS">KS (Kansas)</option>
                                        <option @if($generalSettings->state  === 'KY') selected @endif value="KY">KY (Kentucky)</option>
                                        <option @if($generalSettings->state  === 'LA') selected @endif value="LA">LA (Louisiana)</option>
                                        <option @if($generalSettings->state  === 'ME') selected @endif value="ME">ME (Maine)</option>
                                        <option @if($generalSettings->state  === 'MD') selected @endif value="MD">MD (Maryland)</option>
                                        <option @if($generalSettings->state  === 'MA') selected @endif value="MA">MA (Massachusetts)</option>
                                        <option @if($generalSettings->state  === 'MI') selected @endif value="MI">MI (Michigan)</option>
                                        <option @if($generalSettings->state  === 'MN') selected @endif value="MN">MN (Minnesota)</option>
                                        <option @if($generalSettings->state  === 'MS') selected @endif value="MS">MS (Mississippi)</option>
                                        <option @if($generalSettings->state  === 'MO') selected @endif value="MO">MO (Missouri)</option>
                                        <option @if($generalSettings->state  === 'MT') selected @endif value="MT">MT (Montana)</option>
                                        <option @if($generalSettings->state  === 'NE') selected @endif value="NE">NE (Nebraska)</option>
                                        <option @if($generalSettings->state  === 'NV') selected @endif value="NV">NV (Nevada)</option>
                                        <option @if($generalSettings->state  === 'NH') selected @endif value="NH">NH (New Hampshire)</option>
                                        <option @if($generalSettings->state  === 'NJ') selected @endif value="NJ">NJ (New Jersey)</option>
                                        <option @if($generalSettings->state  === 'NM') selected @endif value="NM">NM (New Mexico)</option>
                                        <option @if($generalSettings->state  === 'NY') selected @endif value="NY">NY (New York)</option>
                                        <option @if($generalSettings->state  === 'NC') selected @endif value="NC">NC (North Carolina)</option>
                                        <option @if($generalSettings->state  === 'ND') selected @endif value="ND">ND (North Dakota)</option>
                                        <option @if($generalSettings->state  === 'OH') selected @endif value="OH">OH (Ohio)</option>
                                        <option @if($generalSettings->state  === 'OK') selected @endif value="OK">OK (Oklahoma)</option>
                                        <option @if($generalSettings->state  === 'OR') selected @endif value="OR">OR (Oregon)</option>
                                        <option @if($generalSettings->state  === 'PA') selected @endif value="PA">PA (Pennsylvania)</option>
                                        <option @if($generalSettings->state  === 'PR') selected @endif value="PR">PR (Puerto Rico)</option>
                                        <option @if($generalSettings->state  === 'RI') selected @endif value="RI">RI (Rhode Island)</option>
                                        <option @if($generalSettings->state  === 'SC') selected @endif value="SC">SC (South Carolina)</option>
                                        <option @if($generalSettings->state  === 'SD') selected @endif value="SD">SD (South Dakota)</option>
                                        <option @if($generalSettings->state  === 'TN') selected @endif value="TN">TN (Tennessee)</option>
                                        <option @if($generalSettings->state  === 'TX') selected @endif value="TX">TX (Texas)</option>
                                        <option @if($generalSettings->state  === 'UT') selected @endif value="UT">UT (Utah)</option>
                                        <option @if($generalSettings->state  === 'VT') selected @endif value="VT">VT (Vermont)</option>
                                        <option @if($generalSettings->state  === 'VA') selected @endif value="VA">VA (Virginia)</option>
                                        <option @if($generalSettings->state  === 'WA') selected @endif value="WA">WA (Washington)</option>
                                        <option @if($generalSettings->state  === 'WV') selected @endif value="WV">WV (West Virginia)</option>
                                        <option @if($generalSettings->state  === 'WI') selected @endif value="WI">WI (Wisconsin)</option>
                                        <option @if($generalSettings->state  === 'WY') selected @endif value="WY">WY (Wyoming)</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="faxInput">Fax</label>
                                    <input type="text" class="form-control phoneMask" id="faxInput" name="generalSettings[fax]" placeholder="Enter the company's fax number" value="{{$generalSettings->fax}}">
                                </div>
                            </div>

                            <div id="zipCodeInputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="zipCodeInput">*Postal Code</label>
                                    <input type="text" class="form-control" id="zipCodeInput" name="generalSettings[zip_code]" placeholder="Enter the company's postal code" value="{{$generalSettings->zip_code}}">
                                </div>
                            </div>

                            <div id="emailInputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="emailInput">*Email</label>
                                    <input type="text" class="form-control" id="emailInput" name="generalSettings[email]" placeholder="Enter the company's contact email address" value="{{$generalSettings->email}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="websiteInput">Website</label>
                                    <input type="text" class="form-control" id="websiteInput" name="generalSettings[website]" placeholder="Enter the company's website" value="{{$generalSettings->website}}">
                                </div>
                            </div>

                            <div id="emailInputGroup" class="col-md-6">
                                <div class="form-group">
                                    <label for="default_currency">*Currency Type</label>
                                    <select name="generalSettings[default_currency]" id="default_currency" class="form-control" tabindex="20">
                                        <option selected="selected" value="USD">USD</option>
                                    </select>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fedIdInput">Fed ID</label>
                                    <input type="text" class="form-control" id="fedIdInput" name="generalSettings[fed_id]" placeholder="Enter the company's federal identifier" value="{{$generalSettings->fed_id}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="scacInput">SCAC</label>
                                    <input type="text" class="form-control" id="scacInput" name="generalSettings[scac]" placeholder="Enter the company's scac" value="{{$generalSettings->scac}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mcNumberInput">MC Number*</label>
                                    <input required type="text" class="form-control" id="mcNumberInput" name="generalSettings[mc_number]" placeholder="Enter the company's mc number" value="{{$generalSettings->mc_number}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Brokerage Logo</label>
                                <input name="generalSettings[logo]" class="form-control" style="padding: 3px" type="file" accept="image/*">
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
