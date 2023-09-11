<?php

namespace App\Imports;

use App\Models\WareHouse;
use App\Models\Personnel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Throwable;

class WareHousesImport implements ToModel, WithStartRow, WithStrictNullComparison, SkipsOnError 
{
    use Importable, SkipsErrors;

    private $importErrors = [];

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
        switch ($row['3']) {
            case "Kho công ty":
                $row['3'] = "0";
              break;
            case "Kho nhà phân phối":
                $row['3'] = "1";
              break;
            case "Kho bán lẻ":
                $row['3'] = "2";
              break;
            default:
                $row['3'] = "";
          }
        
        switch ($row['8']) {
            case "Ngưng hoạt động":
                $row['8'] = "0";
                break;
            case "Đang hoạt động":
                $row['8'] = "1";
                break;
            default:
                $row['8'] = "";
            }

        $manage_name = Personnel::where('name', $row['6'])->first();
        $row['6'] = $manage_name->id;

        $accountant_name = Personnel::where('name', $row['7'])->first();
        $row['7'] = $accountant_name->id;

        return new WareHouse([
            'code' => $row['1'],
            'name' => $row['2'],
            'classify' => $row['3'],
            'description' => $row['4'],
            'address' => $row['5'],
            'manage' => $row['6'],
            'accountant' => $row['7'],
            'status' => $row['8'],
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

    public function hasErrors(): bool
    {
        return !empty($this->importErrors);
    }

    public function getErrors()
    {
        return $this->importErrors;
    }
}
