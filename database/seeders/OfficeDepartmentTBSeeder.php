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
            //1
            'code' => '',
            'name' => 'Phòng Nghiên cứu và Phát triển',
            'parent' => '1',
            'ib_lead' => '1',
            'description'=> 'Nghiên cứu và Phát triển sản phẩm'
        ]);
        Department::create([
            //2
            'code' => '',
            'name' => 'Tổ Cơ khí',
            'parent' => '1',
            'ib_lead' => '1',
            'description'=> ''
        ]);
        Department::create([
            //3
            'code' => '',
            'name' => 'Tổ Lắp ráp',
            'parent' => '1',
            'ib_lead' => '1',
            'description'=> 'Phụ trách các hoạt động về lắp ráp sản phẩm của nhà máy'
        ]);
        Department::create([
            //4
            'code' => '',
            'name' => 'Tổ Sửa chữa',
            'parent' => '1',
            'ib_lead' => '1',
            'description'=> 'Phụ trách các hoạt động về sửa chữa và bảo hành của nhà máy'
        ]);
        Department::create([
            //5
            'code' => '',
            'name' => 'Tổ vận hành',
            'parent' => '1',
            'ib_lead' => '1',
            'description'=> 'Phụ trách các hoạt động về vận hành của nhà máy'
        ]);
        Department::create([
            //6
            'code' => '',
            'name' => 'Khối sản xuất',
            'parent' => '2',
            'ib_lead' => '1',
            'description'=> 'Phụ trách các hoạt động sản xuất, lắp ráp của doanh nghiệp'
        ]);
        Department::create([
            //7
            'code' => '',
            'name' => 'Phòng Kỹ thuật và phát triển sản phẩm',
            'parent' => '3',
            'ib_lead' => '1',
            'description'=> 'Kỹ thuật và phát triển sản phẩm'
        ]);
        Department::create([
            //8
            'code' => '',
            'name' => 'Phòng IT và Phân tích kinh doanh',
            'parent' => '3',
            'ib_lead' => '1',
            'description'=> 'Phụ trách phân tích yêu cầu kinh doanh của lãnh đạo và doanh nghiệp'
        ]);
        Department::create([
            //9
            'code' => '',
            'name' => 'Phòng Marketing',
            'parent' => '3',
            'ib_lead' => '1',
            'description'=> 'Phụ trách các hoạt động tiếp thị của doanh nghiệp'
        ]);
        Department::create([
            //10
            'code' => '',
            'name' => 'Phòng Hành chính Nhân sự',
            'parent' => '3',
            'ib_lead' => '1',
            'description'=> 'Phụ trách Hành chính Nhân sự'
        ]);
        Department::create([
            //11
            'code' => '',
            'name' => 'Phòng Tài chính Kế toán',
            'parent' => '3',
            'ib_lead' => '1',
            'description'=> ''
        ]);
        Department::create([
            //12
            'code' => '',
            'name' => 'Phòng Mua hàng',
            'parent' => '3',
            'ib_lead' => '1',
            'description'=> 'Giám sát điều phối mua hàng. BỘ phận đưa ra các quy định về việc mua hàng'
        ]);
        Department::create([
            //13
            'code' => '',
            'name' => 'Khối Văn phòng',
            'parent' => '2',
            'ib_lead' => '1',
            'description'=> 'Quản lý khối văn phòng'
        ]);
        Department::create([
            //14
            'code' => '',
            'name' => 'Phòng Phát triển kinh doanh',
            'parent' => '4',
            'ib_lead' => '1',
            'description'=> 'Phụ trách các hoạt động tiếp thị của doanh nghiệp'
        ]);
        Department::create([
            //15
            'code' => '',
            'name' => 'Phòng Kinh doanh',
            'parent' => '4',
            'ib_lead' => '1',
            'description'=> ''
        ]);
        Department::create([
            //16
            'code' => '',
            'name' => 'Khối kinh doanh',
            'parent' => '2',
            'ib_lead' => '1',
            'description'=> 'Quản lý khối văn phòng'
        ]);
        Department::create([
            //17
            'code' => '',
            'name' => 'Ban Kiểm soát',
            'parent' => '2',
            'ib_lead' => '1',
            'description'=> 'Thành viên giám sát, hỗ trợ ban lãnh đạo trong việc điều hành. Bộ phận này cung cấp các quy định, điều lệ cho công ty'
        ]);
        Department::create([
            //18
            'code' => '',
            'name' => 'Ban Giám Đốc',
            'parent' => '2',
            'ib_lead' => '1',
            'description'=> 'Tập hợp hành viên đầu não của công ty, đóng vai trò định hướng, đề ra đường lối hoạt động cho công ty'
        ]);
        Department::create([
            //19
            'code' => '',
            'name' => 'Thái Hưng Corp',
            'parent' => '',
            'ib_lead' => '1',
            'description'=> 'Tổng công ty'
        ]);
    }
}