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
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    @endif
    <div class="container" style="max-width: 100%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Company Profile</span>
                    </div>
                    <div class="col-md-9">
                        <form method="POST"  enctype="multipart/form-data" action="{{url(\App::make('currentCompany')->id.'/companies/'.$company->id)}}">
                            @method('PATCH')
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyInput">Name *</label>
                                    <input required="required" type="text" class="form-control focusOnLoad" name="name" placeholder="Enter the name of the company" value="{{$company->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyInput">MC# *</label>
                                    <input required="required" type="text" class="form-control focusOnLoad" name="mc_number" placeholder="Enter the MC# of the company" value="{{$company->mc_number}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyInput">Phone 1 *</label>
                                    <input required="required" type="text" class="form-control focusOnLoad" name="phone_one" placeholder="Enter the phone# of the company" value="{{$company->phone_one}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyInput">address *</label>
                                    <input type="text" class="form-control focusOnLoad" name="address" placeholder="Enter the address of the company" value="{{$company->address}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyInput">Invoice last Number *</label>
                                    <input type="text" class="form-control focusOnLoad" name="invoice_last_number" value="{{$company->invoice_last_number}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyInput">Load last Number *</label>
                                    <input type="text" class="form-control focusOnLoad" name="load_last_number" value="{{$company->load_last_number}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyInput">Invite Carrier Link</label>
                                    <input type="text" class="form-control focusOnLoad" disabled name="" value="{{env('APP_URL')}}/invite-carrier/{{$company->invite_alias}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logoInput">Upload Company Logo</label>
                                    <input type="file" id="logoInput" name="logo">
                                </div>
                            </div>
                            <hr style="clear: both;">
                            <button class="btn btn-success" type="submit">
                                <i class="glyphicon glyphicon-floppy-saved"></i> &nbsp;Save Changes
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
