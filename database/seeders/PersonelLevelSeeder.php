<?php

namespace Database\Seeders;

use App\Models\PersonnelLevel;
use App\Models\Position;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonelLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PersonnelLevel::create([
            'code' => 'BLD',
            'name' => 'Ban lãnh đạo',
            'description' => 'Điều hành công ty',
        ]);

        PersonnelLevel::create([
            'code' => 'GS',
            'name' => 'Giám sát',
            'description' => 'Kiểm tra, rà soát công việc',
        ]);
        
        PersonnelLevel::create([
            'code' => 'QLCC',
            'name' => 'Quản lý cấp cao',
            'description' => '',
        ]);
        
        PersonnelLevel::create([
            'code' => 'QLCT',
            'name' => 'Quản lý cấp trung',
            'description' => '',
        ]);
        
        PersonnelLevel::create([
            'code' => 'TD',
            'name' => 'Trưởng tổ đội/nhóm',
            'description' => 'Quản lý tổ đội, nhóm',
        ]);

        PersonnelLevel::create([
            'code' => 'NV',
            'name' => 'Nhân viên',
            'description' => 'Thực hiện các công việc và nhiệm vụ được giao',
        ]);
        
        PersonnelLevel::create([
            'code' => 'LDPT',
            'name' => 'Lao động phổ thông',
            'description' => '',
        ]);
    }
}