<?php

namespace App\Imports;

use App\Models\Carrier;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CarriersImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            if ($index === 0) {
                continue;
            }
//            dump($row[0]);
//            dd(99);

             Carrier::create([
                'id'                     => $row[0],
                'company'                => $row[1],
                'status'                 => $row[3],
                'phone'                  => $row[5],
                'fax'                    => $row[7],
                'address'                => $row[8],
                'currency'               => $row[12],
                'preferredCarrierStatus' => $row[13],
                'smartwayCertified'      => $row[14],
                'payeeCompany'           => $row[16],
                'payeePhone'             => $row[18],
                'payeeAddress'           => $row[21],
                'mcNumber'               => $row[24],
                'dotNumber'              => $row[25],
            ]);
        }
    }
}
