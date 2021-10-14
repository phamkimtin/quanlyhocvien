<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhomQuyenController;

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

Route::get('/phan-nhom-quyen', [NhomQuyenController::class, 'loadPhanNhomQuyen'])->name('phan-nhom-quyen');

Route::get('/phan-quyen-user', function () {
    if(!session('login-state')) return redirect()->route('login');
    if(session('nhom-quyen')!='admin') return redirect()->route('404');
    session([
        'active-menu' => 'menu-phan-quyen-user',
        'parent-active-menu' => 'menu-phan-quyen'
    ]);
    return view('pages/modules/PhanQuyen/phan-quyen-user');
})->name('phan-quyen-user');

Route::post('/luu-phan-quyen-nhom-quyen', [NhomQuyenController::class, 'luuPhanQuyenNhomQuyen'])->name('luu-phan-quyen-nhom-quyen');

Route::post('/load-danh-sach-quyen', [NhomQuyenController::class, 'loadDanhSachQuyen'])->name('load-danh-sach-quyen');
