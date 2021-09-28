<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaiKhoanController;

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

Route::get('/tai-khoan', function () {
    if(!session('login-state')) return redirect()->route('login');
    if(!in_array('view_tai_khoan',session('quyen'))) return redirect()->route('404');
    Session::put('active-menu', 'menu-tai-khoan');
    Session::put('parent-active-menu', 'menu-danh-muc');
    return view('pages/modules/TaiKhoan/tai-khoan');
})->name('tai-khoan');

Route::get('/load-danh-sach-tai-khoan', [TaiKhoanController::class, 'loadDanhSachTaiKhoan'])->name('load-danh-sach-tai-khoan');

Route::post('/them-tai-khoan', [TaiKhoanController::class, 'themTaiKhoan'])->name('them-tai-khoan');

Route::post('/xoa-tai-khoan', [TaiKhoanController::class, 'xoaTaiKhoan'])->name('xoa-tai-khoan');

Route::post('/load-tai-khoan-sua', [TaiKhoanController::class, 'loadTaiKhoanSua'])->name('load-tai-khoan-sua');

Route::post('/luu-tai-khoan-sua', [TaiKhoanController::class, 'luuTaiKhoanSua'])->name('luu-tai-khoan-sua');