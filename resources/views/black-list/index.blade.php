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
                        <a style="float: right;" href="{{url(\App::make('currentCompany')->id).'/black-list/create'}}" title="create new">
                            <button type="button" class="btn btn-primary" aria-label="Left Align">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                        </a>
                    </div>

                    <form method="get" action="{{ url(\App::make('currentCompany')->id.'/black-list-search') }}">
                        <div class="row col-sm-12">
                            @csrf
                            <div class="col-sm">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input placeholder="Company name" type="text" class="form-control" name="name" value="@if(isset($data['name'])){{$data['name']}}@endif"/>
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
                                <th></th>
                                <th>ID</th>
                                <th>name</th>
                                <th>MC#</th>
                                <th>Note</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    <td style="width: 140px;">
{{--                                        <a title="edit" href="{{url(\App::make('currentCompany')->id.'/black-list/'.$item->id.'/edit')}}">--}}
{{--                                            <button type="button" class="btn btn-primary" aria-label="Left Align">--}}
{{--                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>--}}
{{--                                            </button>--}}
{{--                                        </a>--}}
                                        <form action="{{url(\App::make('currentCompany')->id.'/black-list/'.$item->id)}}" method="post">
                                            <input class="btn btn-default" type="submit" value="Delete" />
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->mc_number}}</td>
                                    <td>{{$item->note}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if(isset($data))
                            {{ $list->appends($data)->links() }}
                        @else
                            {{ $list->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
