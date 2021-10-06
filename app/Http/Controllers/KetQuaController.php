<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\KetQuaModel;
use App\Models\XepMonHocModel;
use App\Models\KhoaHocModel;
use DB;

class KetQuaController extends Controller
{
	public  function loadDanhSachChamDiem(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$countMonHoc = XepMonHocModel::where('id_khoa_hoc','=',$request->idKhoaHoc)->count();
		$dsMonHoc = DB::table('mon_hoc')
						->select('*')
						->join('xep_mon_hoc','mon_hoc.id','=','xep_mon_hoc.id_mon_hoc')
						->join('khoa_hoc','khoa_hoc.id','=','xep_mon_hoc.id_khoa_hoc')
						->where('khoa_hoc.id','=',$request->idKhoaHoc)
						->get();
		$dsHocVien = DB::table('hoc_vien')
						->select('*',\DB::raw("SUBSTRING_INDEX(users.hoten, ' ', -1) as ten"))
						->join('khoa_hoc','hoc_vien.ma_khoa_hoc','=','khoa_hoc.ma_khoa_hoc')
						->join('users','hoc_vien.id_user','=','users.id')
						->join('dm_don_vi','hoc_vien.ma_don_vi','=','dm_don_vi.ma_don_vi')
						->where('khoa_hoc.id','=',$request->idKhoaHoc)
						->orderBy('hoc_vien.ma_don_vi','ASC')
						->orderBy('ten','ASC')
						->get();
		return view('pages/modules/ChamDiem/danh-sach-hoc-vien', compact('dsMonHoc','dsHocVien'));
	}

	public static function getKhoaHoc(Request $request){
		if($request->namHoc==-1){
			$dsKhoaHoc = KhoaHocModel::where('state','=',1)->get();
		}
		else{
			$dsKhoaHoc = KhoaHocModel::where('state','=',1)->where('tu_nam','=',$request->namHoc)->get();
		}
		return view('pages/modules/ChamDiem/get-khoa-hoc', compact('dsKhoaHoc'));
	}
}
