<?php

namespace App\Exports;

use App\Models\PurchaseOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class PurchaseOrdersExport implements WithMapping, WithHeadings, FromQuery, ShouldAutoSize

{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            'STT',
            'Người đặt',
            'Trạng thái',
            'Mã phiếu',
            'Mã khách hàng',
            'Tên khách hàng',
            'Địa chỉ',            
            'Ngày đặt',
            'Tổng tiền',            
            'Ghi chú',            
            'Người sửa',            
            'Ngày sửa',            
        ];
    }
    public function map($purchaseOrder): array
    {
        static $rowNumber = 0;
        $rowNumber++;       
        switch ($purchaseOrder->status) {
            case "0":
                $purchaseOrder->status = "Đã tạo";
              break;
            case "1":
                $purchaseOrder->status = "Chờ duyệt";
              break;
            case "2":
                $purchaseOrder->status = "Đã duyệt";
              break;
            case "3":
                $purchaseOrder->status = "Đã xuất hàng";
              break;
            case "4":
                $purchaseOrder->status = "Đã giao hàng";
              break;
            case "-1":
                $purchaseOrder->status = "Từ chối";
              break;
            default:
                $purchaseOrder->status = "Chưa xác định";
        }
        
        return [
            $rowNumber ?? $purchaseOrder->id,
            $purchaseOrder->orderStaff->name ?? '',
            $purchaseOrder->status,
            $purchaseOrder->code,
            $purchaseOrder->customer->code ?? '',
            $purchaseOrder->customer->name ?? '',           
            $purchaseOrder->customer->address ?? '',                       
            $purchaseOrder->created_at ?? '',
            $purchaseOrder->total_money, 
            $purchaseOrder->description,
            $purchaseOrder->editStaff->name ?? '',
            $purchaseOrder->updated_at ?? '',

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
        return PurchaseOrder::with('orderStaff', 'editStaff', 'customer', 'routeDirection')->orderBy('id', 'asc');
        // return WareHouse::all();
    }
}
