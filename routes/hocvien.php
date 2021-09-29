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

Route::post('/them-hoc-vien', [HocVienController::class, 'themHocVien'])->name('them-hoc-vien');

Route::post('/xoa-hoc-vien', [HocVienController::class, 'xoaHocVien'])->name('xoa-hoc-vien');

Route::post('/load-hoc-vien-sua', [HocVienController::class, 'loadHocVienSua'])->name('load-hoc-vien-sua');

Route::post('/luu-hoc-vien-sua', [HocVienController::class, 'luuHocVienSua'])->name('luu-hoc-vien-sua');

Route::post('/load-hoc-vien-by-khoa-hoc', [HocVienController::class, 'loadHocVienByKhoaHoc'])->name('load-hoc-vien-by-khoa-hoc');

Route::post('/duyet-hoc-vien', [HocVienController::class, 'duyetHocVien'])->name('duyet-hoc-vien');