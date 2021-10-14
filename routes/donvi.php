<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonViController;

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

Route::get('/don-vi', function () {
    if(!session('login-state')) return redirect()->route('login');
    if(!in_array('view_don_vi',session('quyen'))) return redirect()->route('404');
    session([
        'active-menu' => 'menu-don-vi',
        'parent-active-menu' => 'menu-danh-muc'
    ]);
    return view('pages/modules/DonVi/don-vi');
})->name('don-vi');

Route::get('/load-danh-sach-don-vi', [DonViController::class, 'loadDanhSachDonVi'])->name('load-danh-sach-don-vi');

Route::post('/them-don-vi', [DonViController::class, 'themDonVi'])->name('them-don-vi');

Route::post('/xoa-don-vi', [DonViController::class, 'xoaDonVi'])->name('xoa-don-vi');

Route::post('/load-don-vi-sua', [DonViController::class, 'loadDonViSua'])->name('load-don-vi-sua');

Route::post('/luu-don-vi-sua', [DonViController::class, 'luuDonViSua'])->name('luu-don-vi-sua');
