<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Personnel;
use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PositionDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::create([
            'code' => 'BD',
            'name' => 'Giám đốc kinh doanh',
            'personnel_level' => 'Giám đốc',
            'department_id' => '1',
            'description' => '',
            'staffing' => '1',
            'wage' => '1',
            'pack' => '',
            'parent' => '1',
        ]);
    }
}
