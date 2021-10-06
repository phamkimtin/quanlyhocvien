<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\MonHocModel;

class MonHocController extends Controller
{
	public function getAllMonHoc(Request $request){
		
		$dsMonHoc = MonHocModel::getAll();
		return view('pages/modules/MonHoc/mon-hoc', compact('dsMonHoc'));
	}

	public function loadDanhSachMonHoc(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		if(!in_array('view_mon_hoc',session('quyen'))) return redirect()->route('404');
		$dsMonHoc = MonHocModel::all();
		return view('pages/modules/MonHoc/danh-sach-mon-hoc', compact('dsMonHoc'));
	}

	public function themMonHoc(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$MonHoc = new MonHocModel();
		$MonHoc->ten_mon_hoc = $request->tenMonHoc;
		$MonHoc->state = $request->trangThai;
		$MonHoc->save();
		return true;

	}

	public function xoaMonHoc(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$MonHoc = MonHocModel::find($request->idMonHoc);
		if($MonHoc->delete()) return true; else return false;
	}

	public function loadMonHocSua(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$MonHoc = MonHocModel::find($request->idMonHoc);
		return $MonHoc;
	}

	public function luuMonHocSua(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		try{
			$MonHoc = MonHocModel::find($request->idMonHocSua);
			$MonHoc->ten_mon_hoc = $request->tenMonHocSua;
			$MonHoc->state = $request->trangThaiSua; 
			$MonHoc->save();
			return true;
		}
		catch(\Exception $ex){
			return $ex;
		}
	}
}
