<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            //1
            'code' => 'ADMIN',
            'name' => 'Admin',
            'description' => 'Xem được thông tin của toàn công ty'
        ]);
        
        Role::create([
            //2
            'code' => 'NV',
            'name' => 'Nhân viên',
            'description' => 'Xem được thông tin của mình'
        ]);

        Role::create([
            //3
            'code' => 'TBP',
            'name' => 'Trưởng bộ phận',
            'description' => 'Xem được thông tin của đơn vị mình'
        ]);
    }
}
