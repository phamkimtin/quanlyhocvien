<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\DanTocModel;

class DanTocController extends Controller
{
	public function getAllDanToc(Request $request){
		$dsDanToc = DanTocModel::getAll();
		return view('pages/modules/DanToc/dan-toc', compact('dsDanToc'));
	}

	public function loadDanhSachDanToc(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		if(!in_array('view_dan_toc',session('quyen'))) return redirect()->route('404');
		$dsDanToc = DanTocModel::getAll();
		return view('pages/modules/DanToc/danh-sach-dan-toc', compact('dsDanToc'));
	}

	public function themDanToc(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$DanToc = new DanTocModel();
		$DanToc->ma_dan_toc = $request->maDanTocThem;
		$DanToc->ten_dan_toc = $request->tenDanTocThem;
		$DanToc->state = $request->trangThai; 
		$DanToc->save();
		return true;

	}

	public function xoaDanToc(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$DanToc = DanTocModel::find($request->idDanToc);
		if($DanToc->delete()) return true; else return false;
	}

	public function loadDanTocSua(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$DanToc = DanTocModel::find($request->idDanToc);
		return $DanToc;
	}

	public function luuDanTocSua(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		try{
			$DanToc = DanTocModel::find($request->idDanTocSua);
			$DanToc->ma_dan_toc = $request->maDanTocSua;
			$DanToc->ten_dan_toc = $request->tenDanTocSua;
			$DanToc->state = $request->trangThaiSua; 
			$DanToc->save();
			return true;
		}
		catch(\Exception $ex){
			return $ex;
		}
	}

	public static function getDsDanToc(){
		$value = DanTocModel::getAll();
		return $value;
	}
	public static function getDanTocByMa($ma_dan_toc){
		$value = DanTocModel::where('ma_dan_toc','=',$ma_dan_toc)->first();
		return $value;
	}
}
