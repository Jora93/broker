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

    <div class="row customer-create col-sm-12">
        <form method="post" action="{{url(\App::make('currentCompany')->id).'/dispatchers'}}" class="col-sm-12">
        @csrf
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label" for="full_name">*Full Name</label>
                <input class="form-control" required placeholder="Enter Dispatcher Full Name" type="text" name="full_name" value="{{old('full_name')}}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label" for="email">*Email</label>
                <input class="form-control" required placeholder="Enter Dispatcher Email" type="email" name="email" value="{{old('email')}}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Dispatcher</button>
            </div>
        </div>
        </form>
    </div>
@endsection
