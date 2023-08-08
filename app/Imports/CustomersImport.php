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
//        dd($row);
        return new Customer([
            'id'=> $row[0],
            'code'=> $row[1],
            'name'=> $row[2],
            'phone'=> $row[3],
            'email'=> $row[4],
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
