<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(OfficeDepartmentTBHTSeeder::class);
        $this->call(PositionDepartmentTBSeeder::class);
        
        $this->call(PersonelLevelSeeder::class);
        $this->call(PersonnelSeeder::class);
    }
}
