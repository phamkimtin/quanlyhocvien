<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonHocController;

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

Route::get('/mon-hoc', function () {
    if(!session('login-state')) return redirect()->route('login');
    if(!in_array('view_mon_hoc',session('quyen'))) return redirect()->route('404');
    session([
        "active-menu" => "menu-mon-hoc",
        "parent-active-menu" => "menu-quan-ly"
    ]);
    return view('pages/modules/MonHoc/mon-hoc');
})->name('mon-hoc');

Route::get('/load-danh-sach-mon-hoc', [MonHocController::class, 'loadDanhSachMonHoc'])->name('load-danh-sach-mon-hoc');

Route::post('/them-mon-hoc', [MonHocController::class, 'themMonHoc'])->name('them-mon-hoc');

Route::post('/xoa-mon-hoc', [MonHocController::class, 'xoaMonHoc'])->name('xoa-mon-hoc');

Route::post('/load-mon-hoc-sua', [MonHocController::class, 'loadMonHocSua'])->name('load-mon-hoc-sua');

Route::post('/luu-mon-hoc-sua', [MonHocController::class, 'luuMonHocSua'])->name('luu-mon-hoc-sua');
