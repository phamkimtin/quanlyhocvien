<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhoaHocController;

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

Route::get('/khoa-hoc', function () {
    if(!session('login-state')) return redirect()->route('login');
    if(!in_array('view_khoa_hoc',session('quyen'))) return redirect()->route('404');
    Session::put('active-menu', 'menu-khoa-hoc');
    Session::put('parent-active-menu', 'menu-quan-ly');
    return view('pages/modules/KhoaHoc/khoa-hoc');
})->name('khoa-hoc');

Route::get('/load-danh-sach-khoa-hoc', [KhoaHocController::class, 'loadDanhSachKhoaHoc'])->name('load-danh-sach-khoa-hoc');

Route::post('/them-khoa-hoc', [KhoaHocController::class, 'themKhoaHoc'])->name('them-khoa-hoc');

Route::post('/xoa-khoa-hoc', [KhoaHocController::class, 'xoaKhoaHoc'])->name('xoa-khoa-hoc');

Route::post('/load-khoa-hoc-sua', [KhoaHocController::class, 'loadKhoaHocSua'])->name('load-khoa-hoc-sua');

Route::post('/luu-khoa-hoc-sua', [KhoaHocController::class, 'luuKhoaHocSua'])->name('luu-khoa-hoc-sua');

Route::post('/get-khoa-hoc-by-nam-hoc', [KhoaHocController::class, 'getKhoaHocByNam'])->name('get-khoa-hoc-by-nam-hoc');