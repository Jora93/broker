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

    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
    {{--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/inputmask/bindings/inputmask.binding.min.js"></script>--}}
    {{--    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>--}}
    {{--    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>--}}

    {{--    <script src="{{ asset('js/index.js') }}"></script>--}}
</head>
<body>
{{--    <select class="selectpicker" data-live-search="true">--}}
{{--        <option disabled selected value> -- select an option -- </option>--}}
{{--        <option>Hot Dog, Fries and a Soda</option>--}}
{{--        <option>Burger, Shake and a Smile</option>--}}
{{--        <option>Sugar, Spice and all things nice</option>--}}
{{--    </select>--}}
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
                <a class="nav-link active" href="{{ url('/home')}}">{{ config('app.name', 'Laravel') }}</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Loads</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{url('/loads')}}">Loads List</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#createLoadModal">New Load</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Customers</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('customers.index')}}">Customers List</a>
                    <a class="dropdown-item" href="{{route('customers.create')}}">New Customer</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Carriers</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('carriers.index')}}">Carriers List</a>
                    <a class="dropdown-item" href="{{route('carriers.create')}}">New Carrier</a>
                </div>
            </li>
            <li class="nav-item dropdown pull-right">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('account') }}">My Account</a>
                    @if(Auth::user()->role === \App\Constanats\UserRoleConstants::Admin)
                        <a class="dropdown-item" href="{{ route('userCreate') }}">Create User</a>
                    @endif
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
    <main class="py-4">
        @yield('content')
    </main>
</div>
@php
  $customers = App\Customer::select('company', 'id')->get();
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
            <form method="GET" action="{{route('loads.create')}}">
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
                            <label for="customer-load-value" class="col-form-label">*Load Value</label>
                            <input type="number" name="shipper_value" max="7000" class="form-control" id="customer-load-valuet" required="true">
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
</body>
</html>
