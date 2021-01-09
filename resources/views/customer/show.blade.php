@extends('layouts.app')

@section('content')
    <div class="col-md-12 customers-show">
        <a style="padding: 15px" title="edit" href="{{route('customers.edit', $customer->id)}}">
            <button type="button" class="btn btn-primary" aria-label="Left Align">
                Edit Customer <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            </button>
        </a><br><br>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item col-sm-2 customer-tab">
                <a class="nav-link active" id="customer-tab" data-toggle="tab" href="#customer" role="tab" aria-controls="customer" aria-selected="true">Customer</a>
            </li>
            <li class="nav-item col-sm-2 documents-tab">
                <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents" aria-selected="false">Documents</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="customer" role="tabpanel" aria-labelledby="customer-tab">
                <div id="customer" class="tabcontent" style="display: block;">
                    <div class="row">
                        <!-- Company Information -->
                        <div class="col-md-8">
                            <div class="tab-item">
                                <div class="card">
                                    <div class="card-header">Company Information</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Company</div>
                                                    <div class="entityValue">{{$customer->company}}</div>
                                                </div>
                                            </div>
                                            <br><br><br>
                                            <div class="col-md-4">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Status</div>
                                                    <div class="entityValue">{{$customer->status}}</div>
                                                </div>
                                            </div>
                                            <br><br><br>
                                            <div class="col-md-4">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Phone</div>
                                                    <div class="entityValue"><a href="tel:{{$customer->phone}}">{{$customer->phone}}</a></div>
                                                </div>
                                            </div>
                                            <br><br><br>
                                            <div class="col-md-4">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Address</div>
                                                    <div class="entityValue"><a href="https://maps.google.com/?q={{$customer->address1}}" target="_blank">{{$customer->address1}}</a></div>
                                                </div>
                                            </div>
                                            <br><br><br>
                                            <div class="col-md-4">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Credit Limit</div>
                                                    <div class="entityValue">${{$customer->credit_limit}}</div>
                                                </div>
                                            </div>
                                            <br><br><br>
                                            <div class="col-md-4">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Currency</div>
                                                    <div class="entityValue">USD</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Notes -->
                            <div class="tab-item">
                                <div class="card">
                                    <div class="card-header">Notes</div>
                                    <div class="card-body">
                                        {{$customer->note}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Billing Information -->
                            <div class="tab-item">
                                <div class="card">
                                    <div class="card-header">Billing Information</div>
                                    <div class="card-body">
                                        <div class="row"><div class="col-md-6">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Company</div>
                                                    <div class="entityValue">{{$customer->billing_company}}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Address</div>
                                                    <div class="entityValue"><a href="https://maps.google.com/?q={{$customer->billing_address1}}" target="_blank">{{$customer->billing_address1}}</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                <div class="tabcontent" style="display: block;">
                    <div class="row">
                        <div class="col-md-8 tab-item">
                            <!-- Company Information -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div>Documents</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a class="actionLink" style="padding-right: 5px" href="/documents/191644/download">
                                                        <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                                                    </a>
                                                    <a class="actionLink" style="padding-right: 5px" href="/documents/191644/print" target="_blank">
                                                        <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                                                    </a>
                                                    <a href="/documents/191644"> Setup (1) (2).pdf</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
