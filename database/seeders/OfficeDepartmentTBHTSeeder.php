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
            'ib_lead' => '1',
        ]);

        Department::updateOrCreate([
            //2
            'id' => 2,
            'code' => 'BGĐ',
            'name' => 'Ban Giám Đốc',
            'parent' => '1',
            'description' => 'Tập hợp hành viên đầu não của công ty, đóng vai trò định hướng, đề ra đường lối hoạt động cho công ty',
            'ib_lead' => '',
            'order' => '1'
        ]);

        Department::updateOrCreate([
            //3
            'id' => 3,
            'code' => 'BKS',
            'name' => 'Ban Kiểm Soát',
            'parent' => '1',
            'description' => 'Thành viên giám sát, hỗ trợ ban lãnh đạo trong việc điều hành. Bộ phận này cung cấp các quy định, điều lệ cho công ty',
            'ib_lead' => '',
            'order' => '2'
        ]);

        Department::updateOrCreate([
            //4
            'id' => 4,
            'code' => 'KKD',
            'name' => 'Khối Kinh Doanh',
            'parent' => '1',
            'description' => 'Quản lý khối văn phòng',
            'ib_lead' => '',
            'order' => '3'
        ]);

        Department::updateOrCreate([
            //5
            'id' => 5,
            'code' => 'PKD1',
            'name' => 'Phòng KD 1 (PPĐL)',
            'parent' => '1',
            'description' => 'Phụ trách mảng kinh doanh phân phối thông qua hệ thống đại lý. Trước mắt tập trung PP sản phẩm xe hàng nhỏ ',
            'ib_lead' => '',
            'order' => '4'
        ]);

        Department::create([
            //6
            'code' => 'PPTKD',
            'name' => 'Phòng Phát triển kinh doanh',
            'parent' => '4',
            'description' => 'Phụ trách các hoạt động tiếp thị của doanh nghiệp',
            'ib_lead' => '',
            'order' => '3.1'
        ]);

        Department::create([
            //7
            'code' => 'KVP',
            'name' => 'Khối Văn phòng',
            'parent' => '1',
            'description' => 'Quản lý khối văn phòng',
            'ib_lead' => '',
            'order' => '5'
        ]);

        Department::create([
            //8
            'code' => 'PMH',
            'name' => 'Phòng Mua hàng',
            'parent' => '7',
            'description' => 'Giám sát điều phối mua hàng. Bộ phận đưa ra các quy định về việc mua hàng',
            'ib_lead' => '',
            'order' => '5.1'
        ]);
        Department::create([
            //9
            'code' => 'PTCKT',
            'name' => 'Phòng Tài chính Kế toán',
            'parent' => '7',
            'description' => '',
            'ib_lead' => '',
            'order' => '5.2'
        ]);
        Department::create([
            //10
            'code' => 'PHCNS',
            'name' => 'Phòng Hành chính Nhân sự',
            'parent' => '7',
            'description' => 'Phụ trách Hành chính Nhân sự',
            'ib_lead' => '',
            'order' => '5.3'
        ]);
        Department::create([
            //11
            'code' => 'PMKT',
            'name' => 'Phòng Marketing',
            'parent' => '7',
            'description' => 'Phụ trách các hoạt động tiếp thị của doanh nghiệp',
            'ib_lead' => '11',
            'order' => '5.4'
        ]);
        Department::create([
            //12
            'code' => 'IT',
            'name' => 'Phòng IT và Phân tích kinh doanh',
            'parent' => '7',
            'description' => 'Phụ trách phân tích yêu cầu kinh doanh của lãnh đạo và doanh nghiệp',
            'ib_lead' => '',
            'order' => '5.5'
        ]);

        Department::create([
            //13
            'code' => 'PKTVPT',
            'name' => 'Phòng Kỹ thuật và phát triển sản phẩm',
            'parent' => '7',
            'description' => 'Kỹ thuật và phát triển sản phẩm',
            'ib_lead' => '',
            'order' => '5.6'
        ]);

        Department::create([
            //14
            'code' => 'NMCĐ',
            'name' => 'Nhà máy cơ điện Thái Hưng',
            'parent' => '1',
            'description' => 'Là cơ sở sản xuất chế tạo các sản phẩm xe điện thành phẩm: -Xe hàng nhỏ - Xe Golf & Thăm Quan - (Chuẩn bị) sản xuất Ô tô điện',
            'ib_lead' => '',
            'order' => '6'
        ]);

        Department::create([
            //15
            'code' => 'CĐVH',
            'name' => 'Tổ cơ điện & Vận hành',
            'parent' => '14',
            'description' => 'Thực thi các nhóm việc gồm: Bảo vệ, An ninh, Điện nước, Vệ sinh, Trật tự, Xây lắp (nhỏ), Sửa chữa',
            'ib_lead' => '',
            'order' => '6.1'
        ]);

        Department::create([
            //16
            'code' => 'TSC',
            'name' => 'Tổ Sửa chữa',
            'parent' => '14',
            'description' => 'Phụ trách các hoạt động về sửa chữa và bảo hành của nhà máy',
            'ib_lead' => '',
            'order' => '6.2'
        ]);

        Department::create([
            //17
            'code' => 'TLR',
            'name' => 'Tổ Lắp ráp',
            'parent' => '14',
            'description' => 'Phụ trách các hoạt động về lắp ráp sản phẩm của nhà máy',
            'ib_lead' => '',
            'order' => '6.3'
        ]);
        
        Department::create([
            //18
            'code' => 'KTNM',
            'name' => 'Phòng Kế Toán (Nhà máy)',
            'parent' => '14',
            'description' => 'Thực hiện các nhiệm vụ về kế toán cho toàn bộ hoạt động của nhà máy gồm: kế toán mua vào - kho - sản xuất, kế toán vận hành, kế toán hoàn thiện xây dựng',
            'ib_lead' => '',
            'order' => '6.4'
        ]);
        
        Department::create([
            //19
            'code' => 'OTC',
            'name' => 'Kênh OTC',
            'parent' => '4',
            'description' => 'Phụ trách kênh OTC',
            'ib_lead' => '',
            'order' => '3.2'
        ]);
    }
}
