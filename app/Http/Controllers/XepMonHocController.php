<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\XepMonHocModel;
use App\Models\MonHocModel;
use DB;

class XepMonHocController extends Controller
{
	public function xepMonHoc(Request $request){	
		if(!session('login-state')) return redirect()->route('login');
		// if(!in_array('view_khoa_hoc',session('quyen'))) return redirect()->route('404');
		$idKhoaHoc = $request->idKhoaHoc;
		$dsMonHoc = MonHocModel::where('state','=',1)->get();
		// $dsMonHocTrongKhoa = XepMonHocModel::where('id_khoa_hoc','=',$idKhoaHoc)->get();
		$dsMonHocTrongKhoa = DB::table('xep_mon_hoc')
								->select('*')
								->join('mon_hoc','xep_mon_hoc.id_mon_hoc','=','mon_hoc.id')
								->where('id_khoa_hoc','=',$idKhoaHoc)
								->get();
		return view('pages/modules/KhoaHoc/xep-mon-hoc', compact('idKhoaHoc','dsMonHoc','dsMonHocTrongKhoa'));
	}

	public function luuXepMonHoc(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$idKhoaHoc = $request->idKhoaHoc;
		$dsMonHoc = $request->dsMonHoc;
		XepMonHocModel::where('id_khoa_hoc','=',$idKhoaHoc)->delete();
		foreach($dsMonHoc as $monHoc){
			$XepMonHoc = new XepMonHocModel();
			$XepMonHoc->id_mon_hoc = $monHoc;
			$XepMonHoc->id_khoa_hoc = $idKhoaHoc;
			$XepMonHoc->save();
		}
		return true;
	}

	public static function checkCoMonHoc($idKhoaHoc, $idMonHoc){
		$check = XepMonHocModel::where('id_khoa_hoc','=',$idKhoaHoc)->where('id_mon_hoc','=',$idMonHoc)->count();
		return $check;
	}
}
