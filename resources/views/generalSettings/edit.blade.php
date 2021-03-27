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
                        <span>General Settings</span>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <h1>Confirmation Note</h1>
                            <div id="confirmationNoteEditor">
                                {!! $generalSetting->confirmation_note !!}
                            </div>
                            <button class="btn btn-success" type="submit" id="confirmationNoteEditorSubmit">
                                <i class="glyphicon glyphicon-floppy-saved"></i> &nbsp;Save Confirmation Note
                            </button>
                        </div>
                        <hr style="clear: both;">
                        <div class="col-md-12">
                            <h1>Rate Quote Terms & Conditions</h1>
                            <div id="rateQuoteTCEditor">
                                {!! $generalSetting->rate_quote_terms_conditions !!}
                            </div>
                            <button class="btn btn-success" type="submit" id="rateQuoteTCEditorSubmit">
                                <i class="glyphicon glyphicon-floppy-saved"></i> &nbsp;Save RQ Terms & Conditions
                            </button>
                        </div>
                        <hr style="clear: both;">
                        <div class="col-md-12">
                            <h1>Bill of Lading Terms & Conditions</h1>
                            <div id="BOLEditor">
                                {!! $generalSetting->bill_of_lading_terms_conditions !!}
                            </div>
                            <button class="btn btn-success" type="submit" id="BOLEditorSubmit">
                                <i class="glyphicon glyphicon-floppy-saved"></i> &nbsp;Save BOL Terms & Conditions
                            </button>
                        </div>
                        <hr style="clear: both;">
                        <div class="col-md-12">
                            <h1>Invoice Terms & Conditions</h1>
                            <div id="invoiceEditor">
                                {!! $generalSetting->invoice_terms_conditions !!}
                            </div>
                            <button class="btn btn-success" type="submit" id="invoiceEditorSubmit">
                                <i class="glyphicon glyphicon-floppy-saved"></i> &nbsp;Save Invoice Terms & Conditions
                            </button>
                        </div>
                        <hr style="clear: both;">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
