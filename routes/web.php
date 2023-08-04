<?php

use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ProposalController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PersonnelLevelController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\VersionController;
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


Route::get('/clear', function () {
    \Illuminate\Support\Facades\Session::flush();
});

Route::middleware(['guest'])->group(function () {
    // Đăng nhập
    Route::get('/login', [AuthenticateController::class, 'index'])->name('login.index');

    Route::post('/login', [AuthenticateController::class, 'login'])->name('login');
    // Quên MK
    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
});



Route::middleware(['auth.role'])->group(function () {

    Route::post('/log-out', [AuthenticateController::class, 'logout'])->name('logout');

    Route::resource('/tuyenduong', RouteDirectionController::class);

    Route::get('/map/{id}', [RouteDirectionController::class, 'showMap'])->name('map');

    Route::get('/create-customer', [CustomerController::class, 'create'])->name('create-customer');

    Route::post('/get-customer', [CustomerController::class, 'store'])->name('store-customer');

    Route::get('/get-customer/{id}', [CustomerController::class, 'findById'])->name('find-customer-byId');

    Route::get('/order', [OrderController::class, 'index'])->name('index.order');

    // Trang chủ
    Route::get('/', [DashboardController::class, 'indexv2'])->name("dashboard");

    Route::get('de-xuat-theo-mau', [ProposalController::class, 'index'])->name('proposal.list');

    Route::get('de-xuat-theo-mau/1', [ProposalController::class, 'show'])->name('proposal.show');

    Route::get('danh-sach-dieu-khien', function () {
        return view('other.danh-sach-dieu-khien');
    })->name('home');

    // danh sách vị trí
    Route::get('danh-sach-vi-tri', [PositionController::class, 'index'])->name('position.list');

    Route::get('danh-sach-khach-hang', [CustomerController::class, 'index'])->name('position.list');

    Route::get('danh-sach-san-pham', [ProductController::class, 'index'])->name('product.list');
    Route::post('them-moi-san-pham', [ProductController::class, 'store'])->name('product.store');
    Route::put('sua-san-pham/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('xoa-san-pham/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('danh-sach-phien-ban', [VersionController::class, 'index'])->name('version.list');
    Route::post('them-moi-phien-ban', [VersionController::class, 'store'])->name('version.store');
    Route::put('sua-phien-ban/{id}', [VersionController::class, 'update'])->name('version.update');
    Route::delete('xoa-phien-ban/{id}', [VersionController::class, 'destroy'])->name('version.destroy');

    Route::get('danh-sach-tuy-chinh', [CustomController::class, 'index'])->name('custom.list');
    Route::post('them-moi-tuy-chinh', [CustomController::class, 'store'])->name('custom.store');
    Route::put('sua-tuy-chinh/{id}', [CustomController::class, 'update'])->name('custom.update');
    Route::delete('xoa-tuy-chinh/{id}', [CustomController::class, 'destroy'])->name('custom.destroy');

    Route::get('danh-sach-tuyen', function () {
        return view('other.danhSachTuyen');
    });

    Route::get('danh-sach-dia-ban', [LocalityController::class, 'index'])->name('locality.index');
    Route::post('danh-sach-dia-ban', [LocalityController::class, 'store'])->name('locality.store');
    Route::post('danh-sach-dia-ban/{id}', [LocalityController::class, 'update'])->name('locality.update');
    Route::post('danh-sach-dia-banx/{id}', [LocalityController::class, 'destroy'])->name('locality.destroy');

    Route::get('danh-sach-khu-vuc', [AreaController::class, 'index'])->name('area.index');
    Route::post('danh-sach-khu-vuc', [AreaController::class, 'store'])->name('area.store');
    Route::post('danh-sach-khu-vuc/{id}', [AreaController::class, 'update'])->name('area.update');
    Route::post('danh-sach-khu-vucx/{id}', [AreaController::class, 'destroy'])->name('area.destroy');

    Route::get('department', [DepartmentController::class, 'index'])->name('department.index');
    Route::post('department', [DepartmentController::class, 'store'])->name('department.store');
    Route::post('department/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::post('department/{id}', [DepartmentController::class, 'update'])->name('department.update');
    Route::post('departmentr/{id}', [DepartmentController::class, 'destroy'])->name('departmentr.destroy');

    Route::get('department', [DepartmentController::class, 'index'])->name('department.index');
    Route::post('department', [DepartmentController::class, 'store'])->name('department.store');
    Route::post('department/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::post('department/{id}', [DepartmentController::class, 'update'])->name('department.update');
    Route::post('departmentr/{id}', [DepartmentController::class, 'destroy'])->name('departmentr.destroy');

    Route::get('vai-tro', [RoleController::class, 'index'])->name('Role.index');
    Route::post('vai-tro', [RoleController::class, 'store'])->name('Role.store');
    Route::post('vai-trox/{id}', [RoleController::class, 'update'])->name('Rolex.update');
    Route::post('vai-tro/{id}', [RoleController::class, 'destroy'])->name('Role.destroy');
});
