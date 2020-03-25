@extends('layouts.app')

@section('content')
    <div class="col-md-12 carriers-show">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item col-sm-2 carrier-tab">
                <a class="nav-link active" id="carrier-tab" data-toggle="tab" href="#carrier" role="tab" aria-controls="carrier" aria-selected="true">Carrier</a>
            </li>
            <li class="nav-item col-sm-2 documents-tab">
                <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents" aria-selected="false">Documents</a>
            </li>
            <li class="nav-item col-sm-2 notes-tab">
                <a class="nav-link" id="notes-tab" data-toggle="tab" href="#notes" role="tab" aria-controls="notes" aria-selected="false">Notes</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="carrier" role="tabpanel" aria-labelledby="carrier-tab">
                <div class="tabcontent" style="display: block;">
                    <div class="row">
                        <div class="col-md-8 tab-item">
                            <!-- Company Information -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div>Company Information</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Company</div>
                                                        <div class="entityValue">10-4 Logistics LLC</div>
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
                                                        <div class="entityValue">
                                                            <a href="tel:(704) 222-9028">(704) 222-9028</a></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Address</div>
                                                        <div class="entityValue">
                                                            <a href="https://maps.google.com/?q=8712 Mill Grove Rd Indian Trial , NC 28079" target="_blank">8712 Mill Grove Rd<br>Indian Trial , NC 28079</a>
                                                        </div>
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
                                                        <div class="entityLabel">Preferred Carrier Status</div>
                                                        <div class="entityValue">No</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">SmartWay Certificate</div>
                                                        <div class="entityValue">No</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Clean Air Compliant(CARB)</div>
                                                        <div class="entityValue">No</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Insurance Policies -->
                            <div class="row insurance-policy">
                                <div class="col-md-12 tab-item">
                                    <div class="card">
                                        <div class="card-header">
                                            <div>Insurance Policies</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Type</th>
                                                        <th>Amount</th>
                                                        <th>Eff. Date</th>
                                                        <th>Exp. Date</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="tableAction fa fa-list-alt" title="View insurance policy details" onclick="showCarrierInsurancePolicyDetailsDialog(0)"></span>
                                                        </td>
                                                        <td>General Liability</td>
                                                        <td>$1,000,000.00</td>
                                                        <td></td>
                                                        <td>12/05/2019</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="tableAction fa fa-list-alt" title="View insurance policy details" onclick="showCarrierInsurancePolicyDetailsDialog(1)"></span>
                                                        </td>
                                                        <td>Cargo</td>
                                                        <td>$100,000.00</td>
                                                        <td></td>
                                                        <td>12/05/2019</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Contacts -->
                        </div>

                        <div class="col-md-4 tab-item">

                            <!-- Payee Information -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div>Payee Information</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Phone</div>
                                                        <div class="entityValue">
                                                            <a href="tel:(704) 222-9028">(704) 222-9028</a></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">Address</div>
                                                        <div class="entityValue">
                                                            <a href="https://maps.google.com/?q=8712 Mill Grove Rd Indian Trial , NC 28079" target="_blank">8712 Mill Grove Rd<br>Indian Trial , NC 28079</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row tab-item">
                                <div class="col-md-12">
                                    <!-- Licenses & Certificates -->
                                    <div class="card">
                                        <div class="card-header">
                                            <div>Licenses &amp; Certificates</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">MC #</div>
                                                        <div class="entityValue">966310</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="entityLabelValue">
                                                        <div class="entityLabel">DOT #</div>
                                                        <div class="entityValue">2879288</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Carrier Equipment -->

                                    <!-- Reports -->
                                    <div class="row tab-item">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div>Reports</div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="entityLabelValue">
                                                                <a href="/loads/search/advanced/results?carriers%5B%5D=93348-10-4+Logistics+LLC">Load History</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="entityLabelValue">
                                                                <a href="/accounting/carriers/performance?carrier=93348-10-4+Logistics+LLC">Performance</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="entityLabelValue">
                                                                <a href="/accounting/carriers/payment_history?carrier=93348-10-4+Logistics+LLC">
                                                                    <nobr>Payment History</nobr>
                                                                </a></div>
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
