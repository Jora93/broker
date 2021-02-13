@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 100%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Dispatcher List</span>
                        <a style="float: right;" href="{{route('dispatchers.create')}}" title="create new">
                            <button type="button" class="btn btn-primary" aria-label="Left Align">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                        </a>
                    </div>
                    <form method="get" action="{{ url('/dispatcher-search') }}">
                        <div class="row col-sm-12">
                            @csrf
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="load_number">Name#:</label>
                                    <input placeholder="Dispatcher Name" type="text" class="form-control" name="id" value="@if(isset($data['full_name'])){{$data['full_name']}}@endif"/>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="customer">Email:</label>
                                    <input placeholder="Customer" type="text" class="form-control" name="customer" value="@if(isset($data['email'])){{$data['email']}}@endif"/>
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!$dispatchers->isEmpty())
                                        @foreach($dispatchers as $dispatcher)
                                            <tr>
                                                <th scope="row">
                                                    {{$dispatcher->id}}
                                                </th>
                                                <td>{{$dispatcher->full_name}}</td>
                                                <td>{{$dispatcher->email}}</td>
                                                <td>
                                                    <a title="edit" href="{{url('/dispatchers/'.$dispatcher->id.'/edit')}}">
                                                        <button type="button" class="btn btn-primary" aria-label="Left Align">
                                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if(!$dispatchers->isEmpty())
                                @if(isset($data))
                                    {{ $dispatchers->appends($data)->links() }}
                                @else
                                    {{ $dispatchers->links() }}
                                @endif
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
