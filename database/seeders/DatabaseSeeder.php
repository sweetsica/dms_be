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
        $this->call(PersonnelSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(OfficeDepartmentTBSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // \App\Models\AccountantKpiKey::factory()->create([
        //     'title' => 'Doanh thu',
        //     'number_before' => '3.2',
        //     'number_after' => '',
        // ]);
        // \App\Models\AccountantKpiKey::factory()->create([
        //     'title' => 'Chi phí',
        //     'number_before' => '1',
        //     'number_after' => '',
        // ]);
        // \App\Models\AccountantKpiKey::factory()->create([
        //     'title' => 'Công nợ phải thu',
        //     'number_before' => '',
        //     'number_after' => 'xx tỷ',
        // ]);
        // \App\Models\AccountantKpiKey::factory()->create([
        //     'title' => 'Nợ vay tài chính',
        //     'number_before' => '',
        //     'number_after' => 'xx tỷ',
        // ]);
        // \App\Models\BusinessKpiKey::factory()->create([
        //     'title' => 'Doanh số',
        //     'number_before' => '3.2',
        //     'number_after' => '',
        // ]);
        // \App\Models\BusinessKpiKey::factory()->create([
        //     'title' => 'Đạt chỉ tiêu tháng',
        //     'number_before' => '30',
        //     'number_after' => '',
        // ]);
        // \App\Models\BusinessKpiKey::factory()->create([
        //     'title' => 'KH active',
        //     'number_before' => '345',
        //     'number_after' => '',
        // ]);
        // \App\Models\BusinessKpiKey::factory()->create([
        //     'title' => 'KH mở mới',
        //     'number_before' => '35',
        //     'number_after' => '',
        // ]);
        // \App\Models\BusinessKpiKey::factory()->create([
        //     'title' => 'SKU active',
        //     'number_before' => '4',
        //     'number_after' => '4',
        // ]);
        // \App\Models\BusinessKpiKey::factory()->create([
        //     'title' => 'Địa bàn hoàn thành doanh số',
        //     'number_before' => '6',
        //     'number_after' => '12',
        // ]);
        // \App\Models\SellServiceKpiKey::factory()->create([
        //     'title' => 'Đơn hàng xuất bán',
        //     'number_before' => '64',
        //     'number_after' => '100',
        // ]);
        // \App\Models\SellServiceKpiKey::factory()->create([
        //     'title' => 'Tỉ lệ đơn đổi trả',
        //     'number_before' => '15',
        //     'number_after' => '',
        // ]);
        // \App\Models\SellServiceKpiKey::factory()->create([
        //     'title' => 'Doanh thu',
        //     'number_before' => '3.2',
        //     'number_after' => '',
        // ]);
        // \App\Models\SellServiceKpiKey::factory()->create([
        //     'title' => 'SKU active',
        //     'number_before' => '15',
        //     'number_after' => '20',
        // ]);
        // \App\Models\SellServiceKpiKey::factory()->create([
        //     'title' => 'Số TDV hiện có',
        //     'number_before' => '45',
        //     'number_after' => '55',
        // ]);
        // \App\Models\SellServiceKpiKey::factory()->create([
        //     'title' => 'Số địa bàn hoàn thành 100% DS',
        //     'number_before' => '7',
        //     'number_after' => '14',
        // ]);
        // \App\Models\SellServiceKpiKey::factory()->create([
        //     'title' => 'Số địa bàn hoàn thành < 70% DS',
        //     'number_before' => '2',
        //     'number_after' => '14',
        // ]);
    }
}