<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
});
Route::get('/trang-chu', function () {
    return view('pages/home');
})->name('trang-chu');
Route::post('/check-login', [HomeController::class, 'checkLogin'])->name('check-login');