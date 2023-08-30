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


class WareHousesExport implements WithColumnWidths, WithMapping, WithHeadings, FromQuery, ShouldAutoSize

{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            'STT',
            'Mã sản phẩm',
            'Tên sản phẩm',
            'Số lượng',
            'ĐVT chẵn',
            'ĐVT lẻ',
            'Phân loại',            
            'Ngày nhập kho',
            'Ghi chú',            
        ];
    }
    public function map($warehouses): array
    {
        static $rowNumber = 0;
        $rowNumber++;       

        return [
            $rowNumber ?? $warehouses->id,
            // $warehouses->ticket_name,
            // $warehouses->date_selected,
            // $warehouses->num_of_meals_edit,
            // $warehouses->num_of_meals,
            // $warehouses->sum_price,           
            // $warehouses->sender->name ?? '',                       
            // $warehouses->departement->name ?? '',
            // $warehouses->position->name ?? '',            
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 6,
            'B' => 15,
            'C' => 40,
            'D' => 14,
            'E' => 17,
            'F' => 15,
            'G' => 24,            
            'H' => 25,
            'I' => 25,                     
        ];
    }

    public function query()
    {
        // return WareHouse::with('departement', 'position', 'sender');
        return WareHouse::all();
    }
}
