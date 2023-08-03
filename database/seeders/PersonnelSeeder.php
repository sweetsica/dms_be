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
            'name' => 'admin',
            'email' => 'admin@tbht.vn',
            'password' => Hash::make('123456'),
            'code' => 'ADMIN-123',
            'role_id' => 3,
            'phone' => "0123456789",
            'form' => "Chính thức",
            'address' => "Hà Nội",
            'department_id' => 18,
            'position_id' => 4,
            'personnel_lv_id' => 5,
            'area_id' => '1',
            'status' => 'Đang làm việc',
            'birthday' => "2023-08-03",
            'gender' => "Nam",
            // 'annual_salary' => "",
            'pack' => '1',
            'manage' => '0',

        ]);
    }
}
