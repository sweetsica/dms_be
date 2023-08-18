<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class ErrorRowsExport implements  FromCollection, WithMapping, WithHeadings
{
    private $errors;

    public function __construct(array $errors)
    {
        $this->errors = $errors;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return new Collection($this->errors);
    }

    public function map($row): array
    {
        $rowData = $row['row'];
        static $index = 1;
        
        $customerData = [];
        $customerData['STT'] = $index;
        $customerData['Tên công ty, Đơn vị H/C'] = $rowData[1];
        $customerData['Địa chỉ'] = $rowData[2];
        $customerData['Lĩnh vực'] = $rowData[3];
        $customerData['Số công ty'] = $rowData[4];
        $customerData['Số di dộng'] = $rowData[5];
        $customerData['Người đại diện'] = $rowData[6];
        $customerData['Zalo'] = $rowData[7];
        $customerData['Ghi chú'] = $rowData[8];
        $customerData['Email'] = $rowData[9];
        $customerData['Website'] = $rowData[10];
        $customerData['Tỉnh/TP'] = $rowData[11];
        $customerData['Quận/Huyện'] = $rowData[12];
        $customerData['Phường/Xã'] = $rowData[13];

        $index++;
        return $customerData;
    }

    public function headings(): array
    {
        // Định nghĩa tiêu đề cột
        return [
            'STT',
            'Tên công ty, Đơn vị H/C',
            'Địa chỉ',
            'Lĩnh vực',
            'Số công ty',
            'Số di dộng',
            'Người đại diện',
            'Zalo',
            'Ghi chú',
            'Email',
            'Website',
            'Tỉnh/TP',
            'Quận/Huyện',
            'Phường/Xã',
        ];
    }
}
