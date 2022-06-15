<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Load;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->role === \App\Constanats\UserRoles::SuperAdmin) {
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

    public function createCarrierConfirmation($company_id, $load_id)
    {
        $mpdf = new \Mpdf\Mpdf();

        $company = Company::find($company_id);
        $generalSetting = GeneralSetting::first();
        $load  = Load::with('carrier')->find($load_id);

        $html = view('pdf.carrier-confirmation', compact(['load', 'generalSetting', 'company']))->render();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function invoice ($company_id)
    {
        $mpdf = new \Mpdf\Mpdf();
        $img = public_path('assets/images/logo.jpeg');
        $company = Company::find($company_id);
        $generalSetting = GeneralSetting::first();
        $load  = Load::first(); //TODO dinamoc
        $html = view('pdf.invoice', compact(['load', 'generalSetting', 'company']))->render();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}
