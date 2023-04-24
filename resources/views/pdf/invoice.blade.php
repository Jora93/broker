<div style="width: 100%">
    <div style="clear: both; width: 100%; ;">
        <div style="float: left;;  width: 40%">
            <img src="{{public_path($company->logo)}}" alt="Logo" ><br>
            <b>{{$company->address}} {{$company->zip_code}} {{$company->city}} {{$company->state}}</b>
            <br>
            <br>
            <br>
            <br>
            <b>Bill to:</b>
            <br>
            <br>
            <b>{{$load->customer->company}}</b>
            <div>
                <h3><b>{{$load->customer->billing_address1}}</b></h3>
            </div>
        </div>
        <div style="float: right; text-align: right; ;  width: 59%">
            <h2><b>FREIGHT INVOICE</b></h2>
            <h3><b>LOAD # {{$load->id}}</b></h3> {{-- avelacnel loadi mej 'invoice load# field'--}}
            <h3><b>INVOICE # {{$load->invoice_number}}</b></h3> {{-- invoice id avelanuma create aneluc heto--}}
            <p>(Please reference Invoice Number when paying invoice)</p>
            <h3>INVOICE DATE: {{str_replace('-', '/', $load->invoice_date)}} </h3>
{{--            <h3>PAST DUE INVOICE DATE: @if(is_null($load->invoice_past_due_date)) {{str_replace('-', '/', $load->invoice_date)}} @else {{str_replace('-', '/', $load->invoice_past_due_date)}} @endif</h3>--}}
            <h3>SHIP DATE: {{str_replace('-', '/', $load->shipper_pickup_date)}}</h3>
            <h3>PURCHASE ORDER #{{$load->purchase_order_number}}</h3>
        </div>
    </div>
    <div style="width: 720px">
        <table style="width: 100%; margin-top: 40px; table-layout: fixed; border-collapse: collapse;">
            <tr>
                <th style="border: 1px solid black; text-align: center; padding: 5px">ORIGIN</th>
                <th style="border: 1px solid black; text-align: center; padding: 5px">DESTINATION</th>
            </tr>
            <tr>
                <td style="border: 1px solid black; text-align: center; padding: 5px">{{$load->shipper_address1}} {{$load->shipper_city}}, {{$load->shipper_zip_code}} {{$load->shipper_state}}</td>
                <td style="border: 1px solid black; text-align: center; padding: 5px">{{$load->drops->last()->address1}} {{$load->drops->last()->city}}, {{$load->drops->last()->zip_code}} {{$load->drops->last()->state}}</td>
            </tr>
            <tr>
                <td colspan="2" style="border: 1px solid black; padding: 5px"><b>Note:</b></td>
            </tr>
        </table>
    </div>
    <div style="width: 720px; margin-top: 20px">
        <table style="width: 100%; margin-top: 0px; table-layout: fixed; border-collapse: collapse;">
            <tr style="background-color: #dddddd">
                <th style="border: 1px solid black; text-align: center; padding: 5px">DESCRIPTION / WORK PERFORMED</th>
                <th style="border: 1px solid black; text-align: center; padding: 5px">QTY</th>
                <th style="border: 1px solid black; text-align: center; padding: 5px">RATE</th>
                <th style="border: 1px solid black; text-align: center; padding: 5px">CHARGES</th>
            </tr>
            <tr>
                <td style="border: 1px solid black; text-align: center; padding: 5px"><b>Flat Rate</b></td>
                <td style="border: 1px solid black; text-align: center; padding: 5px">1.0</td>
                <td style="border: 1px solid black; text-align: center; padding: 5px">${{number_format($load->customer_costs_rate_per_unit, 2)}}</td>
                <td style="border: 1px solid black; text-align: center; padding: 5px">${{number_format($load->customer_costs_rate_per_unit, 2)}}</td>
            </tr>
            <tr>
                <td colspan="3" style="border: 1px solid black; text-align: right; padding: 5px"><b>Total Charges:</b></td>
                <td style="border: 1px solid black; text-align: center; padding: 5px">${{number_format($load->customer_costs_rate_per_unit, 2)}}</td>
            </tr>
            <tr>
                <td colspan="2" style="border: 1px solid black; text-align: center; padding: 5px">
                    <b>Terms: Net payable in 30 days</b>
                </td>
                <td style="border: 1px solid black; text-align: right; padding: 5px"><b>Total Due:</b></td>
                <td style="border: 1px solid black; text-align: center">${{number_format($load->customer_costs_rate_per_unit, 2)}}</td>
            </tr>
        </table>
    </div>
    <div style="color: red">
        <h2><b>Please make check payable to:</b></h2>
        <b>{{$company->address}} {{$company->zip_code}} {{$company->city}} {{$company->state}}</b>
    </div>
</div>

