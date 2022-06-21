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
    <div class="container"  style="max-width: 100%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Customers</span>
                        <a style="float: right;" href="{{url(\App::make('currentCompany')->id).'/customers/create'}}" title="create new">
                            <button type="button" class="btn btn-primary" aria-label="Left Align">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                        </a>
                    </div>

                    <form method="get" action="{{ url(\App::make('currentCompany')->id.'/customer-search') }}">
                        <div class="row col-sm-12">
                            @csrf
                            <div class="col-sm">
                                <div class="form-group">
                                    <label>ID#:</label>
                                    <input placeholder="Customer ID" type="text" class="form-control" name="id" value="@if(isset($data['id'])){{$data['id']}}@endif"/>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label">Status:</label>
                                    <select class="form-control" name="status" tabindex="1">
                                        <option value="">Select Status</option>
                                        <option @if(isset($data['status']) && $data['status'] == "Invoiced") selected @endif value="Active">Active</option>
                                        <option @if(isset($data['status']) && $data['status'] == "Committed") selected @endif value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label>Company:</label>
                                    <input placeholder="Company name" type="text" class="form-control" name="company" value="@if(isset($data['company'])){{$data['company']}}@endif"/>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label>MC#:</label>
                                    <input placeholder="MC#" type="text" class="form-control" name="mc_number" value="@if(isset($data['mc_number'])){{$data['mc_number']}}@endif"/>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label>Address:</label>
                                    <input placeholder="Address" type="text" class="form-control" name="address1" value="@if(isset($data['address1'])){{$data['address1']}}@endif"/>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="customer">Phone:</label>
                                    <input placeholder="Phone" type="text" class="form-control" name="phone" value="@if(isset($data['phone'])){{$data['phone']}}@endif"/>
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

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company</th>
                                    <th>MC#</th>
                                    <th>CreditLimit</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                    @php
                                        if ($customer->currency == 'USD'){
                                            $currency = '$';
                                        }
                                    @endphp
                                    <tr>
                                        <td>
                                            <a title="show" href="{{url(\App::make('currentCompany')->id.'/customers/'.$customer->id)}}">
                                                {{$customer->id}}
                                            </a>
                                        </td>
                                        <td>{{$customer->company}}</td>
                                        <td>{{$customer->mc_number}}</td>
                                        <td>{{$currency}}@php echo number_format( $customer->credit_limit, 2 )@endphp</td>
                                        <td>{{$customer->phone}}</td>
                                        <td>{{$customer->status}}</td>
                                        <td>
                                            <a title="edit" href="{{url(\App::make('currentCompany')->id.'/customers/'.$customer->id.'/edit')}}">
                                                <button type="button" class="btn btn-primary" aria-label="Left Align">
                                                    Edit <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Company</th>
                                    <th>MC#</th>
                                    <th>CreditLimit</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        @if(isset($data))
                            {{ $customers->appends($data)->links() }}
                        @else
                            {{ $customers->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
