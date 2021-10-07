<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KetQuaController;

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

Route::get('/cham-diem', function () {
    if(!session('login-state')) return redirect()->route('login');
    // if(!in_array('view_khoa_hoc',session('quyen'))) return redirect()->route('404');
    Session::put('active-menu', 'menu-cham-diem');
    Session::forget('parent-active-menu');
    return view('pages/modules/ChamDiem/cham-diem');
})->name('cham-diem');

Route::post('/load-danh-sach-cham-diem', [KetQuaController::class, 'loadDanhSachChamDiem'])->name('load-danh-sach-cham-diem');

Route::post('/get-khoa-hoc-cham-diem', [KetQuaController::class, 'getKhoaHoc'])->name('get-khoa-hoc-cham-diem');

Route::post('/luu-cham-diem', [KetQuaController::class, 'luuChamDiem'])->name('luu-cham-diem');

Route::post('/tim-hoc-vien', [KetQuaController::class, 'timHocVien'])->name('tim-hoc-vien');