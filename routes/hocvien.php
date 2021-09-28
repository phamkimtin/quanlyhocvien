<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HocVienController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/hoc-vien', function () {
    if(!session('login-state')) return redirect()->route('login');
    if(!in_array('view_hoc_vien',session('quyen'))) return redirect()->route('404');
    Session::put('active-menu', 'menu-hoc-vien');
    Session::put('parent-active-menu', 'menu-quan-ly');
    return view('pages/modules/HocVien/hoc-vien');
})->name('hoc-vien');

Route::get('/load-danh-sach-hoc-vien', [HocVienController::class, 'loadDanhSachHocVien'])->name('load-danh-sach-hoc-vien');

// Route::post('/them-don-vi', [DonViController::class, 'themDonVi'])->name('them-don-vi');

// Route::post('/xoa-don-vi', [DonViController::class, 'xoaDonVi'])->name('xoa-don-vi');

// Route::post('/load-don-vi-sua', [DonViController::class, 'loadDonViSua'])->name('load-don-vi-sua');

// Route::post('/luu-don-vi-sua', [DonViController::class, 'luuDonViSua'])->name('luu-don-vi-sua');