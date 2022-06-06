<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Constanats\UserRoles;

class MigrationController extends Controller
{
    public function migrateCarriers($company_id, Request $request)
    {
        $filename = storage_path('app/public/migrations/'.$company_id.'/carriers.csv');
        $file = fopen($filename, "r");
        $all_data = array();
        while ( ($data = fgetcsv($file, 2000, ",")) !==FALSE ) {
            $array = [];

            $array['id'] = !empty($data[0]) ? $data[0]: null;
            $array['company_id'] = $company_id;
            $array['company'] = !empty($data[1]) ? $data[1]: null;
            $array['contracted_on'] = !empty($data[2]) ? $data[2]: null;
            $array['status'] = !empty($data[3]) ? $data[3]: null;
            $array['phone'] = !empty($data[5]) ? $data[5]: null;
            $array['cell_phone'] = !empty($data[6]) ? $data[6]: null;
            $array['fax'] = !empty($data[7]) ? $data[7]: null;
            $array['address1'] = !empty($data[8]) ? $data[8]: null;
            $array['city'] = !empty($data[9]) ? $data[9]: null;
            $array['email'] = !empty($data[10]) ? $data[10]: null;
            $array['preferred_carrier_status'] = !empty($data[14]) ? $data[14]: null;
            $array['preferred_carrier_status'] = $array['preferred_carrier_status'] ? 1: 0;
            $array['flag'] = !empty($data[16]) ? $data[16]: null;
            $array['payee_company'] = !empty($data[17]) ? $data[17]: null;
            $array['payee_phone'] = !empty($data[19]) ? $data[19]: null;
            $array['payee_cell_phone'] = !empty($data[20]) ? $data[20]: null;
            $array['payee_fax'] = !empty($data[21]) ? $data[21]: null;
            $array['payee_address1'] = !empty($data[22]) ? $data[22]: null;
            $array['payee_fed_id'] = !empty($data[23]) ? $data[23]: null;
            $array['mc_number'] = !empty($data[25]) ? $data[25]: null;
            $array['dot_number'] = !empty($data[26]) ? $data[26]: null;
            array_push($all_data, $array) ?? null;
        }

        fclose($file);
        unset($all_data[0]);
        foreach ($all_data as $data) {
            DB::table('carriers')->insert($data);
        }
        dd('end');
    }

    public function migrateCustomers($company_id, Request $request)
    {
        $filename = storage_path('app/public/migrations/'.$company_id.'/customers.csv');
        $file = fopen($filename, "r");
        $all_data = array();
        while ( ($data = fgetcsv($file, 2000, ",")) !==FALSE ) {
            $array = [];
//            dump($data);

            $array['id'] = !empty($data[0]) ? $data[0]: null;
            $array['company_id'] = $company_id;
            $array['company'] = !empty($data[1]) ? $data[1]: null;
            $array['status'] = !empty($data[2]) ? $data[2]: null;
            $array['phone'] = !empty($data[5]) ? $data[5]: null;
            $array['fax'] = !empty($data[6]) ? $data[6]: null;
            $array['address1'] = !empty($data[7]) ? $data[7]: null;
            $array['city'] = !empty($data[8]) ? $data[8]: null;
            $array['email'] = !empty($data[9]) ? $data[9]: null;
            $array['currency'] = !empty($data[12]) ? $data[12]: null;
            $array['credit_limit'] = !empty($data[13]) ? $data[13]: null;
            $array['billing_company'] = !empty($data[20]) ? $data[20]: null;
            $array['billing_phone'] = !empty($data[22]) ? $data[22]: null;
            $array['billing_fax'] = !empty($data[23]) ? $data[23]: null;
            $array['billing_address1'] = !empty($data[24]) ? $data[24]: null;
//            $array['Product'] = !empty($data[11]) ? $data[11]: null;
            array_push($all_data, $array) ?? null;
        }
//        dd($all_data);
        fclose($file);
        unset($all_data[0]);
        foreach ($all_data as $data) {
            DB::table('customers')->insert($data);
        }
        dd('end');
    }
}
