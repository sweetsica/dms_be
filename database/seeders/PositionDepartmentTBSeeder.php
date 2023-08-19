<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Personnel;
use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PositionDepartmentTBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::create([
            //1
            'code' => '',
            'name' => 'Tổng giám đốc',
            'personnel_level' => '1',
            'department_id' => '2',
            'description' => 'Điều hành công ty',
            'staffing' => '1',
            'wage' => '4000000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            //2
            'code' => '',
            'name' => 'Kiểm soát',
            'personnel_level' => '2',
            'department_id' => '3',
            'description' => 'Kiểm tra, rà soát công việc. Thông báo, nhắc nhở, xử lý khi được ban lãnh đạo yêu cầu',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            //3
            'code' => '',
            'name' => 'Giám đốc dự án',
            'personnel_level' => '3',
            'department_id' => '2',
            'description' => 'Phụ trách các dự án và hỗ trợ CEO trong việc điều hành công ty',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Giám đốc tài chính',
            'personnel_level' => '3',
            'department_id' => '9',
            'description' => 'Tìm kiếm nguồn tiền. Cân đối thu chi, kiểm soát tình hình tài chính công ty',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Trưởng phòng Mua hàng',
            'personnel_level' => '4',
            'department_id' => '8',
            'description' => 'Điều hành công tyGiám sát điều phối mua hàng',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Kế toán trưởng',
            'personnel_level' => '2',
            'department_id' => '9',
            'description' => 'Kiểm soát tình hình chung của phòng ban phụ trách',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Trưởng phòng Kinh doanh',
            'personnel_level' => '4',
            'department_id' => '9',
            'description' => 'Kiểm soát tình hình phát triển thị trường của công ty',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Trưởng phòng Kỹ thuật và phát triển sản phẩm',
            'personnel_level' => '4',
            'department_id' => '13',
            'description' => 'Kiểm soát tình hình về mảng kỹ thuật và phát triển sản phẩm',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Trưởng phòng Hành chính Nhân sự',
            'personnel_level' => '4',
            'department_id' => '10',
            'description' => 'Kiểm soát tình hình chung của phòng',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Trưởng phòng IT',
            'personnel_level' => '4',
            'department_id' => '12',
            'description' => 'Điều hành công ty',
            'staffing' => '8',
            'wage' => '4000000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Trưởng phòng Marketing',
            'personnel_level' => '4',
            'department_id' => '11',
            'description' => 'Kiểm soát tình hình chung của kênh phụ trách',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Tổ trưởng tổ Vận hành',
            'personnel_level' => '5',
            'department_id' => '15',
            'description' => '',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Tổ trưởng tổ Sửa chữa',
            'personnel_level' => '5',
            'department_id' => '16',
            'description' => 'Kiểm soát tình hình chung của tổ phụ trách',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Tổ trưởng tổ Lắp ráp',
            'personnel_level' => '5',
            'department_id' => '17',
            'description' => 'Kiểm soát tình hình chung của tổ phụ trách',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên Kế toán tổng hợp',
            'personnel_level' => '6',
            'department_id' => '9',
            'description' => 'Thực hiện các hoạt động thuộc nghiệp vụ kế toán',
            'staffing' => '5',
            'wage' => '20000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên hành chính nhân sự',
            'personnel_level' => '6',
            'department_id' => '10',
            'description' => 'Thực hiện các nghiệp vụ hành chính tại văn phòng',
            'staffing' => '5',
            'wage' => '20000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên pháp chế',
            'personnel_level' => '6',
            'department_id' => '10',
            'description' => 'Kiểm soát và thực hiện các công việc hành chính văn phòng hàng ngày',
            'staffing' => '1',
            'wage' => '20000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên Phân tích kinh doanh',
            'personnel_level' => '6',
            'department_id' => '6',
            'description' => 'Kiểm soát và thực hiện nghiệp vụ phân tích kinh doanh',
            'staffing' => '1',
            'wage' => '20000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Công nhân sửa chữa',
            'personnel_level' => '6',
            'department_id' => '16',
            'description' => 'Sửa chữa tại xưởng',
            'staffing' => '1',
            'wage' => '20000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Tổ trưởng nhóm thợ lắp ráp',
            'personnel_level' => '5',
            'department_id' => '17',
            'description' => '',
            'staffing' => '1',
            'wage' => '300000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Tổ trưởng Điện nước',
            'personnel_level' => '5',
            'department_id' => '15',
            'description' => '',
            'staffing' => '1',
            'wage' => '300000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Tổ trưởng Cơ khí',
            'personnel_level' => '5',
            'department_id' => '17',
            'description' => '',
            'staffing' => '1',
            'wage' => '3000000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên tạp vụ',
            'personnel_level' => '7',
            'department_id' => '10',
            'description' => '',
            'staffing' => '1',
            'wage' => '200000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên kế toán Kho - công nợ',
            'personnel_level' => '6',
            'department_id' => '9',
            'description' => '',
            'staffing' => '2',
            'wage' => '300000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên kế toán dự án',
            'personnel_level' => '6',
            'department_id' => '9',
            'description' => '',
            'staffing' => '2',
            'wage' => '200000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên kế toán',
            'personnel_level' => '6',
            'department_id' => '9',
            'description' => '',
            'staffing' => '2',
            'wage' => '200000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên Kinh doanh',
            'personnel_level' => '6',
            'department_id' => '5',
            'description' => '',
            'staffing' => '10',
            'wage' => '400000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Trợ lý Tổng giám đốc',
            'personnel_level' => '5',
            'department_id' => '3',
            'description' => '',
            'staffing' => '1',
            'wage' => '300000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên mua hàng',
            'personnel_level' => '6',
            'department_id' => '8',
            'description' => '',
            'staffing' => '3',
            'wage' => '300000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Kỹ sư thiết kế',
            'personnel_level' => '6',
            'department_id' => '13',
            'description' => '',
            'staffing' => '5',
            'wage' => '500000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên IT',
            'personnel_level' => '6',
            'department_id' => '12',
            'description' => '',
            'staffing' => '2',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên bảo vệ',
            'personnel_level' => '7',
            'department_id' => '10',
            'description' => '',
            'staffing' => null,
            'wage' => null,
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên Sales Admin',
            'personnel_level' => '6',
            'department_id' => '4',
            'description' => '',
            'staffing' => null,
            'wage' => null,
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên Tester',
            'personnel_level' => '6',
            'department_id' => '12',
            'description' => '',
            'staffing' => null,
            'wage' => null,
            'pack' => 'Pack Quản lý',
            'parent' => null,
        ]);
    }
}