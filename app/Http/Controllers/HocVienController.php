<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\HocVienModel;
use App\Models\TaiKhoanModel;

class HocVienController extends Controller
{
	public function getAllHocVien(Request $request){
		$dsUser = TaiKhoanModel::where('nhom-quyen','=','hoc_vien');
		return view('pages/modules/HocVien/hoc-vien', compact('dsUser'));
	}

	public function loadDanhSachHocVien(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		if(!in_array('view_hoc_vien',session('quyen'))) return redirect()->route('404');
		$dsUser = TaiKhoanModel::where('nhom_quyen','=','hoc_vien')->get();
		return view('pages/modules/HocVien/danh-sach-hoc-vien', compact('dsUser'));
	}

	public static function getHvByIduser($id_user){
        $value = HocVienModel::where('id_user','=',$id_user)->first();
        return $value;
    }
	
}
