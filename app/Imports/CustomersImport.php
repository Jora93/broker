<?php

namespace App\Imports;

use App\Customer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CustomersImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            if ($index === 0) {
                continue;
            }
            //            dump($row);
            //            dd(99);

            Customer::create([
                'id'                        => $row[0],
                'company'                   => $row[1],
                'status'                    => $row[2],
                'phone'                     => $row[5],
                'address'                   => $row[7],
                'product'                   => $row[10],
                'currency'                  => $row[11],
                'creditLimit'               => $row[12],
                'billingCompany'            => $row[19],
                'billingPhone'              => $row[21],
                'billingAddress'            => $row[23],
                'smartWayCarriersPreferred' => $row[17],
            ]);
        }
    }
}
