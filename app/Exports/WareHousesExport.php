<?php

namespace App\Exports;

use App\Models\WareHouse;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class WareHousesExport implements WithMapping, WithHeadings, FromQuery, ShouldAutoSize

{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            'STT',
            'Mã kho',
            'Tên kho',
            'Phân loại',
            'Mô tả',
            'Địa chỉ',
            'Người quản lý',            
            'Kế toán phụ trách',
            'Trạng thái',            
        ];
    }
    public function map($warehouses): array
    {
        static $rowNumber = 0;
        $rowNumber++;       
        switch ($warehouses->classify) {
            case "0":
                $warehouses->classify = "Kho công ty";
              break;
            case "1":
                $warehouses->classify = "Kho nhà phân phối";
              break;
            case "2":
                $warehouses->classify = "Kho bán lẻ";
              break;
            default:
                $warehouses->classify = "Chưa xác định";
          }
        
        switch ($warehouses->status) {
        case "0":
            $warehouses->status = "Ngưng hoạt động";
            break;
        case "1":
            $warehouses->status = "Đang hoạt động";
            break;
        default:
            $warehouses->status = "Chưa xác định";
        }
        return [
            $rowNumber ?? $warehouses->id,
            $warehouses->code,
            $warehouses->name,
            $warehouses->classify,
            $warehouses->description,
            $warehouses->address,           
            $warehouses->managerID->name ?? '',                       
            $warehouses->accountantID->name ?? '',
            $warehouses->status,            
        ];
    }  
    // public function columnWidths(): array
    // {
    //     return [
    //         'A' => 6,
    //         'B' => 15,
    //         'C' => 35,
    //         'D' => 14,
    //         'E' => 17,
    //         'F' => 35,
    //         'G' => 24,            
    //         'H' => 25,
    //         'I' => 25,                     
    //     ];
    // }

    public function query()
    {
        return WareHouse::with('managerID', 'accountantID',)->orderBy('id', 'asc');
        // return WareHouse::all();
    }
}
