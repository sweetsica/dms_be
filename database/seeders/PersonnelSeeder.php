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
            'role' => 'admin',
            'phone' => "0123456789",
            'working_form' => "Chính thức",
            'address' => "Hà Nội",
            'department_id' => 1,
            'position_id' => 2,
            'position_level_id' => 3,
            'area_id' => 4,
        ]);
    }
}
