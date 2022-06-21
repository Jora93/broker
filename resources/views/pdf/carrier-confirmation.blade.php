@php
    $address1 = strtoupper($generalSetting->address1);
    $generalName = strtoupper($generalSetting->name);
@endphp

<div style="width: 100%">
    <table style="width: 100%; margin-top: 40px; table-layout: fixed; border-collapse: collapse;font-weight:bold; font-size:24px">
        <tr>
            <th style="border-bottom: 1px solid black;text-align: center">{{$generalSetting->name}}</th>
            <th style="border-bottom: 1px solid black;text-align: center">LOAD NO: #{{$load->id}}</th>
        </tr>
    </table>
    <table style="width: 100%; margin-top: 40px; table-layout: fixed; border-collapse: collapse;">
        <tr>
            <th><img src="{{public_path('assets/images/logo.jpeg')}}" width="200px" alt="Logo" ></th>
            <th style="border: 1px solid black;text-align: center">
                Please have driver call for dispatch. <br>
                Phone: {{$company->phone_one}} <br>
                Confirmation must be signed and <br>
                returned before driver can be dispatched. <br>
                MC: {{$company->mc_number}}
            </th>
        </tr>
    </table>
    <div style="clear: both; width: 100%; margin-top: 10px;">
        <span>{{$generalName}}</span> <br>
        <span>{{$address1}}</span>
    </div>
    <table style="width: 100%; margin-top: 40px; table-layout: fixed; border-collapse: collapse; font-size:10px">
        <tr>
            <th style="border-bottom: 1px solid black;text-align: left">Carrier: @if(isset($load->carrier)){{$load->carrier->company}}@endif</th>
            <th style="border-bottom: 1px solid black;text-align: left">Phone: @if(isset($load->carrier)){{$load->carrier->phone}}@endif</th>
            <th style="border-bottom: 1px solid black;text-align: left">MC# @if(isset($load->carrier)){{$load->carrier->mc_number}}@endif</th>
        </tr>
        <tr>
            <th style="border-bottom: 1px solid black;text-align: left">Contact: @if(isset($load->carrier)){{$load->carrier->email}}@endif</th>
            <th style="border-bottom: 1px solid black;text-align: left">Fax: @if(isset($load->carrier)){{$load->carrier->fax}}@endif</th>
            <th style="border-bottom: 1px solid black;text-align: left">DOT# @if(isset($load->carrier)){{$load->carrier->dot_number}}@endif</th>
        </tr>
    </table>
    <table style="width:100%; border: 1px solid black; border-collapse: collapse; margin-top: 40px;">
        <tr>
            <th style="border: 1px solid black; border-collapse: collapse;" colspan="3">LOAD CONFIRMATION AND PAYMENT AGREEMENT -- PLEASE SIGN & RETURN ASAP</th>
        </tr>
        <tr>
            <td style="border-collapse: collapse;">MILES:</td>
            <td style="border-collapse: collapse;">SIZE: {{$load->trailer_size}}</td>
            <td style="border-collapse: collapse;">Flat Rate: $ {{$load->carrier_costs_rate_per_unit}}</td>
        </tr>
        <tr>
            <td style="border-collapse: collapse;">'WEIGHT: {{$load->shipper_weight}} lbs</td>
            <td style="border-collapse: collapse;">TRAILER #:{{$load->trailer_number}}</td>
            <td style="border-collapse: collapse;">Total: ${{$load->carrier_costs_rate_per_unit}}</td>
        </tr>
        <tr>
            <td style="border-collapse: collapse;">EQUIPMENT: {{$load->carrier_equipment_id}}</td>
        </tr>
        <tr>
            <th style="border: 1px solid black; border-collapse: collapse;" colspan="3">Initial Pickup</th>
        </tr>
        <tr>
            <td style="border-collapse: collapse;"> {{$load->shipper_company}}</td>
            <td style="border-collapse: collapse;">Date: {{$load->shipper_pickup_date}}</td>
            <td style="border-collapse: collapse;">Product: {{$load->product}}</td>
        </tr>
        <tr>
            <td style="border-collapse: collapse;">{{$load->shipper_address1}}</td>
            <td style="border-collapse: collapse;">Time: {{$load->shipper_pickup_time_from}} - {{$load->shipper_pickup_time_to}}</td>
            <td style="border-collapse: collapse;">PO #: {{$load->purchase_order_number}}</td>
        </tr>
        <tr>
            <td style="border-collapse: collapse;"></td>
            <td style="border-collapse: collapse;"></td>
            <td style="border-collapse: collapse;">Weight: {{$load->shipper_weight}} lbs</td>
        </tr>
        <tr>
            <td style="border-collapse: collapse;" colspan="3">Pickup Note: {{$load->shipper_notes}}</td>
        </tr>
        @foreach($load->drops as $key => $drop)
            <tr>
                <th style="border: 1px solid black; border-collapse: collapse;" colspan="3">
                    @if($key == (count($load->drops) - 1 ))
                        Final Destination
                    @else
                        Stop #{{$key + 1}}
                    @endif
                </th>
            </tr>
            <tr>
                <td style="border-collapse: collapse;">{{$drop->company}}</td>
                <td style="border-collapse: collapse;" colspan="2">Product: {{$load->product}}</td>
            </tr>
            <tr>
                <td style="border-collapse: collapse;">{{$drop->address1}}</td>
                <td style="border-collapse: collapse;">Date: {{$drop->delivery_date}}</td>
                <td style="border-collapse: collapse;">PO #: {{$load->purchase_order_number}}</td>
            </tr>
            <tr>
                <td style="border-collapse: collapse;"></td>
                <td style="border-collapse: collapse;">Time: {{$drop->delivery_time_from}} - {{$drop->delivery_time_to}}</td>
                <td style="border-collapse: collapse;">Weight: {{$drop->delivery_location_weight}} lbs</td>
            </tr>
            <tr>
                <td style="border-collapse: collapse;"></td>
                <td style="border-collapse: collapse;">Delivery #:{{$drop->delivered_number}}</td>
                <td style="border-collapse: collapse;"></td>
            </tr>
            <tr>
                <td style="border-collapse: collapse;"></td>
                <td style="border-collapse: collapse;"></td>
                <td style="border-collapse: collapse;">Type:{{$drop->item_type}}</td>
            </tr>
            <tr>
                <td style="border-collapse: collapse;"></td>
                <td style="border-collapse: collapse;"></td>
                <td style="border-collapse: collapse;">BOL #:{{$drop->delivery_location_bol_number}}</td>
            </tr>
            <tr>
                <td style="border-collapse: collapse;" colspan="3">Delivery Note:{{$drop->delivery_location_notes}}</td>
            </tr>
        @endforeach
    </table>
    <div style="clear: both; width: 100%; margin-top: 50px;">
        <p style="font-weight: bold">NOTE:</p>
        {!!$generalSetting->confirmation_note!!}
    </div>

    <table style="width:100%; border-collapse: collapse; margin-top: 40px;">
        <tr>
            <td style="border-collapse: collapse;">BROKER SIGNATURE:</td>
            <td style="border-collapse: collapse; border-bottom: 1px solid black">{{$generalSetting->first_name}} {{$generalSetting->last_name}} {{$generalName}}</td>
        </tr>
        <tr>
            <td style="border-collapse: collapse;"></td>
            <td style="border-collapse: collapse;">{{$generalSetting->email}}</td>
        </tr>
        <tr>
            <td style="border-collapse: collapse;">CARRIER SIGNATURE:</td>
            <td style="border-collapse: collapse; border-bottom: 1px solid black"></td>
        </tr>
        <tr>
            <td style="border-collapse: collapse;"></td>
            <td style="border-collapse: collapse;">Please send bills to:</td>
        </tr>
        <tr>
            <td style="border-collapse: collapse;"></td>
            <td style="border-collapse: collapse;">{{$generalName}} {{$address1}}</td>
        </tr>
    </table>

</div>

