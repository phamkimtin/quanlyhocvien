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

Route::get('/logout', [HomeController::class, 'checkLogout'])->name('logout');

Route::post('/doi-mat-khau', [TaiKhoanController::class, 'doiMatKhau'])->name('doi-mat-khau');