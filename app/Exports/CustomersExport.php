<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class CustomersExport implements FromCollection, WithHeadings, WithTitle, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Customer::with("person")->get();
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
            'Người thu thập'
        ];
    }

    public function map($customer): array
    {
        static $index = 1;
        $personName = $customer->person->name;

        $customerData = [];
        $customerData['STT'] = $index;
        $customerData['Tên công ty, Đơn vị H/C'] = $customer->companyName;
        $customerData['Địa chỉ'] = $customer->address;
        $customerData['Lĩnh vực'] = $customer->groupId;
        $customerData['Số công ty'] = $customer->companyPhoneNumber;
        $customerData['Số di dộng'] = $customer->phone;
        $customerData['Người đại diện'] = $customer->personContact;
        $customerData['Zalo'] = $customer->personContact;
        $customerData['Ghi chú'] = null;
        $customerData['Email'] = $customer->companyEmail;
        $customerData['Website'] = null;
        $customerData['Tỉnh/TP'] = $customer->city;
        $customerData['Quận/Huyện'] = $customer->district;
        $customerData['Phường/Xã'] = $customer->guide;
        $customerData['Người thu thập'] = $personName;

        $index++;
        // dd($customerData);
        return $customerData;
    }

    public function title(): string
    {
        // Đặt tiêu đề cho bảng dữ liệu
        return 'Danh sách khách hàng';
    }
}
