<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\DanTocController;


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

Route::get('/', function () {
    return view('pages/login');
})->name('login');

Route::get('/trang-chu', function () {
    Session::forget('parent-active-menu');
    Session::put('active-menu', 'menu-trang-chu');
    return view('pages/home');
})->name('trang-chu');

Route::post('/check-login', [HomeController::class, 'checkLogin'])->name('check-login');

Route::get('/tai-khoan', function () {
    if(!session('login-state')) return redirect()->route('login');
    Session::put('active-menu', 'menu-tai-khoan');
    Session::put('parent-active-menu', 'menu-danh-muc');
    return view('pages/modules/TaiKhoan/tai-khoan');
})->name('tai-khoan');

Route::get('/logout', [HomeController::class, 'checkLogout'])->name('logout');

Route::get('/load-danh-sach-tai-khoan', [TaiKhoanController::class, 'loadDanhSachTaiKhoan'])->name('load-danh-sach-tai-khoan');

Route::post('/them-tai-khoan', [TaiKhoanController::class, 'themTaiKhoan'])->name('them-tai-khoan');

Route::post('/xoa-tai-khoan', [TaiKhoanController::class, 'xoaTaiKhoan'])->name('xoa-tai-khoan');

Route::post('/load-tai-khoan-sua', [TaiKhoanController::class, 'loadTaiKhoanSua'])->name('load-tai-khoan-sua');

Route::post('/luu-tai-khoan-sua', [TaiKhoanController::class, 'luuTaiKhoanSua'])->name('luu-tai-khoan-sua');

Route::post('/doi-mat-khau', [TaiKhoanController::class, 'doiMatKhau'])->name('doi-mat-khau');

Route::get('/dm-dan-toc', function () {
    if(!session('login-state')) return redirect()->route('login');
    Session::put('active-menu', 'menu-dm-danh-toc');
    Session::put('parent-active-menu', 'menu-danh-muc');
    return view('pages/modules/DanToc/dan-toc');
})->name('dm-dan-toc');

Route::get('/load-danh-sach-dan-toc', [DanTocController::class, 'loadDanhSachDanToc'])->name('load-danh-sach-dan-toc');
