<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Constanats\UserRoles;

class MigrationController extends Controller
{
    public function migrateCarriers($company_id, Request $request)
    {
//        $csvList = File::files(public_path('assets/images/logo.png'));
//        $csvList = File::files(public_path('assets/migrations/'.$company_id))[0];
//
//        dd(storage_path('app/public/migrations/'.$company_id.'/carriers.csv'));
//
//        $file_n = storage_path('app/public/migrations/'.$company_id.'/carriers.csv');

        $filename = storage_path('app/public/migrations/'.$company_id.'/carriers.csv');
        $file = fopen($filename, "r");
        $all_data = array();
        while ( ($data = fgetcsv($file, 200, ",")) !==FALSE ) {
            $array = [];
            $array['id'] = $data[0];
            $array['company'] = $data[1];
            $array['Contracted On'] = $data[2];
            $array['Status'] = $data[3];
            $array['Contact'] = $data[4];
            $array['Phone'] = $data[5];
            $array['Cellphone'] = $data[6];
            $array['Fax'] = $data[7];
            $array['Street Address'] = $data[8];
            $array['City/State/Zip'] = $data[9];
            $array['Email'] = $data[10];
            $array['Website'] = $data[11];
//            dd($data[11]);
            $array['Payment Term'] = $data[12];
            $array['Currency'] = $data[13];
            $array['Preferred Carrier Status'] = $data[14];
            $array['Smartway Certified'] = $data[15];
            $array['Flag'] = $data[16];
            $array['Payee Company'] = $data[17];
            $array['Payee Conta'] = $data[18];
            array_push($all_data, $array);
        }
        fclose($file);
        dd($all_data);
    }
}
