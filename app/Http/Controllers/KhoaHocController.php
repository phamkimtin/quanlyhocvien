<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\KhoaHocModel;
use DB;

class KhoaHocController extends Controller
{
	public function getAllKhoaHoc(Request $request){
		
		$dsKhoaHoc = KhoaHocModel::getAll();
		return view('pages/modules/KhoaHoc/khoa-hoc', compact('dsKhoaHoc'));
	}

	public function loadDanhSachKhoaHoc(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		if(!in_array('view_khoa_hoc',session('quyen'))) return redirect()->route('404');
		$dsKhoaHoc = KhoaHocModel::getAll();
		return view('pages/modules/KhoaHoc/danh-sach-khoa-hoc', compact('dsKhoaHoc'));
	}

	public function themKhoaHoc(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$KhoaHoc = new KhoaHocModel();
		$KhoaHoc->ma_khoa_hoc = $request->maKhoaHocThem;
		$KhoaHoc->ten_khoa_hoc = $request->tenKhoaHocThem;
		$KhoaHoc->tu_nam = $request->tuNamThem;
		$KhoaHoc->den_nam = $request->denNamThem;
		$KhoaHoc->state = $request->trangThai; 
		$KhoaHoc->save();
		return true;
	}

	public function xoaKhoaHoc(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$KhoaHoc = KhoaHocModel::find($request->id);
		if($KhoaHoc->delete()) return true; else return false;
	}

	public function loadKhoaHocSua(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$KhoaHoc = KhoaHocModel::find($request->id);
		return $KhoaHoc;
	}

	public function luuKhoaHocSua(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		try{
			$KhoaHoc = KhoaHocModel::find($request->idKhoaHocSua);
			$KhoaHoc->ma_khoa_hoc = $request->maKhoaHocSua;
			$KhoaHoc->ten_khoa_hoc = $request->tenKhoaHocSua;
			$KhoaHoc->tu_nam = $request->tuNamSua;
			$KhoaHoc->den_nam = $request->denNamSua;
			$KhoaHoc->state = $request->trangThaiSua; 
			$KhoaHoc->save();
			return true;
		}
		catch(\Exception $ex){
			return $ex;
		}
	}

	public static function getDsKhoaHoc(){
		return $value = KhoaHocModel::where('state','=',1)->get();
	}

	public static function getKhoaHocByMa($ma_khoa_hoc){
		$value = KhoaHocModel::where('ma_khoa_hoc','=',$ma_khoa_hoc)->first();
		return $value;
	}

	public static function getDsNamHoc(){
		$value = KhoaHocModel::select('tu_nam')
						    ->orderBy('tu_nam','DESC')
						    ->groupBy('tu_nam')
						    ->get();
		return $value;
	}

	public static function getKhoaHocByNam(Request $request){
		if($request->namHoc==-1){
			$dsKhoaHoc = KhoaHocModel::where('state','=',1)->get();
		}
		else{
			$dsKhoaHoc = KhoaHocModel::where('state','=',1)->where('tu_nam','=',$request->namHoc)->get();
		}
		return view('pages/modules/HocVien/ajax/get-khoa-hoc-by-nam-hoc', compact('dsKhoaHoc'));
	}

	public static function getKhoaHoc(Request $request){
		if($request->namHoc==-1){
			$dsKhoaHoc = KhoaHocModel::where('state','=',1)->get();
		}
		else{
			$dsKhoaHoc = KhoaHocModel::where('state','=',1)->where('tu_nam','=',$request->namHoc)->get();
		}
		return view('pages/modules/KhoaHoc/ajax/get-khoa-hoc', compact('dsKhoaHoc'));
	}
}
