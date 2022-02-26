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
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Carriers</span>
                        <form method="get" action="{{ url(\App::make('currentCompany')->id.'/carrier-search') }}">
                            <div class="row col-sm-12">
                                @csrf
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="customer">Name or MC#:</label>
                                        <input placeholder="Name or MC#" type="text" class="form-control" name="keyword" value="@if(isset($data['keyword'])){{$data['keyword']}}@endif"/>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label class="control-label">Status:</label>
                                        <select class="form-control" name="status" tabindex="1">
                                            <option value="">Select Status</option>
                                            <option @if(isset($data['status']) && $data['status'] == "Active") selected @endif value="Active">Active</option>
                                            <option @if(isset($data['status']) && $data['status'] == "Inactive") selected @endif value="Inactive">Inactive</option>
                                            <option @if(isset($data['status']) && $data['status'] == "Pending") selected @endif value="Pending">Pending</option>
                                        </select>
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
                            <div class="col-sm">
                                <button type="submit" class="btn btn-primary float-right">Search</button>
                            </div>
                        </form>
                        <div class="row col-sm-12">
                            <a style="float: right;" href="{{url(\App::make('currentCompany')->id).'/carriers/create'}}" title="create new">
                                <button type="button" class="btn btn-primary" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create Carrier
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered data-table" colspan="0" rospwan="0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company</th>
                                    <th>MC#</th>
                                    <th>DOT#</th>
                                    <th>Status</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carriers as $carrier)
                                    <tr>
                                        <td>{{$carrier->id}}</td>
                                        <td><a href="carriers/{{$carrier->id}}">{{$carrier->company}}</a></td>
                                        <td>{{$carrier->mc_number}}</td>
                                        <td>{{$carrier->dot_number}}</td>
                                        <td>{{$carrier->status}}</td>
                                        <td><a href="tel:{{$carrier->phone}}">{{$carrier->phone}}</a></td>
                                        <td><a href="https://maps.google.com/?q={{$carrier->address1}}" target="_blank">{{$carrier->address1}}</a></td>
                                        <td>{{$carrier->email}}</td>
                                        <td style="display: inline-flex;">
                                            <a title="edit" href="{{url(\App::make('currentCompany')->id.'/carriers/'.$carrier->id.'/edit')}}">
                                                <button type="button" class="btn btn-primary" aria-label="Left Align">
                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                </button>
                                            </a>
{{--                                            <form  style="margin-left: 5px;" action="{{ route('carriers.destroy', $carrier->id) }}" method="post">--}}
{{--                                                <input type="hidden" name="_method" value="delete">--}}
{{--                                                @csrf--}}
{{--                                                <input type="hidden" name="id" value="{{ $carrier->id }}">--}}
{{--                                                <button  title="delete" type="submit" onclick="return confirm('Are you sure to delete this carrier?')" class="btn btn-danger" name="destroy_device">--}}
{{--                                                    <span class="glyphicon glyphicon-trash"></span>--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Company</th>
                                    <th>MC#</th>
                                    <th>DOT#</th>
                                    <th>Status</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
