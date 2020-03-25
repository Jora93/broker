@extends('layouts.app')

@section('content')
    <div class="col-md-12 customers-show">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item col-sm-2 customer-tab">
                <a class="nav-link active" id="customer-tab" data-toggle="tab" href="#customer" role="tab" aria-controls="customer" aria-selected="true">Customer</a>
            </li>
            <li class="nav-item col-sm-2 documents-tab">
                <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents" aria-selected="false">Documents</a>
            </li>
            <li class="nav-item col-sm-2 notes-tab">
                <a class="nav-link" id="notes-tab" data-toggle="tab" href="#notes" role="tab" aria-controls="notes" aria-selected="false">Notes</a>
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
                                        <div class="row"><div class="col-md-4">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Company</div>
                                                    <div class="entityValue">1876 Logistics LLC</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Status</div>
                                                    <div class="entityValue">Active</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Phone</div>
                                                    <div class="entityValue"><a href="tel:(903) 980-1876">(903) 980-1876</a></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Address</div>
                                                    <div class="entityValue"><a href="https://maps.google.com/?q=5380 Old Bullard Rd Suite 600-112 Tyler , TX 75703" target="_blank">5380 Old Bullard Rd Suite 600-112<br>Tyler , TX 75703</a></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Shipper</div>
                                                    <div class="entityValue">No</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Consignee</div>
                                                    <div class="entityValue">No</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Credit Limit</div>
                                                    <div class="entityValue">$5000</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Currency</div>
                                                    <div class="entityValue">USD</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Product</div>
                                                    <div class="entityValue">general goods</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Smart Way Carriers Preferred</div>
                                                    <div class="entityValue">No</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Locations -->

                            <!-- Contacts -->

                            <!-- Preferred Carriers -->
                            <div class="tab-item">
                                <div class="card">
                                    <div class="card-header">Preferred Carriers</div>
                                    <div class="card-body">
                                        No preferred carriers
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
                                                    <div class="entityValue">1876 Logistics LLC</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Phone</div>
                                                    <div class="entityValue"><a href="tel:(903) 980-1876">(903) 980-1876</a></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Address</div>
                                                    <div class="entityValue"><a href="https://maps.google.com/?q=5380 Old Bullard Rd Suite 600-112 Tyler , TX 75703" target="_blank">5380 Old Bullard Rd Suite 600-112<br>Tyler , TX 75703</a></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="entityLabelValue">
                                                    <div class="entityLabel">Require PO # to Invoice</div>
                                                    <div class="entityValue">No</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Required Insurance -->

                            <!-- Reports -->
                            <div class="tab-item">
                                <div class="card">
                                    <div class="card-header">Reports</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4"><div class="entityLabelValue"><a href="/accounting/customers/aging?customer=20738-1876 Logistics LLC">Aging Detail</a></div></div>
                                            <div class="col-md-4"><div class="entityLabelValue"><a href="/loads/search/advanced/results?customers[]=20738-1876 Logistics LLC">Load History</a></div></div>
                                            <!--<div class="col-md-4"><div class="entityLabelValue"><a href="?customer=-"><nobr>Aging Summary</nobr></a></div></div>-->
                                            <div class="col-md-4"><div class="entityLabelValue"><a href="/accounting/customers/invoice_summary?customer=20738-1876 Logistics LLC">Invoice Status</a></div></div>
                                            <div class="col-md-4"><div class="entityLabelValue"><a href="/accounting/show_commissions_report?customers[]=20738&amp;single_customer=true&amp;status=Invoiced">Commissions Report</a></div></div>
                                            <div class="col-md-4"><div class="entityLabelValue"><a href="javascript:" onclick="showCustomerAgingSummary(20738, null, false, function(){});" id="aging-summary"><nobr>Aging Summary</nobr></a></div></div>
                                            <div class="col-md-4"><div class="entityLabelValue"><a href="/accounting/customers/sales_summary?customer=20738-1876 Logistics LLC"><nobr>Sales Summary</nobr></a></div></div>
                                            <div class="col-md-4"><div class="entityLabelValue"><a href="/accounting/customers/performance?customer=20738-1876 Logistics LLC">Performance</a></div></div>
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
                                                    <a href="/documents/191644">SGSH Setup (1) (2).pdf</a>
                                                </div>
                                                <div class="col-md-12">
                                                    <a class="actionLink" style="padding-right: 5px" href="/documents/191644/download">
                                                        <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                                                    </a>
                                                    <a class="actionLink" style="padding-right: 5px" href="/documents/191644/print" target="_blank">
                                                        <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                                                    </a>
                                                    <a href="/documents/191644">SGSH Setup (1) (2).pdf</a>
                                                </div>
                                                <div class="col-md-12">
                                                    <a class="actionLink" style="padding-right: 5px" href="/documents/191644/download">
                                                        <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                                                    </a>
                                                    <a class="actionLink" style="padding-right: 5px" href="/documents/191644/print" target="_blank">
                                                        <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                                                    </a>
                                                    <a href="/documents/191644">SGSH Setup (1) (2).pdf</a>
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
            <div class="tab-pane fade" id="notes" role="tabpanel" aria-labelledby="notes-tab">
{{--                TODO--}}
            </div>
        </div>
    </div>
@endsection
