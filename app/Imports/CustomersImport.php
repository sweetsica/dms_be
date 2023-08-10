<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class CustomersImport implements ToModel, WithStartRow, WithStrictNullComparison
{
    public function model(array $row)
    {
        // $row['ngay_sinh'] = ($row['ngay_sinh'] == '') ? '0' : $row['ngay_sinh'];
        $nullableColumns = range(0, 30); // Generate a range from 0 to 30 as nullable columns

        // Iterate over the nullable columns and check if the index exists
        foreach ($nullableColumns as $index) {
            if (!isset($row[$index])) {
                $row[$index] = null; // Set the value to null if the index is undefined
            } else if (is_string($row[$index]) && strpos($row[$index], '=') === 0) {
                $row[$index] = 'N/A'; // Set the value to "N/A" if it starts with "=" (indicating a formula)
            }
        }

        // Check if the phone value already exists in the database
        if ($row['5'] && Customer::where('phone', $row['5'])->exists()) {
            // Handle the duplication error
            throw new \Exception('Trùng số điện thoại trong file Excel: ' . $row['5']);
        }

        if ($row['5'] && Customer::where('email', $row['9'])->exists()) {
            // Handle the duplication error
            throw new \Exception('Trùng gmail file Excel: ' . $row['9']);
        }

        return new Customer([
            'code' => null,
            'name' => $row['1'],
            'address' => $row['2'],
            'category' => $row['3'],
            'companyPhoneNumber' => $row['4'],
            'phone' => $row['5'],
            'personContact' => $row['6'],
            'zalo' => $row['7'],
            'note' => $row['8'],
            'email' => $row['9'],
            'website' => $row['10'],
            'city' => $row['11'],
            'district' => $row['12'],
            'guide' => $row['13'],
            'companyName' => $row['14'],
            'career' => $row['15'],
            'taxCode' => $row['16'],
            'companyEmail' => $row['17'],
            'accountNumber' => $row['18'],
            'bankOpen' => $row['19'],
            'routeId' => $row['20'],
            'chanelId' => $row['21'],
            'group' => $row['22'],
            'status' => $row['23'],
            'personId' => $row['24'],
            'productId' => $row['25'],
            'created_at' => $row['26'],
            'updated_at' => $row['27'],
            'deleted_at' => $row['28'],
            'type' => $row['29'],
            'class' => $row['30'],
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
