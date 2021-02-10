@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 100%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Load List</span>
                    </div>
                    <form method="get" action="{{ url('/loads-search') }}">
                        <div class="row col-sm-12">
                            @csrf
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="load_number">Load#:</label>
                                    <input placeholder="Load Number" type="text" class="form-control" name="id" value="@if(isset($data['id'])){{$data['id']}}@endif"/>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="customer">Customer:</label>
                                    <input placeholder="Customer" type="text" class="form-control" name="customer" value="@if(isset($data['customer'])){{$data['customer']}}@endif"/>
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
                            @if(!$loads->isEmpty())
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Load#</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Ship Date</th>
                                        <th scope="col">Carrier</th>
                                        <th scope="col">Shipper Address</th>
                                        <th scope="col">Deliv. Address</th>
                                        <th scope="col">Stops</th>
                                        <th scope="col">Delivery Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($loads as $load)
                                        <tr>
                                            <th scope="row">
                                                <a title="show" href="{{url('/loads/'.$load->id)}}">
                                                    {{$load->id}}
                                                </a>
                                            </th>
                                            <td>{{$load->shipper_type}}</td>
                                            <td>//TODO</td>
                                            <td><a href="{{ url('/customers/'.$load->customer->id) }}">{{$load->customer->company}}</a></td>
                                            <td>{{$load->shipper_pickup_date}} {{$load->shipper_pickup_time}}</td>
                                            <td><a href="{{ url('/carrier/'.$load->carrier->id) }}">{{$load->carrier->company}}</a></td>
                                            <td>{{$load->shipper_address1}}</td>
                                            <td>{{$load->consignee_address1}}</td>
                                            <td>{{$load->stops}}</td>
                                            <td>{{$load->consignee_delivery_date}} {{$load->consignee_delivery_time}}</td>
                                            <td>
                                                <a title="edit" href="{{url('/loads/'.$load->id.'/edit')}}">
                                                    <button type="button" class="btn btn-primary" aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
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
