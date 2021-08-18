<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\TaiKhoanModel;

class TaiKhoanController extends Controller
{
	public function getAllTaiKhoan(Request $request){
		$dsTaiKhoan = TaiKhoanModel::getAll();
		return view('pages/modules/TaiKhoan/taikhoan', compact('dsTaiKhoan'));
	}
	public function createTaiKhoan(Request $request){

	}
}
