<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\XepMonHocController;

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

Route::post('/xep-mon-hoc', [XepMonHocController::class, 'xepMonHoc'])->name('xep-mon-hoc');

Route::post('/luu-xep-mon-hoc', [XepMonHocController::class, 'luuXepMonHoc'])->name('luu-xep-mon-hoc');

