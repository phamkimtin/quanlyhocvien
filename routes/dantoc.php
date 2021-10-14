<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/dm-dan-toc', function () {
    if(!session('login-state')) return redirect()->route('login');
    if(!in_array('view_dan_toc',session('quyen'))) return redirect()->route('404');
    session([
        'active-menu' => 'menu-dm-danh-toc',
        'parent-active-menu' => 'menu-danh-muc'
    ]);
    return view('pages/modules/DanToc/dan-toc');
})->name('dm-dan-toc');

Route::get('/load-danh-sach-dan-toc', [DanTocController::class, 'loadDanhSachDanToc'])->name('load-danh-sach-dan-toc');

Route::post('/xoa-dan-toc', [DanTocController::class, 'xoaDanToc'])->name('xoa-dan-toc');

Route::post('/them-dan-toc', [DanTocController::class, 'themDanToc'])->name('them-dan-toc');

Route::post('/load-dan-toc-sua', [DanTocController::class, 'loadDanTocSua'])->name('load-dan-toc-sua');

Route::post('/luu-dan-toc-sua', [DanTocController::class, 'luuDanTocSua'])->name('luu-dan-toc-sua');
