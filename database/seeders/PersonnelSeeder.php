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
            'name' => 'admin',
            'email' => 'admin@tbht.vn',
            'password' => Hash::make('123456'),
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

        Personnel::create([
            //2
            'name' => 'tester',
            'email' => 'test@tbht.vn',
            'password' => Hash::make('123456'),
            'code' => 'TESTER',
            'role_id' => 1,
            'phone' => "0123456789",
            'working_form' => "Chính thức",
            'address' => "Đà Nẵng",
            'department_id' => null,
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
            'name' => 'dev',
            'email' => 'dev@tbht.vn',
            'password' => Hash::make('123456'),
            'code' => 'DEV',
            'role_id' => 1,
            'phone' => "0123456789",
            'working_form' => "Chính thức",
            'address' => "HCM",
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
