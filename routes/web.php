<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteDirectionController;
use App\Http\Controllers\Api\AssignTaskController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\KeyController;
use App\Http\Controllers\Api\TargetController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\DeploymentProcessController;
use App\Http\Controllers\Api\DeploymentRequestController;
use App\Http\Controllers\Api\EquipmentPackController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\PositionLevelController;
use App\Http\Controllers\Api\PositionOrganizationController;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\MeetingController;
use App\Http\Controllers\Api\MeetingListController;
use App\Http\Controllers\Api\ProposalController;
use App\Http\Controllers\Api\ExecutiveDocumentController;
use App\Http\Controllers\Api\FoodTicketController;
use App\Http\Controllers\Api\WeeklyMenuController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\AccountantDashboardController;
use App\Http\Controllers\Api\HRStaffKpiKeyController;
use App\Http\Controllers\Api\SalesStaffKpiKeyController;
use App\Http\Controllers\Api\AdministrativeStaffKpiKeyController;
use App\Http\Controllers\Api\TrainingRecordsController;
use App\Http\Controllers\Api\FilesController;
use App\Http\Controllers\Api\FreeProposalController;
use App\Http\Controllers\Api\LeaveApplicationController;
use App\Http\Controllers\Api\TargetDetailFormController;
use App\Http\Controllers\Api\TimeKeepingController;
use App\Http\Controllers\Api\VersionApiController;
use App\Http\Controllers\Api\WorkingShiftController;
use App\Http\Controllers\Api\WorkPlanController;
use App\Http\Controllers\ModalController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/tuyenduong', RouteDirectionController::class);

Route::get('/map/{id}', [RouteDirectionController::class, 'showMap'])->name('map');

Route::get('/create-customer', [CustomerController::class, 'create'])->name('create-customer');

Route::post('/get-customer', [CustomerController::class, 'store'])->name('store-customer');

Route::get('/get-customer/{id}', [CustomerController::class, 'findById'])->name('find-customer-byId');

Route::get('/order', [OrderController::class, 'index'])->name('index.order');


// Đăng nhập
Route::get('/login', [AuthController::class, 'index'])->name('login');

// Quên MK
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');

// Trang chủ
Route::get('/', [DashboardController::class, 'indexv2'])->name("dashboard");

Route::get('de-xuat-theo-mau', [ProposalController::class, 'index'])->name('proposal.list');

Route::get('de-xuat-theo-mau/1', [ProposalController::class, 'show'])->name('proposal.show');

Route::get('danh-sach-dieu-khien', function () {
    return view('other.danh-sach-dieu-khien');
});

// danh sách vị trí
Route::get('danh-sach-vi-tri', [PositionController::class, 'index'])->name('position.list');


Route::get('danh-sach-khach-hang', function () {
    return view('other.danhSachKhachHang');
});
Route::get('danh-sach-tuyen', function () {
    return view('other.danhSachTuyen');
});


Route::get('danh-sach-san-pham', function () {
    return view('Product.danhSachSanPham');
});


