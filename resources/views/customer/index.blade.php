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
    <div class="container">
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

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company</th>
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
                                        <td>{{$currency}}@php echo number_format( $customer->credit_limit, 2 )@endphp</td>
                                        <td>{{$customer->phone}}</td>
                                        <td>{{$customer->status}}</td>
                                        <td>
                                            <a title="edit" href="{{url(\App::make('currentCompany')->id.'/customers/'.$customer->id.'/edit')}}">
                                                <button type="button" class="btn btn-primary" aria-label="Left Align">
                                                    Edit <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                </button>
                                            </a>
{{--                                            <form action="{{ route('customers.destroy', $customer->id) }}" method="post">--}}
{{--                                                <input type="hidden" name="_method" value="delete">--}}
{{--                                                @csrf--}}
{{--                                                <input type="hidden" name="id" value="{{ $customer->id }}">--}}
{{--                                                <button  title="delete" type="submit" onclick="return confirm('Are you sure to delete this customer?')" class="btn btn-danger" name="destroy_device">--}}
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
                                    <th>CreditLimit</th>
                                    <th>Product</th>
                                    <th>Status</th>
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
