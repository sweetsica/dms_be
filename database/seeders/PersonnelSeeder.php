<?php

namespace Database\Seeders;

use App\Models\Personnel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PersonnelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Personnel::create([
            //1
            'name' => 'Trần Minh Thao',
            'email' => 'steven.tran@tbht.vn',
            'password' => 'tbht2023',
            'code' => 'TMT-TBHT',
            'role_id' => 1,
            'phone' => "0123456789",
            'working_form' => "Chính thức",
            'address' => "Hà Nội",
            'department_id' => null,
            'position_id' => null,
            'personnel_lv_id' => null,
            'area_id' => null,
            'status' => 'Đang làm việc',
            'birthday' => "2023-08-03",
            'gender' => "Nam",
            'annual_salary' => "100000000",
            'pack' => '1',
            'manage' => null,
        ]);

        Personnel::create([
            //2
            'name' => 'Phạm Thị Thắm',
            'email' => 'sales1@tbht.vn',
            'password' => 'tbht2023',
            'code' => 'SALE1',
            'role_id' => 2,
            'phone' => "0374219889",
            'working_form' => "Chính thức",
            'address' => "Hà Nội",
            'department_id' => 5,
            'position_id' => null,
            'personnel_lv_id' => null,
            'area_id' => null,
            'status' => 'Đang làm việc',
            'birthday' => "2023-08-03",
            'gender' => "Nữ",
            'annual_salary' => "100000000",
            'pack' => '1',
            'manage' => null,
        ]);
        
        Personnel::create([
            //3
            'name' => 'Nguyễn Văn Tiến',
            'email' => 'sales3@tbht.vn',
            'password' => 'tbht2023',
            'code' => 'SALE3',
            'role_id' => 2,
            'phone' => "0773488562",
            'working_form' => "Chính thức",
            'address' => "Hà Nội",
            'department_id' => 5,
            'position_id' => null,
            'personnel_lv_id' => null,
            'area_id' => null,
            'status' => 'Đang làm việc',
            'birthday' => "2023-08-03",
            'gender' => "Nam",
            'annual_salary' => "100000000",
            'pack' => '1',
            'manage' => null,
        ]);
        
        Personnel::create([
            //4
            'name' => 'Dương Xuân Hải',
            'email' => 'sales2@tbht.vn',
            'password' => 'tbht2023',
            'code' => 'SALE2',
            'role_id' => 2,
            'phone' => "0372949889",
            'working_form' => "Chính thức",
            'address' => "Hà Nội",
            'department_id' => 5,
            'position_id' => null,
            'personnel_lv_id' => null,
            'area_id' => null,
            'status' => 'Đang làm việc',
            'birthday' => "2023-08-03",
            'gender' => "Nam",
            'annual_salary' => "100000000",
            'pack' => '1',
            'manage' => null,
        ]);
        
        Personnel::create([
            //5
            'name' => 'Nguyễn Thành Đức',
            'email' => 'salesmanager1@tbht.vn',
            'password' => 'tbht2023',
            'code' => 'SALEPM1',
            'role_id' => 3,
            'phone' => "0123456789",
            'working_form' => "Chính thức",
            'address' => "Hà Nội",
            'department_id' => 5,
            'position_id' => null,
            'personnel_lv_id' => null,
            'area_id' => null,
            'status' => 'Đang làm việc',
            'birthday' => "2023-08-03",
            'gender' => "Nam",
            'annual_salary' => "100000000",
            'pack' => '1',
            'manage' => null,
        ]);
        
        Personnel::create([
            //6
            'name' => 'Ngô Hữu Đông',
            'email' => 'salesmanager2@tbht.vn',
            'password' => 'tbht2023',
            'code' => 'SALEPM2',
            'role_id' => 3,
            'phone' => "0123456789",
            'working_form' => "Chính thức",
            'address' => "Hà Nội",
            'department_id' => 5,
            'position_id' => null,
            'personnel_lv_id' => null,
            'area_id' => null,
            'status' => 'Đang làm việc',
            'birthday' => "2023-08-03",
            'gender' => "Nam",
            'annual_salary' => "100000000",
            'pack' => '1',
            'manage' => null,
        ]);
        
        Personnel::create([
            //7
            'name' => 'Trưởng phòng 3',
            'email' => 'salesmanager3@tbht.vn',
            'password' => 'tbht2023',
            'code' => 'SALEPM3',
            'role_id' => 3,
            'phone' => "0123456789",
            'working_form' => "Chính thức",
            'address' => "Hà Nội",
            'department_id' => 5,
            'position_id' => null,
            'personnel_lv_id' => null,
            'area_id' => null,
            'status' => 'Đang làm việc',
            'birthday' => "2023-08-03",
            'gender' => "Nam",
            'annual_salary' => "100000000",
            'pack' => '1',
            'manage' => null,
        ]);

        Personnel::create([
            'id' => 999999,
            'name' => 'admin',
            'email' => 'admin@tbht.vn',
            'password' => '123456',
            'code' => 'ADMIN-123',
            'role_id' => 1,
            'phone' => "0123456789",
            'working_form' => "Chính thức",
            'address' => "Hà Nội",
            'department_id' => null,
            'position_id' => null,
            'personnel_lv_id' => null,
            'area_id' => null,
            'status' => 'Đang làm việc',
            'birthday' => "2023-08-03",
            'gender' => "Nam",
            'annual_salary' => "100000000",
            'pack' => '1',
            'manage' => null,
        ]);
    }
}
