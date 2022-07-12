<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    @auth
        @php
            $changedLoads = \App\Models\Load::where('changed', true)->get();
            $company = \App::make('currentCompany');
            $companyId = $company->id;
            $brokerCompany = \App\Models\GeneralSetting::where('company_id', $companyId)->first();
        @endphp
        <script>
            window.currentCompanyId = {!! $companyId !!};
            window.APP_URL = {!! "'".env('APP_URL')."'" !!};
        </script>
    @endauth
    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
</head>
<body>
<div id="app">
    <ul class="nav nav-tabs">
        @guest
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else

            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/'.$companyId.'/home')}}">{{ config('app.name', 'Laravel') }}</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Loads</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{url('/'.$companyId.'/loads')}}">Loads List</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#createLoadModal">New Load</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Customers</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('customers.index', $companyId)}}">Customers List</a>
                    <a class="dropdown-item" href="{{route('customers.create', $companyId)}}">New Customer</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Carriers</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('carriers.index', $companyId)}}">Carriers List</a>
                    <a class="dropdown-item" href="{{route('carriers.create', $companyId)}}">New Carrier</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dispatchers</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('dispatchers.index', $companyId)}}">Dispatchers List</a>
                    <a class="dropdown-item" href="{{route('dispatchers.create', $companyId)}}">New Dispatcher</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Accounting</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('loads.accounting', $companyId)}}">Load Sales Summary</a>
                </div>
            </li>
            @if(Auth::user()->role === \App\Constanats\UserRoles::SuperAdmin || Auth::user()->role === \App\Constanats\UserRoles::Accounting)
                <li class="nav-item dropdown">
                    <a class="nav-link header-notifications-item dropdown-toggle @if(!$changedLoads->isEmpty()) has-notification @endif" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        Changed Loads
                        <span style="cursor:pointer" class="glyphicon glyphicon glyphicon-bell pull-right " aria-hidden="true">
                            {{count($changedLoads)}}
                        </span>
                    </a>
                    @if(!$changedLoads->isEmpty())
                        <div class="dropdown-menu">
                            @foreach($changedLoads as $changedLoad)
                                <a class="dropdown-item" href="{{url('/'.$companyId.'/loads/'.$changedLoad->id)}}">#{{$changedLoad->id}} changed</a>
                            @endforeach
                        </div>
                    @endif
                </li>
            @endif
            <li class="nav-item dropdown pull-right">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                    <span style="cursor:pointer" class="glyphicon glyphicon glyphicon-user pull-right " aria-hidden="true">
                    </span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <a class="dropdown-item" href="{{ url($companyId.'/account') }}">My Account</a>
                    @if(Auth::user()->role === \App\Constanats\UserRoles::SuperAdmin)
                        <a class="dropdown-item" href="{{url($companyId.'/user-create') }}">Create User</a>
                    @endif
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @if(Auth::user()->role === \App\Constanats\UserRoles::SuperAdmin)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span style="cursor:pointer" class="glyphicon glyphicon glyphicon-cog pull-right " aria-hidden="true"></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url($companyId.'/profileSettings')}}">{{$brokerCompany->name}} Profile</a>
                        <a class="dropdown-item" href="{{url($companyId.'/general-settings/1/edit')}}">{{$brokerCompany->name}} Settings</a>
                        <a class="dropdown-item" href="{{url($companyId.'/companies/'.$company->id.'/edit')}}">{{$company->name}} Profile</a>
                    </div>
                </li>
            @endif
            <div class="col-sm-4 col-xs-4" id="searchCarriers">
                <form class="form-inline" id="carrier_search">
                    <div class="form-group mx-sm-3 mb-2">
                        <label class="sr-only">Find Customer</label>
                        <input class="form-control" type="text" id="" name="keyword" placeholder="Search" title="Type in a name">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">
                        <span style="cursor:pointer" class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </form>
                <ul id="myUL" class="col-sm-12 col-xs-12"></ul>
            </div>

        @endguest
    </ul>
    <main class="py-4">
        @yield('content')
    </main>
</div>
@auth
@php
  $customers = App\Models\Customer::select('company', 'id')->get();
@endphp
<!-- The Modal -->
    <div class="modal" id="createLoadModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form method="GET" action="{{url($companyId.'/loads/create')}}">
                    <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label class="control-laCbel">*Customer</label><br>
                                <select name="customerId" class="selectpicker col-sm-12" required="true" data-live-search="true">
                                    <option disabled selected value>Select Customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->company }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="customer-load-value" class="col-form-label">Load Value</label>
                                <input type="number" name="shipper_value" max="7000" class="form-control" id="customer-load-valuet">
                            </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create Load</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endauth
</body>
</html>
