<div style="width: 540px">
    <div style="clear: both; width: 100%">
        <div style="float: left">
            <h1>LOGO</h1>
            <div style="width: 30%">
                {{$generalSetting->address1}}
            </div>
            <p>P: {{$company->phone_one}}</p>
            <p>MC # SCAC #</p>
            <b>AXLE LOGISTICS LLC</b>
            <div style="width: 30%">
                <h3><b>520 W SUMMIT HILL DRIVE SUITE 1005 KNOXVILLE, TN 37902</b></h3>
            </div>
        </div>
        <div style="float: right; text-align: right">
            <h1><b>FREIGHT INVOICE</b></h1>
            <h2><b>LOAD # 20660</b></h2>
            <h2><b>INVOICE # 1588</b></h2>
            <p>(Please reference Invoice Number when paying invoice)</p>
            <h2>INVOICE DATE: 01/11/2021</h2>
            <h2>SHIP DATE: 01/07/2021</h2>
            <h2>PURCHASE ORDER #0327247</h2>
        </div>
    </div>
    <div style="width: 720px; margin-top: 400px">
        <table style="width: 100%; margin-top: 400px; table-layout: fixed; border-collapse: collapse;">
            <tr>
                <th style="border: 1px solid black; text-align: center">ORIGIN</th>
                <th style="border: 1px solid black; text-align: center">DESTINATION</th>
            </tr>
            <tr>
                <td style="border: 1px solid black; text-align: center">Coriscana 970 S Lake ST Aurora , IL 60506</td>
                <td style="border: 1px solid black; text-align: center">MAttress Supercenter 4347 Merle Hay Rd Ste 17 Des Moines, IA 50310</td>
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
                <td style="border: 1px solid black; text-align: center">$1,500.00</td>
                <td style="border: 1px solid black; text-align: center">$1,500.00</td>
            </tr>
            <tr>
                <td colspan="3" style="border: 1px solid black; text-align: right"><b>Total Charges:</b></td>
                <td style="border: 1px solid black; text-align: center">$1,500.00</td>
            </tr>
            <tr>
                <td colspan="3" style="border: 1px solid black; text-align: right">
                    <b>PAST DUE: PLEASE PAY IMMEDIATELY   Total Due:</b>
                </td>
                <td style="border: 1px solid black; text-align: center">$1,500.00</td>
            </tr>
        </table>
    </div>
    <div style="color: red">
        <h2><b>Please make check payable to:</b></h2>
        <h3>{{$generalSetting->address1}}</h3>
    </div>
</div>

{{--<img src="{{public_path('assets/images/logo.png')}}" alt="Logo" height="75px">--}}
