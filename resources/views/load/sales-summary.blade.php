@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 100%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Load List</span>
                    </div>
                    <form method="get" action="{{ url(\App::make('currentCompany')->id.'/accounting') }}">
                        <div class="row col-sm-12">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Status:</label>
                                    <select class="form-control" name="status" tabindex="1">
                                        <option value="">All Statuses</option>
                                        <option @if(isset($data['status']) && $data['status'] == "Invoiced") selected @endif value="Invoiced">Invoiced</option>
                                        <option @if(isset($data['status']) && $data['status'] == "Committed") selected @endif value="Committed">Committed</option>
                                        <option @if(isset($data['status']) && $data['status'] == "Assigned") selected @endif value="Assigned">Assigned</option>
                                        <option @if(isset($data['status']) && $data['status'] == "Dispatched") selected @endif value="Dispatched">Dispatched</option>
                                        <option @if(isset($data['status']) && $data['status'] == "Picked Up") selected @endif value="Picked Up">Picked Up</option>
                                        <option @if(isset($data['status']) && $data['status'] == "Enroute") selected @endif value="Enroute">Enroute</option>
                                        <option @if(isset($data['status']) && $data['status'] == "Delivered") selected @endif value="Delivered">Delivered</option>
                                        <option @if(isset($data['status']) && $data['status'] == "Ready to Invoice") selected @endif value="Ready to Invoice">Ready to Invoice</option>
                                        <option @if(isset($data['status']) && $data['status'] == "Paid Carrier") selected @endif value="Paid Carrier">Paid Carrier</option>
                                        <option @if(isset($data['status']) && $data['status'] == "Paid Customer") selected @endif value="Paid Customer">Paid Customer</option>
                                        <option @if(isset($data['status']) && $data['status'] == "Completed") selected @endif value="Completed">Completed</option>
                                        <option @if(isset($data['status']) && $data['status'] == "Voided") selected @endif value="Voided">Voided</option>
                                        <option @if(isset($data['status']) && $data['status'] == "Pending") selected @endif value="Pending">Pending</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">Date Type:</label>
                                    <select class="form-control" name="date_type" tabindex="1">
                                        <option @if(isset($data['date_type']) && $data['date_type'] == "shipDate") selected @endif value="shipDate">Ship Date</option>
                                        <option @if(isset($data['date_type']) && $data['date_type'] == "deliveryDate") selected @endif value="deliveryDate">Delivery Date</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">Date From:</label>
                                    <div class="input-group date datePicker defaultDatePicker">
                                        <input class="datepicker form-control" placeholder="Enter pichup date"  type="text" name="from" @if(isset($data['from'])) value="{{$data['from']}}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">Date To:</label>
                                    <div class="input-group date datePicker defaultDatePicker">
                                        <input class="datepicker form-control" placeholder="Enter pichup date"  type="text" name="to" @if(isset($data['to'])) value="{{$data['to']}}" @endif>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row col-sm-12">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="customer">Customer:</label>
                                    <select class="form-control" name="customer_id" tabindex="1">
                                        <option value="">Select Customer</option>
                                        @if(!$customers->isEmpty())
                                            @foreach($customers as $customer)
                                                <option @if( isset($data['customer_id']) && $data['customer_id'] == $customer->id) selected @endif value="{{$customer->id}}">{{$customer->company}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="carrier">Carrier:</label>
                                    <select class="form-control" name="carrier_id" tabindex="1">
                                        <option value="">Select Carrier</option>
                                        @if(!$carriers->isEmpty())
                                            @foreach($carriers as $carrier)
                                                <option @if( isset($data['carrier_id']) && $data['carrier_id'] == $carrier->id) selected @endif value="{{$carrier->id}}">{{$carrier->company}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">Dispatcher:</label>
                                    <select class="form-control" name="dispatcher_id" tabindex="1">
                                        <option value="">Select Dispatcher</option>
                                        @if(!$dispatchers->isEmpty())
                                            @foreach($dispatchers as $dispatcher)
                                                <option @if( isset($data['dispatcher_id']) && $data['dispatcher_id'] == $dispatcher->id) selected @endif value="{{$dispatcher->id}}">{{$dispatcher->full_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="load_number">Load #:</label>
                                    <input placeholder="Load Number" type="text" class="form-control" name="load_id" value="@if(isset($data['load_id'])){{$data['load_id']}}@endif"/>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="load_number">Invoice #:</label>
                                    <input placeholder="Invoice Number" type="text" class="form-control" name="invoice_number" value="@if(isset($data['invoice_number'])){{$data['invoice_number']}}@endif"/>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">Per Page:</label>
                                    <select class="form-control" name="paginate" tabindex="1">
                                        <option value="25" selected>25</option>
                                        <option @if(isset($data['paginate']) && $data['paginate'] == 50) selected @endif value="50">50</option>
                                        <option @if(isset($data['paginate']) && $data['paginate'] == 100) selected @endif value="100">100</option>
                                        <option @if(isset($data['paginate']) && $data['paginate'] == 200) selected @endif value="200">200</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary float-right">Search</button>
                        </div>
                    </form>
                    <section>
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                Upload Validation Error<br><br>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <div class="col-md-12">
                            @if(isset($loads) && !$loads->isEmpty())
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Load#</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Ship Date</th>
                                        <th scope="col">Carrier</th>
{{--                                        <th scope="col">Shipper Address</th>--}}
{{--                                        <th scope="col">Deliv. Address</th>--}}
                                        <th scope="col">Stops</th>
                                        <th scope="col">Delivery Date</th>
                                        <th scope="col">P/L</th>
                                        <th scope="col">Gross</th>
                                        <th scope="col">Cost</th>
                                        <th scope="col">Net</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($loads as $load)
                                        <tr>
                                            <th scope="row">
                                                <a title="show" href="{{url(\App::make('currentCompany')->id.'/loads/'.$load->id)}}">
                                                    {{$load->id}}
                                                </a>
                                            </th>
                                            <td>{{$load->shipper_type}}</td>
                                            <td>{{$load->status}}</td>
                                            @if(!empty($load->customer))
                                                <td><a href="{{ url(\App::make('currentCompany')->id.'/customers/'.$load->customer->id) }}">{{$load->customer->company}}</a></td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>{{$load->shipper_pickup_date}} {{$load->shipper_pickup_time}}</td>
                                            @if(!empty($load->carrier))
                                                <td><a href="{{ url(\App::make('currentCompany')->id.'/carriers/'.$load->carrier->id) }}">{{$load->carrier->company}}</a></td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>{{$load->shipper_address1}}</td>
{{--                                            <td>{{$load->consignee_address1}}</td>--}}
                                            <td>{{count($load->drops)}}</td>
                                            <td>{{$load->consignee_delivery_date}} {{$load->consignee_delivery_time}}</td>
                                            <td>{{number_format(($load->customer_costs_rate_per_unit - $load->carrier_costs_rate_per_unit) / $load->customer_costs_rate_per_unit * 100, 2, '.', ',')}}%</td>
                                            <td>$ {{number_format($load->customer_costs_rate_per_unit, 2, '.', ',')}}</td>
                                            <td>$ {{number_format($load->carrier_costs_rate_per_unit, 2, '.', ',')}}</td>
                                            <td>$ {{number_format($load->customer_costs_rate_per_unit - $load->carrier_costs_rate_per_unit, 2, '.', ',')}}</td>
                                            <td>
                                                <a title="edit" href="{{url(\App::make('currentCompany')->id.'/loads/'.$load->id.'/edit')}}">
                                                    <button type="button" class="btn btn-primary" aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
{{--                                    <tr style="font-weight: bold">--}}
{{--                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>--}}
{{--                                        <td>Page Total</td>--}}
{{--                                        <td>$ {{number_format($grossSum, 2, '.', ',')}}</td>--}}
{{--                                        <td>$ {{number_format($costSum, 2, '.', ',')}}</td>--}}
{{--                                        <td>$ {{number_format($netSum, 2, '.', ',')}}</td>--}}
{{--                                        <td></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr style="font-weight: bold">--}}
{{--                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>--}}
{{--                                        <td>Report Total</td>--}}
{{--                                        <td>$ {{number_format($totalGrossSum, 2, '.', ',')}}</td>--}}
{{--                                        <td>$ {{number_format($totalCostSum, 2, '.', ',')}}</td>--}}
{{--                                        <td>$ {{number_format($totalNetSum, 2, '.', ',')}}</td>--}}
{{--                                        <td></td>--}}
{{--                                    </tr>--}}
                                    </tbody>
                                </table>
                                @if(isset($data))
                                    {{ $loads->appends($data)->links() }}
                                @else
                                    {{ $loads->links() }}
                                @endif
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
