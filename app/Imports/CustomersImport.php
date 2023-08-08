<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CustomersImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        return new Customer([
            'id'=> $row[0],
            'companyName'=> $row[1],
            'address'=> $row[2],
            'companyPhoneNumber'=> $row[4],
            'phone' => $row[5],
            'personContact' => $row[6],
            'zalo' => $row[7],
            'note' => $row[8],
            'email' => $row[9],
            'website' => $row[10],
            'city' => $row[11],
            'district' => $row[12],
            'guide' => $row[13]
        ]);
    }
//    public function headingRow(): int
//    {
//        return 2;
//    }

    public function startRow(): int
    {
        return 2;
    }
}
