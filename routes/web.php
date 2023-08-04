
<?php

use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ProposalController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PersonnelLevelController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['guest'])->group(function () {
    // Đăng nhập
    Route::get('/login', [AuthenticateController::class, 'index'])->name('login.index');

    Route::post('/login', [AuthenticateController::class, 'login'])->name('login');
    // Quên MK
    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/log-out', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');

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


    Route::get('danh-sach-khach-hang', function () {
        return view('other.danhSachKhachHang');
    });

    Route::get('chi-tiet-khach-hang', function () {
        return view('other.chiTietKhachHang');
    });

    Route::get('danh-sach-san-pham', function () {
        return view('Product.danhSachSanPham');
    });

    Route::get('danh-sach-tuyen', function () {
        return view('other.danhSachTuyen');
    });
    Route::get('danh-sach-dia-ban', function () {
        return view('Address.danhSachDiaBan');
    });

    Route::get('danh-sach-khu-vuc', function () {
        return view('Address.danhSachKhuVuc');
    });

    Route::get('danh-sach-tuy-chinh', function () {
        return view('Product.danhSachTuyChinh');
    });

    Route::get('danh-sach-phien-ban', function () {
        return view('Product.danhSachPhienBan');
    });


    Route::get('bao-gia', function () {
        return view('other.baoGia');
    });

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
});
