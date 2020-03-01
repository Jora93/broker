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
                    <div class="card-header">Edit Customer</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{route('customers.update', $customer->id)}}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label>Company</label>
                                <input name="company" value="{{$customer->company}}" type="text" class="form-control" placeholder="Company name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" name="status" value="{{$customer->status}}">
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" value="{{$customer->phone}}" type="text" class="form-control" placeholder="Phone Number" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input name="address" value="{{$customer->address}}" type="text" class="form-control" placeholder="Address" required>
                            </div>
                            <div class="form-group">
                                <label>Product</label>
                                <input name="product" value="{{$customer->product}}" type="text" class="form-control" placeholder="Product" required>
                            </div>
                            <div class="form-group">
                                <label>Currency</label>
                                <input name="currency" value="{{$customer->currency}}" type="text" class="form-control" placeholder="Currency" required>
                            </div>
                            <div class="form-group">
                                <label>Credit Limit</label>
                                <input name="creditLimit" value="{{$customer->creditLimit}}" type="number" class="form-control" placeholder="Credit Limit" required>
                            </div>
                            <div class="form-check" style="padding: 0 0 21px 0;">
                                <input name="smartWayCarriersPreferred" @if($customer->smartWayCarriersPreferred) checked="checked" @endif type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1" style="padding-left: 20px;">Smart Way Carriers Preferred</label>
                            </div>
                            <div class="form-group">
                                <label>Billing Company</label>
                                <input name="billingCompany" value="{{$customer->billingCompany}}" type="text" class="form-control" placeholder="Billing Company Name" required>
                            </div>
                            <div class="form-group">
                                <label>Billing Phone</label>
                                <input name="billingPhone" value="{{$customer->billingPhone}}" type="text" class="form-control" placeholder="Billing Phone Number" required>
                            </div>
                            <div class="form-group">
                                <label>Billing Address</label>
                                <input name="billingAddress" value="{{$customer->billingAddress}}" type="text" class="form-control" placeholder="Billing Address" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
