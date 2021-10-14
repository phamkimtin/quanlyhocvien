<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\KetQuaModel;
use App\Models\XepMonHocModel;
use App\Models\KhoaHocModel;

class KetQuaController extends Controller
{
	public  function loadDanhSachChamDiem(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$idKhoaHoc = $request->idKhoaHoc;
		$countMonHoc = XepMonHocModel::where('id_khoa_hoc','=',$request->idKhoaHoc)->count();
		$dsMonHoc = DB::table('mon_hoc')
						->select('*','mon_hoc.id as id_mon_hoc')
						->join('xep_mon_hoc','mon_hoc.id','=','xep_mon_hoc.id_mon_hoc')
						->join('khoa_hoc','khoa_hoc.id','=','xep_mon_hoc.id_khoa_hoc')
						->where('khoa_hoc.id','=',$request->idKhoaHoc)
						->get();
		$dsHocVien = DB::table('hoc_vien')
						->select('*',DB::raw("SUBSTRING_INDEX(users.hoten, ' ', -1) as ten"))
						->join('khoa_hoc','hoc_vien.ma_khoa_hoc','=','khoa_hoc.ma_khoa_hoc')
						->join('users','hoc_vien.id_user','=','users.id')
						->join('dm_don_vi','hoc_vien.ma_don_vi','=','dm_don_vi.ma_don_vi')
						->where('khoa_hoc.id','=',$request->idKhoaHoc)
						->orderBy('hoc_vien.ma_don_vi','ASC')
						->orderBy('ten','ASC')
						->get();
		return view('pages/modules/ChamDiem/danh-sach-hoc-vien', compact('dsMonHoc','dsHocVien','idKhoaHoc'));
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

	public  function luuChamDiem(Request $request){
		$check = KetQuaModel::where('id_user','=',$request->idHocVien)
							->where('id_mon_hoc','=',$request->idMonHoc)
							->where('id_khoa_hoc','=',$request->idKhoaHoc)
							->count();

		if($check==0){
			$KetQua = new KetQuaModel();
			$KetQua->id_user = $request->idHocVien;
			$KetQua->id_mon_hoc = $request->idMonHoc;
			$KetQua->id_khoa_hoc = $request->idKhoaHoc;
			$KetQua->diem = $request->diem;
			$KetQua->xep_loai = $request->xepLoai;
			if($KetQua->save()) return true; else return false;
		}
		else if($check==1){
			$KetQua = KetQuaModel::where('id_user','=',$request->idHocVien)
								->where('id_mon_hoc','=',$request->idMonHoc)
								->where('id_khoa_hoc','=',$request->idKhoaHoc)
								->first();
			$KetQua->id_user = $request->idHocVien;
			$KetQua->id_mon_hoc = $request->idMonHoc;
			$KetQua->id_khoa_hoc = $request->idKhoaHoc;
			$KetQua->diem = $request->diem;
			$KetQua->xep_loai = $request->xepLoai;
			if($KetQua->save()) return true; else return false;
		}
	}

	public static function checkDiem($idHocVien,$idMonHoc,$idKhoaHoc){
		$check = KetQuaModel::where('id_user','=',$idHocVien)
							->where('id_mon_hoc','=',$idMonHoc)
							->where('id_khoa_hoc','=',$idKhoaHoc)
							->first();
		return $check;
	}

	public function timHocVien(Request $request){
		$idKhoaHoc = $request->idKhoaHoc;
		$countMonHoc = XepMonHocModel::where('id_khoa_hoc','=',$request->idKhoaHoc)->count();
		$dsMonHoc = DB::table('mon_hoc')
						->select('*','mon_hoc.id as id_mon_hoc')
						->join('xep_mon_hoc','mon_hoc.id','=','xep_mon_hoc.id_mon_hoc')
						->join('khoa_hoc','khoa_hoc.id','=','xep_mon_hoc.id_khoa_hoc')
						->where('khoa_hoc.id','=',$request->idKhoaHoc)
						->get();
		$dsHocVien = DB::table('hoc_vien')
						->select('*',DB::raw("SUBSTRING_INDEX(users.hoten, ' ', -1) as ten"))
						->join('khoa_hoc','hoc_vien.ma_khoa_hoc','=','khoa_hoc.ma_khoa_hoc')
						->join('users','hoc_vien.id_user','=','users.id')
						->join('dm_don_vi','hoc_vien.ma_don_vi','=','dm_don_vi.ma_don_vi')
						->where([
		                    ['khoa_hoc.id', '=', $request->idKhoaHoc],
		                    ['hoc_vien.ma_hoc_vien', 'LIKE', '%'.$request->string.'%'],
		                ])
		                ->orWhere([
		                    ['khoa_hoc.id', '=', $request->idKhoaHoc],
		                    ['users.hoten', 'LIKE', '%'.$request->string.'%'],
		                ])
						->orderBy('hoc_vien.ma_don_vi','ASC')
						->orderBy('ten','ASC')
						->get();

		return view('pages/modules/ChamDiem/danh-sach-hoc-vien', compact('dsMonHoc','dsHocVien','idKhoaHoc'));
	}
}
