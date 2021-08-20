<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\TaiKhoanModel;

class TaiKhoanController extends Controller
{
	public function getAllTaiKhoan(Request $request){
		
		$dsTaiKhoan = TaiKhoanModel::getAll();
		return view('pages/modules/TaiKhoan/tai-khoan', compact('dsTaiKhoan'));
	}

	public function loadDanhSachTaiKhoan(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$dsTaiKhoan = TaiKhoanModel::getAll();
		return view('pages/modules/TaiKhoan/danh-sach-tai-khoan', compact('dsTaiKhoan'));
	}

	public function themTaiKhoan(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$TaiKhoan = new TaiKhoanModel();
		$TaiKhoan->hoten = $request->hoTen;
		$TaiKhoan->username = $request->taiKhoan;
		$TaiKhoan->password = base64_encode(md5($request->matKhau)).'z';
		$TaiKhoan->gioi_tinh = $request->gioiTinh;
		$TaiKhoan->hinh_anh = '';
		$TaiKhoan->di_dong = $request->diDong;
		$TaiKhoan->nhom_quyen = $request->nhomQuyen;
		$TaiKhoan->state = $request->trangThai; 
		$TaiKhoan->save();
		return true;

	}

	public function xoaTaiKhoan(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$TaiKhoan = TaiKhoanModel::find($request->idTaiKhoan);
		if($TaiKhoan->delete()) return true; else return false;
	}

	public function loadTaiKhoanSua(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$TaiKhoan = TaiKhoanModel::find($request->idTaiKhoan);
		return $TaiKhoan;
	}

	public function luuTaiKhoanSua(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		try{
			$TaiKhoan = TaiKhoanModel::find($request->idTaiKhoanSua);
			$TaiKhoan->hoten = $request->hoTenSua;
			if(!empty($request->matKhauSua)){
				$TaiKhoan->password = base64_encode(md5($request->matKhauSua)).'z';
			}
			$TaiKhoan->gioi_tinh = $request->gioiTinhSua;
			$TaiKhoan->hinh_anh = '';
			$TaiKhoan->di_dong = $request->diDongSua;
			$TaiKhoan->nhom_quyen = $request->nhomQuyenSua;
			$TaiKhoan->state = $request->trangThaiSua; 
			$TaiKhoan->save();
			return true;
		}
		catch(\Exception $ex){
			return $ex;
		}
	}

	public function doiMatKhau(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$TaiKhoan = TaiKhoanModel::getFromUsername($request->userName);
		if($TaiKhoan==false) return false;
		if($TaiKhoan->password!=base64_encode(md5($request->matKhauCu)).'z') return -1;
		$TaiKhoan->password = base64_encode(md5($request->matKhauMoi)).'z';
		$TaiKhoan->save();
		return true;
	}
}
