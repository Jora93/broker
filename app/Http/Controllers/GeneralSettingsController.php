<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Load;
use App\Constanats\UserRoles;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Http\Services\RateConPdf;
use App\Http\Services\InvoicePdf;
use PDF;
use Dompdf\Dompdf;
use \Mpdf\Mpdf;

class GeneralSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($company_id, $id)
    {
        return View('generalSettings.edit')->with(['generalSetting' => GeneralSetting::first()]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($company_id, Request $request)
    {
        $data = $request->all();
        if (Auth::user()->role === UserRoleConstants::SuperAdmin) {
            $generalSetting = GeneralSetting::first();
            $generalSetting->update($data);
        }

        return response()->json(['success' => 'Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pdf($company_id)
    {

        $company = Company::find($company_id);
        $generalSetting = GeneralSetting::first();
        $load  = Load::first(); //TODO dinamoc
        $pdf = new RateConPdf($load->id);
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('times', '', 14);
        $pdf->Cell(50, 25, 'LOGO');
        $pdf->SetFont('times', '', 10);

        $pdf->Cell(70, 25, '');
        $pdf->Cell(70, 5, 'Please have driver call for dispatch.', 'TLR', 1, 'C');
        $pdf->Cell(120, 25, '');
        $pdf->Cell(70, 5, 'Phone: '.$company->phone_one, 'LR', 1, 'C');
        $pdf->Cell(120, 25, '');
        $pdf->Cell(70, 5, 'Confirmation must be signed and', 'LR', 1, 'C');
        $pdf->Cell(120, 25, '');
        $pdf->Cell(70, 5, 'returned before driver can be dispatched.', 'LR', 1, 'C');
        $pdf->Cell(120, 25, '');
        $pdf->Cell(70, 5, 'MC: '.$company->mc_number, 'LRB', 1, 'C');

        $pdf->SetFont('times', '', 12);
        $pdf->Cell(70, 5, strtoupper($generalSetting->name), 0, 1);
        $pdf->MultiCell(70, 5, strtoupper($generalSetting->address1), 0);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();

        $pdf->Cell(15, 5, 'Carrier:', 0, 0);
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(50, 5, $load->carrier->company, 0, 0);
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(15, 5, 'Phone:', 0, 0);
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(80, 5, $load->carrier->phone, 0, 0);
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(15, 5, 'MC # ', 0, 0);
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(70, 5, $load->carrier->mc_number, 0, 0);
        $pdf->Ln();
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(15, 5, 'Contact:', 0, 0);
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(50, 5, '', 0, 0);
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(15, 5, 'Fax:', 0, 0);
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(80, 5, $load->carrier->fax, 0, 0);
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(15, 5, 'DOT # ', 0, 0);
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(70, 5, $load->carrier->dot_number, 0, 0);
        $pdf->Ln();
        $pdf->Ln();

        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(190, 5, 'LOAD CONFIRMATION AND PAYMENT AGREEMENT -- PLEASE SIGN & RETURN ASAP', 1, 0, 'C');
        $pdf->Ln();
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(70, 5, 'MILES:', "LT", 0);
        $pdf->Cell(70, 5, "SIZE: ".$load->trailer_size, "T", 0);
        $pdf->Cell(50, 5, '', "TR", 0);
        $pdf->Ln();
        $pdf->Cell(70, 5, 'WEIGHT: '.$load->shipper_weight.' lbs', "L", 0);
        $pdf->Cell(70, 5, "TRAILER #:".$load->trailer_number, 0, 0);
        $pdf->Cell(50, 5, 'Flat Rate: $'.$load->carrier_costs_rate_per_unit, "R", 0);
        $pdf->Ln();
        $pdf->Cell(70, 5, '', "L", 0);
        $pdf->Cell(70, 5, "", 0, 0);
        $pdf->Cell(50, 5, 'Total: $'.$load->carrier_costs_rate_per_unit, "R", 0);
        $pdf->Ln();
        $pdf->Cell(190, 5, 'EQUIPMENT: '.$load->carrier_equipment_id, "RLB", 0);
        $pdf->Ln();
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(190, 5, 'Initial Pickup', 1, 0);
        $pdf->Ln();
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(70, 5, $load->shipper_address1, "LTR", 0);
        $pdf->Cell(70, 5, "", "TR", 0);
        $pdf->Cell(50, 5, 'Product: '.$load->product, "TR", 0);
        $pdf->Ln();
        $pdf->Cell(70, 5, strtoupper($generalSetting->address1), "LR", 0);
        $pdf->Cell(70, 5, "Date: ".$load->shipper_pickup_date, "R", 0);
        $pdf->Cell(50, 5, 'PO #: '.$load->purchase_order_number, "R", 0);
        $pdf->Ln();
        $pdf->Cell(70, 5, '', "LR", 0);
        $pdf->Cell(70, 5, "Time: ".$load->shipper_pickup_time, "R", 0);
        $pdf->Cell(50, 5, 'Weight: '.$load->shipper_weight.' lbs', "R", 0);
        $pdf->Ln();
        $pdf->Cell(70, 5, '', "LRB", 0);
        $pdf->Cell(70, 5, "", "RB", 0);
        $pdf->Cell(50, 5, '', "RB", 0);

        $pdf->Ln();
        $pdf->MultiCell(190, 5, 'Pickup Note: '.$load->shipper_notes, 1);
        //todo drops loops
        $pdf->SetFont('times', 'B', 10);
        $pdf->Cell(190, 5, 'Final Destination', 1, 0);
        $pdf->Ln();
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(70, 5, $load->drops->first()->address1, "LTR", 0);
        $pdf->Cell(70, 5, "", "TR", 0);
        $pdf->Cell(50, 5, 'Product: '.$load->product, "TR", 0);
        $pdf->Ln();
        $pdf->Cell(70, 5, 'Inc.', "LR", 0);
        $pdf->Cell(70, 5, "Date: ".$load->drops->first()->delivery_date, "R", 0);
        $pdf->Cell(50, 5, 'PO #: '.$load->purchase_order_number, "R", 0);
        $pdf->Ln();
        $pdf->Cell(70, 5, strtoupper($generalSetting->address1), "LR", 0);
        $pdf->Cell(70, 5, "Time: ".$load->drops->first()->delivery_time, "R", 0);
        $pdf->Cell(50, 5, 'Weight: '.$load->shipper_weight.' lbs', "R", 0);
        $pdf->Ln();
        $pdf->Cell(70, 5, '', "LR", 0);
        $pdf->Cell(70, 5, "Delivery #:".$load->drops->first()->delivered_number, "R", 0);
        $pdf->Cell(50, 5, '', "R", 0);
        $pdf->Ln();
        $pdf->Cell(70, 5, '', "LR", 0);
        $pdf->Cell(70, 5, "", "R", 0);
        $pdf->Cell(50, 5, 'Type:'.$load->drops->first()->item_type, "R", 0);
        $pdf->Ln();
        $pdf->Cell(70, 5, '', "LRB", 0);
        $pdf->Cell(70, 5, "", "RB", 0);
        $pdf->Cell(50, 5, 'BOL #:'.$load->drops->first()->delivery_location_bol_number, "RB", 0);
        $pdf->Ln();
        $pdf->Cell(190, 5, 'Delivery Note:'.$load->drops->first()->delivery_location_notes, 1, 0);

        $pdf->AddPage();
        $pdf->SetFont('times', 'B', 14);
        $pdf->Cell(190, 5, 'Note:', 0, 'C');
        $pdf->SetFont('times', '', 14);
        $pdf->Ln();
        $pdf->WriteHTML($generalSetting->confirmation_note);

        $pdf->Ln();
        $pdf->Ln();
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(40, 5, 'BROKER SIGNATURE:', 0, 0);
        $pdf->Cell(70, 5, $generalSetting->first_name.' '.$generalSetting->last_name.', '.strtoupper($generalSetting->name), 'B', 0);
        $pdf->Cell(40, 5, 'CARRIER SIGNATURE:', 0, 0);
        $pdf->Cell(40, 5, '', 'B', 0);
        $pdf->Ln();
        $pdf->Cell(40, 5, '', 0, 0);
        $pdf->Cell(70, 5, $generalSetting->email, 0, 0);
        $pdf->Cell(40, 5, '', 0, 0);
        $pdf->Cell(40, 5, 'Please send bills to:', 0);
        $pdf->Ln();
        $pdf->Cell(40, 5, '', 0, 0);
        $pdf->Cell(70, 5, '', 0, 0);
        $pdf->Cell(40, 5, '', 0, 0);
        $pdf->MultiCell(40, 5, strtoupper($generalSetting->name).' '.strtoupper($generalSetting->address1), 0);
        $pdf->Ln();

        $pdf->Output();
    }

    public function invoice ($company_id)
    {
        $mpdf = new \Mpdf\Mpdf();
        $img = public_path('assets/images/logo.png');
        $company = Company::find($company_id);
        $generalSetting = GeneralSetting::first();
        $load  = Load::first(); //TODO dinamoc
        $html = view('pdf.invoice', compact(['load', 'generalSetting', 'company']))->render();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
//
////        $pdf = \App::make('dompdf.wrapper');
////        $pdf->loadHTML('<h1>Test</h1>');
//        $company = Company::find($company_id);
//        $generalSetting = GeneralSetting::first();
//        $load  = Load::first(); //TODO dinamoc
//
//        $data = Load::all();
//        view()->share('load',$load);
//        view()->share('generalSetting',$generalSetting);
//        view()->share('company',$company);
//        $pdf = PDF::loadView('pdf.invoice', [$load, $generalSetting, $company]);
//        return $pdf->stream();
    }
}
