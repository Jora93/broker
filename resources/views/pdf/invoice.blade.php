<div style="width: 100%">
    <div style="clear: both; width: 100%; ;">
        <div style="float: left;;  width: 40%">
            {{-- <img src="{{public_path('assets/images/logo.png')}}" alt="Logo" ><br> --}}
            <b>{{$load->customer->company}}</b>
            <div>
                <h3><b>{{$load->customer->address1}}</b></h3>
            </div>
        </div>
        <div style="float: right; text-align: right; ;  width: 59%">
            <h1><b>FREIGHT INVOICE</b></h1>
            <h2><b>LOAD # 20660</b></h2> {{-- avelacnel loadi mej 'invoice load# field'--}}
            <h2><b>INVOICE # 1588</b></h2> {{-- invoice id avelanuma create aneluc heto--}}
            <p>(Please reference Invoice Number when paying invoice)</p>
            <h2>INVOICE DATE: 01/11/2021</h2> {{-- create invoice date --}}
            <h2>SHIP DATE: {{$load->shipper_pickup_date}}</h2>
            <h2>PURCHASE ORDER #{{$load->purchase_order_number}}</h2>
        </div>
    </div>
    <div style="width: 720px">
        <table style="width: 100%; margin-top: 40px; table-layout: fixed; border-collapse: collapse;">
            <tr>
                <th style="border: 1px solid black; text-align: center">ORIGIN</th>
                <th style="border: 1px solid black; text-align: center">DESTINATION</th>
            </tr>
            <tr>
                <td style="border: 1px solid black; text-align: center">{{$load->shipper_pickup_adress1}}</td>
                <td style="border: 1px solid black; text-align: center">{{$load->drops->last()->address1}}</td>
            </tr>
            <tr>
                <td colspan="2" style="border: 1px solid black">Note:</td>
            </tr>
        </table>
    </div>
    <div style="width: 720px; margin-top: 20px">
        <table style="width: 100%; margin-top: 0px; table-layout: fixed; border-collapse: collapse;">
            <tr style="background-color: #dddddd">
                <th style="border: 1px solid black; text-align: center">DESCRIPTION / WORK PERFORMED</th>
                <th style="border: 1px solid black; text-align: center">QTY</th>
                <th style="border: 1px solid black; text-align: center">RATE</th>
                <th style="border: 1px solid black; text-align: center">CHARGES</th>
            </tr>
            <tr>
                <td style="border: 1px solid black; text-align: center"><b>Flat Rate</b></td>
                <td style="border: 1px solid black; text-align: center">1.0</td>
                <td style="border: 1px solid black; text-align: center">${{$load->value}}</td>
                <td style="border: 1px solid black; text-align: center">${{$load->value}}</td>
            </tr>
            <tr>
                <td colspan="3" style="border: 1px solid black; text-align: right"><b>Total Charges:</b></td>
                <td style="border: 1px solid black; text-align: center">${{$load->value}}</td>
            </tr>
            <tr>
                <td colspan="3" style="border: 1px solid black; text-align: right">
                    <b>PAST DUE: PLEASE PAY IMMEDIATELY   Total Due:</b>
                </td>
                <td style="border: 1px solid black; text-align: center">${{$load->value}}</td>
            </tr>
        </table>
    </div>
    <div style="color: red">
        <h2><b>Please make check payable to:</b></h2>
    </div>
</div>

