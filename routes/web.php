<?php

use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ProposalController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerGroupController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PersonnelLevelController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\VersionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteDirectionController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\SpecificationsController;
use App\Http\Controllers\TechnicalSpecificationsGroupController;

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
    return view('login');
});

Route::middleware(['guest'])->group(function () {
    // Đăng nhập
    Route::get('/login', [AuthenticateController::class, 'index'])->name('login.index');

    Route::post('/login', [AuthenticateController::class, 'login'])->name('login');
    // Quên MK
    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
});

Route::get('/test-customer-1', [CustomerTestController::class, 'index1'])->name('index1');
Route::get('/test-customer-2', [CustomerTestController::class, 'index2'])->name('index2');
Route::get('/test-customer-3', [CustomerTestController::class, 'index3'])->name('index3');

Route::middleware(['auth.role'])->group(function () {

    Route::get('/', function () {
        return view('other.danh-sach-dieu-khien');
    })->name('home');

    Route::post('/log-out', [AuthenticateController::class, 'logout'])->name('logout');

    Route::post('/create-customer', [CustomerController::class, 'create'])->name('create-customer');

    Route::get('/customer', [CustomerController::class, 'view'])->name('customers');

    Route::post('/update-customer/{id}', [CustomerController::class, 'update'])->name('update.customer');

    Route::post('/delete-customer/{id}', [CustomerController::class, 'delete'])->name('delete.customer');

    Route::post('/customer_upload/{id}', [CustomerController::class, 'upload'])->name('customer.upload');

    Route::get('/customer/{id}/download/{name}', [CustomerController::class, 'download'])->name('customer.download');

    Route::get('chi-tiet-khach-hang/{id}', [CustomerController::class, 'show'])->name('customer-detail.list');

    Route::get('/nhan_su', [PersonnelController::class, 'view'])->name('personel.view');

    Route::get('/danh_sach_san_pham_cho_select', [ProductController::class, 'getAll'])->name('personal.getAll');

    Route::get('/department_getAll', [DepartmentController::class, 'getAll'])->name('department.getAll');

    Route::get('/route_direction_getAll', [RouteDirectionController::class, 'getAll'])->name('routeDirection.getAll');

    Route::get('/route_direction_getDirection/{id}', [RouteDirectionController::class, 'getCoordinatesDirection'])->name('routeDirection.getDirection');

    Route::get('/route_direction_getInfo/{id}', [RouteDirectionController::class, 'getInfo'])->name('routeDirection.getInfo');

    // Route::get('/map/{id}', [RouteDirectionController::class, 'showMap'])->name('map');

    // Route::post('/get-customer', [CustomerController::class, 'store'])->name('store-customer');

    // Route::get('/get-customer/{id}', [CustomerController::class, 'findById'])->name('find-customer-byId');

    Route::get('/order', [OrderController::class, 'index'])->name('index.order');

    // Trang chủ
    Route::get('/dashboard', [DashboardController::class, 'indexv2'])->name("dashboard");

    Route::get('de-xuat-theo-mau', [ProposalController::class, 'index'])->name('proposal.list');

    Route::get('de-xuat-theo-mau/1', [ProposalController::class, 'show'])->name('proposal.show');

    // danh sách vị trí
    Route::get('danh-sach-vi-tri', [PositionController::class, 'index'])->name('position.list');

    Route::get('danh-sach-khach-hang', [CustomerController::class, 'index'])->name('customer.list');
    Route::get('chi-tiet-khach-hang/{id}', [CustomerController::class, 'show'])->name('customer-detail.list');


    Route::get('danh-sach-san-pham', [ProductController::class, 'index'])->name('product.list');
    Route::post('them-moi-san-pham', [ProductController::class, 'store'])->name('product.store');
    Route::put('sua-san-pham/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('xoa-san-pham/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('chi-tiet-san-pham/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::post('them-moi-chi-tiet/{id}', [ProductController::class, 'create'])->name('product.create');
    Route::post('them-san-pham-lien-quan/{id}', [ProductController::class, 'related'])->name('product.related');
    Route::post('xoa-chi-tiet/{id}', [ProductController::class, 'delete'])->name('product.deleted');

    Route::get('danh-sach-phien-ban', [VersionController::class, 'index'])->name('version.list');
    Route::post('them-moi-phien-ban', [VersionController::class, 'store'])->name('version.store');
    Route::put('sua-phien-ban/{id}', [VersionController::class, 'update'])->name('version.update');
    Route::delete('xoa-phien-ban/{id}', [VersionController::class, 'destroy'])->name('version.destroy');

    Route::get('danh-sach-tuy-chinh', [CustomController::class, 'index'])->name('custom.list');
    Route::post('them-moi-tuy-chinh', [CustomController::class, 'store'])->name('custom.store');
    Route::put('sua-tuy-chinh/{id}', [CustomController::class, 'update'])->name('custom.update');
    Route::delete('xoa-tuy-chinh/{id}', [CustomController::class, 'destroy'])->name('custom.destroy');

    Route::get('danh-sach-tuyen', [RouteDirectionController::class, 'view'])->name('routeDirection.view');
    Route::post('danh-sach-tuyen', [RouteDirectionController::class, 'store'])->name('routeDirection.store');
    Route::put('sua-tuyen/{id}', [RouteDirectionController::class, 'update'])->name('routeDirection.update');
    Route::delete('xoa-tuyen/{id}', [RouteDirectionController::class, 'destroy'])->name('routeDirection.destroy');

    Route::get('danh-sach-dia-ban', [LocalityController::class, 'index'])->name('locality.index');
    Route::post('danh-sach-dia-ban', [LocalityController::class, 'store'])->name('locality.store');
    Route::post('danh-sach-dia-ban/{id}', [LocalityController::class, 'update'])->name('locality.update');
    Route::post('danh-sach-dia-banx/{id}', [LocalityController::class, 'destroy'])->name('locality.destroy');
    Route::post('danh-sach-dia-ban-delete', [LocalityController::class, 'delete'])->name('locality.delete');

    Route::get('danh-sach-khu-vuc', [AreaController::class, 'index'])->name('area.index');
    Route::post('danh-sach-khu-vuc', [AreaController::class, 'store'])->name('area.store');
    Route::post('danh-sach-khu-vuc/{id}', [AreaController::class, 'update'])->name('area.update');
    Route::post('danh-sach-khu-vucx/{id}', [AreaController::class, 'destroy'])->name('area.destroy');
    Route::post('danh-sach-khu-vuc-delete', [AreaController::class, 'delete'])->name('area.delete');

    Route::get('chi-tiet-khach-hang/{id}', [CustomerController::class, 'show'])->name('customer-detail.list');
    Route::get('department', [DepartmentController::class, 'index'])->name('department.index');
    Route::post('department', [DepartmentController::class, 'store'])->name('department.store');
    Route::post('department/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::post('department/{id}', [DepartmentController::class, 'update'])->name('department.update');
    Route::post('departmentr/{id}', [DepartmentController::class, 'destroy'])->name('departmentr.destroy');
    Route::post('department-delete', [DepartmentController::class, 'delete'])->name('delete-selected-items');

    Route::get('position', [PositionController::class, 'index'])->name('position.index');
    Route::post('position', [PositionController::class, 'store'])->name('position.store');
    Route::post('position/{id}', [PositionController::class, 'update'])->name('position.update');
    Route::post('positionx/{id}', [PositionController::class, 'destroy'])->name('positionx.destroy');
    Route::post('position-delete', [PositionController::class, 'delete'])->name('Position.delete');

    Route::get('cap-nhan-su', [PersonnelLevelController::class, 'index'])->name('PersonnelLevel.index');
    Route::post('cap-nhan-su', [PersonnelLevelController::class, 'store'])->name('PersonnelLevel.store');
    Route::post('cap_nhan_sux/{id}', [PersonnelLevelController::class, 'update'])->name('PersonnelLevel.update');
    Route::post('cap_nhan_su/{id}', [PersonnelLevelController::class, 'destroy'])->name('PersonnelLevelx.destroy');
    Route::post('cap_nhan_su-delete', [PersonnelLevelController::class, 'delete'])->name('PersonnelLevel.delete');


    Route::get('nhan-su', [PersonnelController::class, 'index'])->name('Personnel.index');
    Route::get('nhan-su-vitri', [PersonnelController::class, 'indexvtri'])->name('Personnel.indexvtri');
    Route::get('nhan-su-dia-ban', [PersonnelController::class, 'indexDiaBan'])->name('Personnel.indexDiaBan');
    Route::post('nhan-su-vitri', [PersonnelController::class, 'store'])->name('Personnel.store.vtri');
    Route::post('nhan-su-dia-ban', [PersonnelController::class, 'store'])->name('Personnel.store.diaban');
    Route::post('nhan-su', [PersonnelController::class, 'store'])->name('Personnel.store');
    Route::post('nhan_sux/{id}', [PersonnelController::class, 'update'])->name('Personnel.update');
    Route::post('nhan_su/{id}', [PersonnelController::class, 'destroy'])->name('Personnel.destroy');
    Route::get('nhan_suv/{department_id}', [PersonnelController::class, 'show'])->name('Personnel.show');
    Route::get('nhan_suvtri/{position_id}', [PersonnelController::class, 'showVtri'])->name('Personnel.show.vtri');
    Route::get('nhan_su_dia_ban/{area_id}', [PersonnelController::class, 'showDiaBan'])->name('Personnel.show.diaban');
    Route::get('nhan_su_vung/{department_id}', [PersonnelController::class, 'showVung'])->name('Personnel.show.vung');
    Route::post('nhan_su-delete', [PersonnelController::class, 'delete'])->name('Personnel.delete');

    Route::get('vai-tro', [RoleController::class, 'index'])->name('Role.index');
    Route::post('vai-tro', [RoleController::class, 'store'])->name('Role.store');
    Route::post('vai-trox/{id}', [RoleController::class, 'update'])->name('Rolex.update');
    Route::post('vai-tro/{id}', [RoleController::class, 'destroy'])->name('Role.destroy');
    Route::post('vai-tro-delete', [RoleController::class, 'delete'])->name('Role.delete');

    Route::get('nhom-khach-hang', [CustomerGroupController::class, 'index'])->name('CustomerGroup.index');
    Route::post('them-nhom-khach-hang', [CustomerGroupController::class, 'store'])->name('CustomerGroup.store');
    Route::post('sua-nhom-khach-hang/{id}', [CustomerGroupController::class, 'update'])->name('CustomerGroup.update');
    Route::post('xoa-nhom-khach-hang/{id}', [CustomerGroupController::class, 'destroy'])->name('CustomerGroup.destroy');

    Route::get('nhom-thong-so-ky-thuat', [TechnicalSpecificationsGroupController::class, 'index'])->name('TechnicalSpecificationsGroup.index');
    Route::post('them-nhom-thong-so-ky-thuat', [TechnicalSpecificationsGroupController::class, 'store'])->name('TechnicalSpecificationsGroup.store');
    Route::post('sua-nhom-thong-so-ky-thuat/{id}', [TechnicalSpecificationsGroupController::class, 'update'])->name('TechnicalSpecificationsGroup.update');
    Route::post('xoa-nhom-thong-so-ky-thuat/{id}', [TechnicalSpecificationsGroupController::class, 'destroy'])->name('TechnicalSpecificationsGroup.destroy');
    Route::post('nhom-thong-so-ky-thuat-delete', [TechnicalSpecificationsGroupController::class, 'delete'])->name('TechnicalSpecificationsGroup.delete');

    Route::get('thong-so-ky-thuat', [SpecificationsController::class, 'index'])->name('Specifications.index');
    Route::post('them-thong-so-ky-thuat', [SpecificationsController::class, 'store'])->name('Specifications.store');
    Route::post('sua-thong-so-ky-thuat/{id}', [SpecificationsController::class, 'update'])->name('Specifications.update');
    Route::post('xoa-thong-so-ky-thuat/{id}', [SpecificationsController::class, 'destroy'])->name('Specifications.destroy');
    Route::post('thong-so-ky-thuat-delete', [SpecificationsController::class, 'delete'])->name('Specifications.delete');

});

Route::get('/export/customer', [ExcelController::class, 'setExportCustomter']);

// 404
Route::fallback(function () {
    return view('404');
});
