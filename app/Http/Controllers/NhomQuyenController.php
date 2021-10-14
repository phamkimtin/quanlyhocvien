<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\NhomQuyenModel;
use App\Models\QuyenNhomQuyenModel;

class NhomQuyenController extends Controller
{
	public function loadPhanNhomQuyen(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		if(session('nhom-quyen')!='admin') return redirect()->route('404');
        session([
            'active-menu' => 'menu-phan-nhom-quyen',
            'parent-active-menu' => 'menu-phan-quyen'
        ]);
		$dsNhomQuyen = NhomQuyenModel::getAll();
		return view('pages/modules/PhanQuyen/phan-nhom-quyen', compact('dsNhomQuyen'));
	}

	public function luuPhanQuyenNhomQuyen(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$nhomQuyen = $request->nhomQuyen;
		$danhSachQuyen = $request->danhSachQuyen;
		if(!$danhSachQuyen){
			QuyenNhomQuyenModel::where('ma_nhom_quyen','=',$nhomQuyen)->delete();
			return true;
		}
		else if(count($danhSachQuyen)>0){
			QuyenNhomQuyenModel::where('ma_nhom_quyen','=',$nhomQuyen)->delete();
			foreach($danhSachQuyen as $index => $value){
				$QuyenNhomQuyen = new QuyenNhomQuyenModel();
				$QuyenNhomQuyen->ma_nhom_quyen = $nhomQuyen;
				$QuyenNhomQuyen->ma_quyen = $value;
				$QuyenNhomQuyen->save();

			}
			return true;
		}
		else{
			QuyenNhomQuyenModel::where('ma_nhom_quyen','=',$nhomQuyen)->delete();
			return true;
		}
		return false;
	}

	public function loadDanhSachQuyen(Request $request){
		$nhomQuyen = $request->nhomQuyen;
		return view('pages/modules/PhanQuyen/danh-sach-quyen', compact('nhomQuyen'));
	}

	public static function checkQuyenNhomQuyen($ma_nhom_quyen,$ma_quyen){
		$check = QuyenNhomQuyenModel::checkQuyenNhomQuyen($ma_nhom_quyen,$ma_quyen);
		return $check;
	}

	public static function getNhomQuyen(){
		$value = NhomQuyenModel::getAll();
		return $value;
	}

	public static function getByMaNhomQuyen($ma_nhom_quyen){
		$value = NhomQuyenModel::where('ma_nhom_quyen','=',$ma_nhom_quyen)->first();
		return $value;
	}
}
