<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\DonViModel;

class DonViController extends Controller
{
	public function getAllDonVi(Request $request){
		$dsDonVi = DonViModel::getAll();
		return view('pages/modules/DonVi/don-vi', compact('dsDonVi'));
	}

	public function loadDanhSachDonVi(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$dsDonVi = DonViModel::getAll();
		return view('pages/modules/DonVi/danh-sach-don-vi', compact('dsDonVi'));
	}

	public static function getTenDonVi($id){
		if(!session('login-state')) return redirect()->route('login');
		$value = DonViModel::getDonViById($id);
		return $value->ten_don_vi;
	}

	public function themDonVi(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$DonVi = new DonViModel();
		$DonVi->ma_don_vi = $request->maDonViThem;
		$DonVi->ten_don_vi = $request->tenDonViThem;
		$DonVi->state = $request->trangThai; 
		$DonVi->save();
		return true;
	}

	public function xoaDonVi(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$DonVi = DonViModel::find($request->id);
		if($DonVi->delete()) return true; else return false;
	}

	public function loadDonViSua(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$DonVi = DonViModel::find($request->id);
		return $DonVi;
	}

	public function luuDonViSua(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		try{
			$DonVi = DonViModel::find($request->idDonViSua);
			$DonVi->ma_don_vi = $request->maDonViSua;
			$DonVi->ten_don_vi = $request->tenDonViSua;
			$DonVi->state = $request->trangThaiSua; 
			$DonVi->save();
			return true;
		}
		catch(\Exception $ex){
			return $ex;
		}
	}

}
