<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CustomersExport implements FromCollection, WithHeadings, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::all();
    }
    public function headings(): array
    {
        // Định nghĩa tiêu đề cột
        return ['ID', 'Tên khách', 'SĐT', 'Mã hóa','Email','Địa chỉ','Ghi chú','Tổng điểm','Tổng điểm lần cuối','Tổng điểm tới giờ','Trạng thái','Thời gian xóa','Ngày tạo','Ngày cập nhật'];
    }

    public function title(): string
    {
        // Đặt tiêu đề cho bảng dữ liệu
        return 'Danh sách khách hàng';
    }
}
