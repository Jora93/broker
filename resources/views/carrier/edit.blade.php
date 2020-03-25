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
                    <div class="card-header">Edit Carrier</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{route('carriers.update', $carrier->id)}}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label>Company</label>
                                <input name="company" value="{{$carrier->company}}" type="text" class="form-control" placeholder="Company name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" name="status"  value="{{$carrier->status}}">
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone"  value="{{$carrier->phone}}" type="text" class="form-control" placeholder="Phone Number" required>
                            </div>
                            <div class="form-group">
                                <label>Fax</label>
                                <input name="fax"  value="{{$carrier->fax}}" type="text" class="form-control" placeholder="Fax Number">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input name="address"  value="{{$carrier->address}}" type="text" class="form-control" placeholder="Address" required>
                            </div>
                            <div class="form-group">
                                <label>Currency</label>
                                <input name="currency"  value="{{$carrier->currency}}" type="text" class="form-control" placeholder="Currency" required>
                            </div>
                            <div class="form-group">
                                <label>Payee Company</label>
                                <input name="payeeCompany"  value="{{$carrier->payeeCompany}}" type="text" class="form-control" placeholder="Payee Company" required>
                            </div>
                            <div class="form-group">
                                <label>Payee Phone</label>
                                <input name="payeePhone"  value="{{$carrier->payeePhone}}" type="text" class="form-control" placeholder="Payee Phone">
                            </div>
                            <div class="form-group">
                                <label>Payee Address</label>
                                <input name="payeeAddress"  value="{{$carrier->payeeAddress}}" type="text" class="form-control" placeholder="Payee Address" required>
                            </div>
                            <div class="form-group">
                                <label>MC Number</label>
                                <input name="mcNumber"  value="{{$carrier->mcNumber}}" type="text" class="form-control" placeholder="Payee Address" required>
                            </div>
                            <div class="form-group">
                                <label>Dot Number</label>
                                <input name="dotNumber"  value="{{$carrier->dotNumber}}" type="number" class="form-control" placeholder="MC Number" required>
                            </div>
                            <div class="form-check" style="padding: 0 0 21px 0;">
                                <input name="preferredCarrierStatus" @if($carrier->preferredCarrierStatus) checked="checked" @endif type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1" style="padding-left: 20px;">Preferred Carrier Status</label>
                            </div>
                            <div class="form-check" style="padding: 0 0 21px 0;">
                                <input name="smartwayCertified" @if($carrier->smartwayCertified) checked="checked" @endif type="checkbox" class="form-check-input" id="exampleCheck2">
                                <label class="form-check-label" for="exampleCheck2" style="padding-left: 20px;">Smartway Certified</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
