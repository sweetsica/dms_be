<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeDepartmentTBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'code' => 'MTT',
            'name' => 'Công ty cổ phần Mastertran',
            'parent' => '1',
            'ib_lead' => '1',
            'description'=> 'Tổng công ty'
        ]);
        Department::create([
            'code' => 'BGĐ',
            'name' => 'Ban giám đốc',
            'parent' => '1',
            'ib_lead' => '1',
            'description'=> 'Tập hợp hành viên đầu não của công ty, đóng vai trò định hướng, đề ra đường lối hoạt động cho công ty'
        ]);
        Department::create([
            'code' => 'BKS',
            'name' => 'Ban kiểm soát',
            'parent' => '1',
            'ib_lead' => '1',
            'description'=> 'Thành viên giám sát, hỗ trợ ban lãnh đạo trong việc điều hành. Bộ phận này cung cấp các quy định, điều lệ cho công ty'
        ]);
        Department::create([
            'code' => 'KKD',
            'name' => 'Khối kinh doanh',
            'parent' => '1',
            'ib_lead' => '1',
            'description'=> 'Bộ phận trực tiếp tham gia vào tạo doanh thu cho công ty'
        ]);
        Department::create([
            'code' => 'KVP',
            'name' => '
            Khối văn phòng',
            'parent' => '1',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Khối văn phòng toàn công ty'
        ]);
        Department::create([
            'code' => 'MKT',
            'name' => 'Phòng Marketing',
            'parent' => '2',
            'ib_lead' => '1',
            'description'=> ''
        ]);
        Department::create([
            'code' => 'Design & Content',
            'name' => 'Design & Content',
            'parent' => '2',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Sáng tạo nội dung'
        ]);
        Department::create([
            'code' => 'Digital MKT',
            'name' => 'Digital MKT',
            'parent' => '2',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Digital Marketing'
        ]);
        Department::create([
            'code' => 'Brand MKT',
            'name' => 'Brand MKT',
            'parent' => '2',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Quản trị Nhãn và Đào tạo'
        ]);
        Department::create([
            'code' => 'Communication',
            'name' => 'Communication',
            'parent' => '2',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Truyền thông'
        ]);
        Department::create([
            'code' => 'Trade MKT',
            'name' => 'Trade MKT',
            'parent' => '2',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Trade Marketing'
        ]);
        Department::create([
            'code' => 'Supply room',
            'name' => 'Phòng Cung ứng',
            'parent' => '3',
            'ib_lead' => '1',
            'description'=> ''
        ]);
        Department::create([
            'code' => 'Purchasing',
            'name' => 'Mua hàng',
            'parent' => '4',
            'ib_lead' => '1',
            'description'=> ''
        ]);
        Department::create([
            'code' => 'Warehouse',
            'name' => 'Kho vận',
            'parent' => '4',
            'ib_lead' => '1',
            'description'=> 'Kho vận, quản lý hàng hóa, đồ dùng. Các hoạt động liên quan tới giao vận.'
        ]);
        Department::create([
            'code' => 'HR',
            'name' => 'Phòng Hành chính nhân sự',
            'parent' => '2',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Hành chính Nhân sự'
        ]);
        Department::create([
            'code' => 'Administrative',
            'name' => 'Hành chính',
            'parent' => '5',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Hành chính'
        ]);
        Department::create([
            'code' => 'Legal',
            'name' => 'Pháp chế',
            'parent' => '5',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Pháp chế'
        ]);
        Department::create([
            'code' => 'Personnel',
            'name' => 'Nhân sự',
            'parent' => '5',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Nhân sự'
        ]);
        Department::create([
            'code' => 'FA',
            'name' => 'Phòng Tài chính kế toán',
            'parent' => '2',
            'ib_lead' => '1',
            'description'=> 'Quản trị mảng Tài chính và Kế toán của công ty'
        ]);
        Department::create([
            'code' => 'Financial',
            'name' => 'Tài chính',
            'parent' => '6',
            'ib_lead' => '1',
            'description'=> 'Quản trị mảng Tài chính'
        ]);
        Department::create([
            'code' => 'Accounting',
            'name' => 'Kế toán',
            'parent' => '6',
            'ib_lead' => '1',
            'description'=> ''
        ]);
        Department::create([
            'code' => 'DVBH',
            'name' => 'Phòng dịch vụ bán hàng',
            'parent' => '7',
            'ib_lead' => '1',
            'description'=> 'Giám sát điều phối bán hàng. BỘ phận đưa ra các quy định về việc bán hàng'
        ]);
        Department::create([
            'code' => 'OTC',
            'name' => 'Kênh OTC',
            'parent' => '7',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Kênh OTC'
        ]);
        Department::create([
            'code' => 'ETC',
            'name' => 'Kênh ETC',
            'parent' => '7',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Kênh ETC'
        ]);
        Department::create([
            'code' => 'MT',
            'name' => 'Kênh MT',
            'parent' => '7',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Kênh MT'
        ]);
        Department::create([
            'code' => 'B2C',
            'name' => 'Kênh B2C',
            'parent' => '7',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Đại lý cá nhân & Bán lẻ'
        ]);
        Department::create([
            'code' => 'ETC MB',
            'name' => 'Kênh ETC Miền Bắc',
            'parent' => '8',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Kênh ETC khu vực miền Bắc'
        ]);
        Department::create([
            'code' => 'ETC MN',
            'name' => 'Kênh ETC Miền Nam',
            'parent' => '8',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Kênh ETC khu vực miền Nam'
        ]);
        Department::create([
            'code' => 'ETC MT',
            'name' => 'Kênh ETC Miền Trung',
            'parent' => '8',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Kênh ETC khu vực miền Trung'
        ]);
        Department::create([
            'code' => 'VUNG 14',
            'name' => 'Kênh OTC Vùng 1-4',
            'parent' => '9',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Kênh OTC khu vực vùng 1 và 4'
        ]);
        Department::create([
            'code' => 'VUNG 23',
            'name' => 'Kênh OTC vùng 2-3',
            'parent' => '9',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Kênh OTC khu vực vùng 1 và 4'
        ]);
        Department::create([
            'code' => 'VUNG 56',
            'name' => 'Kênh OTC vùng 5-6',
            'parent' => '9',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Kênh OTC khu vực vùng 5 và 6'
        ]);
        Department::create([
            'code' => 'DOI O6A',
            'name' => 'Đội O6A',
            'parent' => '10',
            'ib_lead' => '1',
            'description'=> ''
        ]);
        Department::create([
            'code' => 'DOI O1B',
            'name' => 'Đội O1B',
            'parent' => '10',
            'ib_lead' => '1',
            'description'=> ''
        ]);
        Department::create([
            'code' => 'DOI O5A',
            'name' => 'Đội O5A',
            'parent' => '11',
            'ib_lead' => '1',
            'description'=> ''
        ]);
        Department::create([
            'code' => 'DOI O9A',
            'name' => 'Đội O9A',
            'parent' => '12',
            'ib_lead' => '1',
            'description'=> ''
        ]);
        Department::create([
            'code' => 'DOI O10B',
            'name' => 'Đội O10B',
            'parent' => '12',
            'ib_lead' => '1',
            'description'=> ''
        ]);
        Department::create([
            'code' => 'MT CHUOI',
            'name' => 'Kênh MT - Chuỗi',
            'parent' => '13',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Kênh MT mảng chuỗi'
        ]);
        Department::create([
            'code' => 'B2C DH',
            'name' => 'B2C',
            'parent' => '13',
            'ib_lead' => '1',
            'description'=> ''
        ]);
        Department::create([
            'code' => 'B2C KHCN',
            'name' => 'Kênh B2C Khách hàng cá nhân',
            'parent' => '13',
            'ib_lead' => '1',
            'description'=> ''
        ]);
        Department::create([
            'code' => 'MT- Ecommerce',
            'name' => 'Kênh MT E-Commerce',
            'parent' => '13',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Kênh MT mảng thương mại điện tử'
        ]);
        Department::create([
            'code' => 'MT Beauty',
            'name' => 'Kênh MT Beauty Spa',
            'parent' => '13',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Kênh MT mảng làm đẹp'
        ]);
    }
}