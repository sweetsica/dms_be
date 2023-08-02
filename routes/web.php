<?php

use App\Http\Controllers\Api\AssignTaskController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\KeyController;
use App\Http\Controllers\Api\TargetController;
// use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\DeploymentProcessController;
use App\Http\Controllers\Api\DeploymentRequestController;
use App\Http\Controllers\Api\EquipmentPackController;
// use App\Http\Controllers\Api\PositionController;
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
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UnitTwoController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentLv1Controller;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PersonnelLevelController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RoleController;
use App\Models\PersonnelLevel;
use Illuminate\Support\Facades\Route;


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
// Đăng nhập
Route::get('/login', [AuthenticateController::class, 'index'])->name('login.index');
// Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthenticateController::class, 'login'])->name('login');

// Quên MK
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');

// Trang chủ
Route::get('/', [DashboardController::class, 'indexv2'])->name("dashboard");

Route::get('de-xuat-theo-mau', [ProposalController::class, 'index'])->name('proposal.list');

Route::get('de-xuat-theo-mau/1', [ProposalController::class, 'show'])->name('proposal.show');

Route::get('danh-sach-dieu-khien', function () {
    return view('other.danh-sach-dieu-khien')->name('other.danh-sach-dieu-khien');
});

// danh sách vị trí
Route::get('danh-sach-vi-tri', [PositionController::class, 'index'])->name('position.list');


Route::get('department', [DepartmentController::class, 'index'])->name('department.index');
Route::post('department', [DepartmentController::class, 'store'])->name('department.store');
Route::post('department/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
Route::post('department/{id}', [DepartmentController::class, 'update'])->name('department.update');
Route::post('departmentr/{id}', [DepartmentController::class, 'destroy'])->name('departmentr.destroy');


Route::get('position', [PositionController::class, 'index'])->name('position.index');
Route::post('position', [PositionController::class, 'store'])->name('position.store');
Route::post('position/{id}', [PositionController::class, 'update'])->name('position.update');

Route::get('area', [AreaController::class, 'index'])->name('area.index');
Route::post('area', [AreaController::class, 'store'])->name('area.store');

Route::get('cap-nhan-su', [PersonnelLevelController::class, 'index'])->name('PersonnelLevel.index');
Route::post('cap-nhan-su', [PersonnelLevelController::class, 'store'])->name('PersonnelLevel.store');
Route::post('cap_nhan_su/{id}', [PersonnelLevelController::class, 'destroy'])->name('PersonnelLevelx.destroy');

Route::get('nhan-su', [PersonnelController::class, 'index'])->name('Personnel.index');
Route::post('nhan-su', [PersonnelController::class, 'store'])->name('Personnel.store');

Route::get('vai-tro', [RoleController::class, 'index'])->name('Role.index');
Route::post('vai-tro', [RoleController::class, 'store'])->name('Role.store');
Route::post('vai-tro/{id}', [RoleController::class, 'destroy'])->name('Role.destroy');
