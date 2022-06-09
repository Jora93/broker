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

    public function migrateLoads($company_id, Request $request)
    {
        $filename = storage_path('app/public/migrations/'.$company_id.'/loads1.csv');
        $file = fopen($filename, "r");
        $all_data = array();
        while ( ($data = fgetcsv($file, 2000, ",")) !==FALSE ) {
            $array = [];
            $drops_array = [];
            $array['company_id'] = $company_id;
            $array['id'] = !empty($data[0]) ? $data[0]: null;
            $array['load_number'] = !empty($data[0]) ? $data[0]: null;
            $array['invoice_number'] = !empty($data[1]) ? $data[1]: null;
//            $array['LOAD TYPE'] = !empty($data[2]) ? $data[2]: null;
            $array['customer_id'] = !empty($data[3]) ? $data[3]: null;
//            $array['CUSTOMER'] = !empty($data[4]) ? $data[4]: null;
            $array['carrier_id'] = !empty($data[5]) ? $data[5]: null;
//            $array['CARRIER'] = !empty($data[6]) ? $data[6]: null;
//            $array['DISPATCHER'] = !empty($data[7]) ? $data[7]: null;
//            $array['SALES REP'] = !empty($data[8]) ? $data[8]: null;

            if ($array['id'] != 'LOAD NUMBER' && $array['status'] = !empty($data[9]) ) {
                if ($data[9] == 13) {
                    $array['status'] = 'Invoiced';
                } elseif ($data[9] == 15) {
                    $array['status'] = 'Paid Carrier';
                } elseif ($data[9] == 5) {
                    $array['status'] = 'Dispatched';
                } elseif ($data[9] == 6) {
                    $array['status'] = 'Invoiced';
                } else {
                    dd('status alert load number '.$array['id']);
                }
            }
//            $array['TRUCK NUMBER'] = !empty($data[10]) ? $data[10]: null;
//            $array['TRAILER NUMBER'] = !empty($data[11]) ? $data[11]: null;
//            $array['DRIVER'] = !empty($data[12]) ? $data[12]: null;
//            $array['DRIVER NUMBER'] = !empty($data[13]) ? $data[13]: null;
            $array['trailer_size'] = !empty($data[14]) && $data[14] !== 'Select Size' ? $data[14]: null;
            $array['pro_number'] = !empty($data[15]) ? $data[15]: null;
//            $array['MILES'] = !empty($data[17]) ? $data[17]: null;
//            $array['FUEL SURCHARGE TYPE'] = !empty($data[18]) ? $data[18]: null;
//            $array['FUEL SURCHARGE RATE'] = !empty($data[19]) ? $data[19]: null;
//            $array['STOPS'] = !empty($data[20]) ? $data[20]: null;
//            $array['COST PER STOP'] = !empty($data[21]) ? $data[21]: null;
//            $array['DRIVER ADVANCE GROSS'] = !empty($data[22]) ? $data[22]: null;
//            $array['COST INVOICE NUMBER'] = !empty($data[23]) ? $data[23]: null;
//            $array['COST INVOICE RECEIVED ON'] = !empty($data[24]) ? $data[24]: null;
//            $array['COST INVOICE DUE ON'] = !empty($data[25]) ? $data[25]: null;
//            $array['CARRIER PERFORMANCE RATING'] = !empty($data[26]) ? $data[26]: null;
//            $array['CARRIER PERFORMANCE COMMENTS'] = !empty($data[27]) ? $data[27]: null;
//            $array['LOAD TOTAL'] = !empty($data[28]) ? $data[28]: null;
//            $array['LOAD GROSS'] = !empty($data[29]) ? $data[29]: null;
//            $array['LOAD PROFIT'] = !empty($data[30]) ? $data[30]: null;
//            $array['AMOUNT DISCOUNTED TO CARRIER'] = !empty($data[31]) ? $data[31]: null;
//            $array['AMOUNT PAID TO CARRIER'] = !empty($data[32]) ? $data[32]: null;
//            $array['AMOUNT DUE TO CARRIER'] = !empty($data[33]) ? $data[33]: null;
//            $array['INVOICE NUMBER'] = !empty($data[34]) ? $data[34]: null; ??????????????????
            $array['purchase_order_number'] = !empty($data[35]) ? $data[35]: null;
            $array['product'] = !empty($data[36]) ? $data[36]: null;
//            $array['SERVICE TYPE'] = !empty($data[37]) ? $data[37]: null;
            $array['shipper_company'] = !empty($data[41]) ? $data[41]: null;
//            $array['SHIP LOCATION CONTACT NAME'] = !empty($data[42]) ? $data[42]: null;
            $array['shipper_phone'] = !empty($data[43]) ? $data[43]: null;
            $array['shipper_phone_extension'] = !empty($data[44]) ? $data[44]: null;
            $array['shipper_fax'] = !empty($data[45]) ? $data[45]: null;
            $array['shipper_address1'] = !empty($data[46]) ? $data[46]: null;
            $array['shipper_address2'] = !empty($data[47]) ? $data[47]: null;
            $array['shipper_city'] = !empty($data[48]) ? $data[48]: null;
            $array['shipper_state'] = !empty($data[49]) ? $data[49]: null;
            $array['shipper_zip_code'] = !empty($data[50]) ? $data[50]: null;
            $array['shipper_quantity'] = !empty($data[51]) ? $data[51]: null;
            $array['shipper_weight'] = !empty($data[52]) ? $data[52]: null;
            $array['shipper_value'] = !empty($data[53]) ? $data[53]: null;
//            $array['SHIP LOCATION BOL NUMBER'] = !empty($data[54]) ? $data[54]: null; //?????
//            $array['SHIP LOCATION BOL NOTES'] = !empty($data[55]) ? $data[55]: null; //??????
            $array['shipper_pickup_number'] = !empty($data[56]) ? $data[56]: null;
//            $array['shipper_pickup_date'] = !empty($data[57]) ? $data[57]: null;
            $array['shipper_pickup_date'] = !empty($data[57]) ? date("Y-m-d", strtotime($data[57])): null;
            $array['shipper_pickup_time_appt'] = !empty($data[58]) ? filter_var($data[58], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE): null;
            $array['shipper_notes'] = !empty($data[59]) ? $data[59]: null;
//            $array['FUEL SURCHARGE TYPE'] = !empty($data[78]) ? $data[78]: null;
//            $array['MILES'] = !empty($data[79]) ? $data[79]: null;
//            $array['FUEL SURCHARGE RATE'] = !empty($data[80]) ? $data[80]: null;
//            $array['STOPS'] = !empty($data[81]) ? $data[81]: null;
//            $array['COST PER STOP'] = !empty($data[82]) ? $data[82]: null;
//            $array['CHARGE INVOICE ON'] = !empty($data[83]) ? $data[83]: null;
//            $array['CHARGE INVOICE PAST DUE ON'] = !empty($data[84]) ? $data[84]: null;
//            $array['CHARGE INVOICE BALANCE DUE ON'] = !empty($data[85]) ? $data[85]: null;
//            $array['AMOUNT DUE'] = !empty($data[86]) ? $data[86]: null;
//            $array['AMOUNT DUE PLUS THIRTY'] = !empty($data[87]) ? $data[87]: null;
//            $array['AMOUNT DUE PLUS SIXTY'] = !empty($data[88]) ? $data[88]: null;
//            $array['AMOUNT DUE PLUS NINETY'] = !empty($data[89]) ? $data[89]: null;
            $array['carrier_costs_rate_per_unit'] = !empty($data[90]) ? $data[90]: null;
            $array['customer_costs_rate_per_unit'] = !empty($data[91]) ? $data[91]: null;
//            $array['AMOUNT NET'] = !empty($data[92]) ? $data[92]: null;
//            $array['AMOUNT NET PERCENT'] = !empty($data[93]) ? $data[93]: null;


//            ************** DROPS **************
            $drops_array['load_id'] = $array['id'];
            $drops_array['company'] = !empty($data[60]) ? $data[60]: null;
            $drops_array['contact_name'] = !empty($data[61]) ? $data[61]: null;
            $drops_array['phone'] = !empty($data[62]) ? $data[62]: null;
            $drops_array['phone_extension'] = !empty($data[63]) ? $data[63]: null;
            $drops_array['fax'] = !empty($data[64]) ? $data[64]: null;
            $drops_array['address1'] = !empty($data[65]) ? $data[65]: null;
            $drops_array['address2'] = !empty($data[66]) ? $data[66]: null;
            $drops_array['city'] = !empty($data[67]) ? $data[67]: null;
            $drops_array['delivery_state'] = !empty($data[68]) ? $data[68]: null;
            $drops_array['delivery_location_zip_code'] = !empty($data[69]) ? $data[69]: null;
            $drops_array['delivery_location_quantity'] = !empty($data[70]) ? $data[70]: null;
            $drops_array['delivery_location_weight'] = !empty($data[71]) ? $data[71]: null;
            $drops_array['delivery_location_bol_number'] = !empty($data[72]) ? $data[72]: null;
            $drops_array['bol_notes'] = !empty($data[73]) ? $data[73]: null;
            $drops_array['delivered_number'] = !empty($data[74]) ? $data[74]: null;
            $drops_array['delivery_date'] = !empty($data[75]) ? date("Y-m-d", strtotime($data[75])): null;
//            $array['DELIVERY LOCATION APPOINTMENT'] = !empty($data[76]) ? $data[76]: null;
            $drops_array['delivery_location_notes'] = !empty($data[77]) ? $data[77]: null;
            $drops_array['length'] = !empty($data[38]) ? $data[38]: null; //drop
            $drops_array['width'] = !empty($data[39]) ? $data[39]: null; //drop
            $drops_array['height'] = !empty($data[40]) ? $data[40]: null; //drop
            $drops_array['freight_class'] = !empty($data[16]) ? $data[16]: null;  //drop



            array_push($all_data, ['load' => $array, 'drop' => $drops_array]) ?? null;
        }
//        dd($all_data);
        fclose($file);
        unset($all_data[0]);

        foreach ($all_data as $data) {
            DB::table('loads')->insert($data['load']);
            DB::table('drops')->insert($data['drop']);
        }
        dd('end');
    }
}
