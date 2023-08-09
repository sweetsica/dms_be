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
            'personnel_level' => 'Ban lãnh đạo',
            'department_id' => '18',
            'description' => 'Điều hành công ty',
            'staffing' => '1',
            'wage' => '4000000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            //2
            'code' => '',
            'name' => 'Kiểm soát',
            'personnel_level' => 'Giám sát',
            'department_id' => '17',
            'description' => 'Kiểm tra, rà soát công việc. Thông báo, nhắc nhở, xử lý khi được ban lãnh đạo yêu cầu',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            //3
            'code' => '',
            'name' => 'Giám đốc dự án',
            'personnel_level' => 'Quản lý cấp cao',
            'department_id' => '14',
            'description' => 'Phụ trách các dự án và hỗ trợ CEO trong việc điều hành công ty',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Giám đốc tài chính',
            'personnel_level' => 'Quản lý cấp cao',
            'department_id' => '11',
            'description' => 'Tìm kiếm nguồn tiền. Cân đối thu chi, kiểm soát tình hình tài chính công ty',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'TTrưởng phòng Mua hàng',
            'personnel_level' => 'Quản lý cấp trung',
            'department_id' => '12',
            'description' => 'Điều hành công tyGiám sát điều phối mua hàng',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Kế toán trưởng',
            'personnel_level' => 'Quản lý cấp trung',
            'department_id' => '11',
            'description' => 'Kiểm soát tình hình chung của phòng ban phụ trách',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Trưởng phòng Kinh doanh',
            'personnel_level' => 'Quản lý cấp trung',
            'department_id' => '15',
            'description' => 'Kiểm soát tình hình phát triển thị trường của công ty',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Trưởng phòng Kỹ thuật và phát triển sản phẩm',
            'personnel_level' => 'Quản lý cấp trung',
            'department_id' => '7',
            'description' => 'Kiểm soát tình hình về mảng kỹ thuật và phát triển sản phẩm',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Trưởng phòng Hành chính Nhân sự',
            'personnel_level' => 'Quản lý cấp trung',
            'department_id' => '10',
            'description' => 'Kiểm soát tình hình chung của phòng',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Trưởng phòng IT và Phân tích kinh doanh',
            'personnel_level' => 'Quản lý cấp trung',
            'department_id' => '2',
            'description' => 'Điều hành công ty',
            'staffing' => '8',
            'wage' => '4000000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Trưởng phòng Marketing',
            'personnel_level' => 'Quản lý cấp trung',
            'department_id' => '9',
            'description' => 'Kiểm soát tình hình chung của kênh phụ trách',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Tổ trưởng tổ Vận hành',
            'personnel_level' => 'Quản lý cấp trung',
            'department_id' => '5',
            'description' => 'Quản lý cấp trung',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Tổ trưởng tổ Sửa chữa',
            'personnel_level' => 'Quản lý cấp trung',
            'department_id' => '4',
            'description' => 'Kiểm soát tình hình chung của tổ phụ trách',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Tổ trưởng tổ Lắp ráp',
            'personnel_level' => 'Quản lý cấp trung',
            'department_id' => '3',
            'description' => 'Kiểm soát tình hình chung của tổ phụ trách',
            'staffing' => '1',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên Kế toán tổng hợp',
            'personnel_level' => 'Nhân viên',
            'department_id' => '11',
            'description' => 'Thực hiện các hoạt động thuộc nghiệp vụ kế toán',
            'staffing' => '5',
            'wage' => '20000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên hành chính nhân sự',
            'personnel_level' => 'Nhân viên',
            'department_id' => '10',
            'description' => 'Thực hiện các nghiệp vụ hành chính tại văn phòng',
            'staffing' => '5',
            'wage' => '20000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên pháp chế',
            'personnel_level' => 'Nhân viên',
            'department_id' => '10',
            'description' => 'Kiểm soát và thực hiện các công việc hành chính văn phòng hàng ngày',
            'staffing' => '1',
            'wage' => '20000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên Phân tích kinh doanh',
            'personnel_level' => 'Nhân viên',
            'department_id' => '8',
            'description' => 'Kiểm soát và thực hiện nghiệp vụ phân tích kinh doanh',
            'staffing' => '1',
            'wage' => '20000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Công nhân kỹ thuật',
            'personnel_level' => 'Nhân viên',
            'department_id' => '5',
            'description' => 'Kiểm soát và thực hiện nghiệp vụ phân tích kinh doanh',
            'staffing' => '1',
            'wage' => '20000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên nấu ăn',
            'personnel_level' => 'Nhân viên',
            'department_id' => '10',
            'description' => 'Nhân viên',
            'staffing' => '1',
            'wage' => '200000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Tổ trưởng nhóm thợ',
            'personnel_level' => 'Trưởng tổ/đội/nhóm',
            'department_id' => '5',
            'description' => '',
            'staffing' => '1',
            'wage' => '300000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Tổ trưởng Điện nước',
            'personnel_level' => 'Trưởng tổ/đội/nhóm',
            'department_id' => '5',
            'description' => '',
            'staffing' => '1',
            'wage' => '300000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Tổ trưởng Cơ khí',
            'personnel_level' => 'Trưởng tổ/đội/nhóm',
            'department_id' => '5',
            'description' => '',
            'staffing' => '1',
            'wage' => '3000000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên tạp vụ',
            'personnel_level' => 'Lao động phổ thông',
            'department_id' => '10',
            'description' => '',
            'staffing' => '1',
            'wage' => '200000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên kế toán Kho - công nợ',
            'personnel_level' => 'Nhân viên',
            'department_id' => '11',
            'description' => '',
            'staffing' => '2',
            'wage' => '300000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên kế toán dự án',
            'personnel_level' => 'Nhân viên',
            'department_id' => '11',
            'description' => '',
            'staffing' => '2',
            'wage' => '200000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên kế toán',
            'personnel_level' => 'Nhân viên',
            'department_id' => '11',
            'description' => '',
            'staffing' => '2',
            'wage' => '200000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên Kinh doanh',
            'personnel_level' => 'Nhân viên',
            'department_id' => '15',
            'description' => '',
            'staffing' => '10',
            'wage' => '400000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Thủ kho',
            'personnel_level' => 'Nhân viên',
            'department_id' => '10',
            'description' => '',
            'staffing' => '2',
            'wage' => '300000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên Kho',
            'personnel_level' => 'Nhân viên',
            'department_id' => '10',
            'description' => '',
            'staffing' => '3',
            'wage' => '200000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Trợ lý Tổng giám đốc',
            'personnel_level' => 'Quản lý cấp trung',
            'department_id' => '18',
            'description' => '',
            'staffing' => '1',
            'wage' => '300000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên mua hàng',
            'personnel_level' => 'Nhân viên',
            'department_id' => '12',
            'description' => '',
            'staffing' => '3',
            'wage' => '300000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Kỹ sư thiết kế',
            'personnel_level' => 'Nhân viên',
            'department_id' => '7',
            'description' => '',
            'staffing' => '5',
            'wage' => '500000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Kỹ sư ô tô',
            'personnel_level' => 'Nhân viên',
            'department_id' => '7',
            'description' => '',
            'staffing' => '5',
            'wage' => '300000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên IT',
            'personnel_level' => 'Nhân viên',
            'department_id' => '8',
            'description' => '',
            'staffing' => '2',
            'wage' => '80000000',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên bảo vệ',
            'personnel_level' => 'Nhân viên',
            'department_id' => '19',
            'description' => '',
            'staffing' => '',
            'wage' => '',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'CTV',
            'personnel_level' => 'Nhân viên',
            'department_id' => '',
            'description' => '',
            'staffing' => '',
            'wage' => '',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên Sales Admin',
            'personnel_level' => 'Nhân viên',
            'department_id' => '16',
            'description' => '',
            'staffing' => '',
            'wage' => '',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
        Position::create([
            'code' => '',
            'name' => 'Nhân viên Tester',
            'personnel_level' => 'Nhân viên',
            'department_id' => '8',
            'description' => '',
            'staffing' => '',
            'wage' => '',
            'pack' => 'Pack Quản lý',
            'parent' => '',
        ]);
    }
}