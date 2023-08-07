<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeDepartmentTBHTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::updateOrCreate([
            //1
            'id' => 1,
            'code' => 'THC',
            'name' => 'Thái Hưng Corp',
            'parent' => '0',
            'description' => 'Tổng công ty',
            'id_lead' => 'Trần Minh Thao',
        ]);

        Department::updateOrCreate([
            //2
            'id' => 2,
            'code' => 'BGĐ',
            'name' => 'Ban Giám Đốc',
            'parent' => '1',
            'description' => 'Tập hợp hành viên đầu não của công ty, đóng vai trò định hướng, đề ra đường lối hoạt động cho công ty',
            'id_lead' => 'Trần Minh Thao',
        ]);

        Department::updateOrCreate([
            //3
            'id' => 3,
            'code' => 'BKS',
            'name' => 'Ban Kiểm Soát',
            'parent' => '1',
            'description' => 'Thành viên giám sát, hỗ trợ ban lãnh đạo trong việc điều hành. Bộ phận này cung cấp các quy định, điều lệ cho công ty',
            'id_lead' => 'Nguyễn Ngọc Bảo',
        ]);

        Department::updateOrCreate([
            //4
            'id' => 4,
            'code' => 'KKD',
            'name' => 'Khối Kinh Doanh',
            'parent' => '1',
            'description' => 'Quản lý khối văn phòng',
            'id_lead' => '',
        ]);
        
        Department::updateOrCreate([
            //5
            'id' => 5,
            'code' => 'PKD',
            'name' => 'Phòng Kinh doanh',
            'parent' => '1',
            'description' => '',
            'id_lead' => 'Phạm Ánh Dương',
        ]);
        
        Department::create([
            //6
            'code' => 'PPTKD',
            'name' => 'Phòng Phát triển kinh doanh',
            'parent' => '4',
            'description' => 'Phụ trách các hoạt động tiếp thị của doanh nghiệp',
            'id_lead' => 'Olaf Baunman',
        ]);

        Department::create([
            //7
            'code' => 'KVP',
            'name' => 'Khối Văn phòng',
            'parent' => '1',
            'description' => 'Quản lý khối văn phòng',
            'id_lead' => '',
        ]);

        Department::create([
            //8
            'code' => 'PMH',
            'name' => 'Phòng Mua hàng',
            'parent' => '7',
            'description' => 'Giám sát điều phối mua hàng. BỘ phận đưa ra các quy định về việc mua hàng',
            'id_lead' => 'Nguyễn Thị Thanh Nga',
        ]);
        Department::create([
            //9
            'code' => 'PTCKT',
            'name' => 'Phòng Tài chính Kế toán',
            'parent' => '7',
            'description' => '',
            'id_lead' => 'Mai Văn Sơn',
        ]);
        Department::create([
            //10
            'code' => 'PHCNS',
            'name' => 'Phòng Hành chính Nhân sự',
            'parent' => '7',
            'description' => 'Phụ trách Hành chính Nhân sự',
            'id_lead' => 'Nguyễn Sỹ Sơn',
        ]);
        Department::create([
            //11
            'code' => 'PMKT',
            'name' => 'Phòng Marketing',
            'parent' => '7',
            'description' => 'Phụ trách các hoạt động tiếp thị của doanh nghiệp',
            'id_lead' => '',
        ]);
        Department::create([
            //12
            'code' => 'IT',
            'name' => 'Phòng IT và Phân tích kinh doanh',
            'parent' => '7',
            'description' => 'Phụ trách phân tích yêu cầu kinh doanh của lãnh đạo và doanh nghiệp',
            'id_lead' => '',
        ]);
        Department::create([
            //13
            'code' => 'PKTVPT',
            'name' => 'Phòng Kỹ thuật và phát triển sản phẩm',
            'parent' => '7',
            'description' => 'Kỹ thuật và phát triển sản phẩm',
            'id_lead' => 'Trịnh Thanh Hải',
        ]);

        Department::create([
            //14
            'code' => 'KSX',
            'name' => 'Khối Sản xuất',
            'parent' => '1',
            'description' => 'Phụ trách các hoạt động sản xuất, lắp ráp của doanh nghiệp',
            'id_lead' => '',
        ]);
        Department::create([
            //15
            'code' => 'TVH',
            'name' => 'Tổ vận hành',
            'parent' => '14',
            'description' => 'Phụ trách các hoạt động về vận hành của nhà máy',
            'id_lead' => '',
        ]);
        Department::create([
            //16
            'code' => 'TSC',
            'name' => 'Tổ Sửa chữa',
            'parent' => '14',
            'description' => 'Phụ trách các hoạt động về sửa chữa và bảo hành của nhà máy',
            'id_lead' => '',
        ]);
        Department::create([
            //17
            'code' => 'TLR',
            'name' => 'Tổ Lắp ráp',
            'parent' => '14',
            'description' => 'Phụ trách các hoạt động về lắp ráp sản phẩm của nhà máy',
            'id_lead' => '',
        ]);
    }
}
