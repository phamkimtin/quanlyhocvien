<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Session;
use App\Models\HocVienModel;
use App\Models\TaiKhoanModel;
use DB;

class HocVienController extends Controller
{
	public function getAllHocVien(Request $request){
		$dsUser = TaiKhoanModel::where('nhom_quyen','=','hoc_vien');
		return view('pages/modules/HocVien/hoc-vien', compact('dsUser'));
	}

	public function loadDanhSachHocVien(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		if(!in_array('view_hoc_vien',session('quyen'))) return redirect()->route('404');
		// $dsUser = TaiKhoanModel::where('nhom_quyen','=','hoc_vien')->get();
		$dsUser = DB::table('users')
			->select("*",\DB::raw("SUBSTRING_INDEX(hoten, ' ', -1) as ten"))
			->where('nhom_quyen','=','hoc_vien')
			->orderBy('ten','ASC')
    		->get();
		return view('pages/modules/HocVien/danh-sach-hoc-vien', compact('dsUser'));
	}

	public static function getHvByIduser($id_user){
        $value = HocVienModel::where('id_user','=',$id_user)->first();
        return $value;
    }

    public function themHocVien(Request $request){
    	if(!session('login-state')) return redirect()->route('login');
    	$checkTaiKhoan = TaiKhoanModel::where('username','=',$request->userName)->count();
    	if($checkTaiKhoan>0) return 'trung_username';

    	$TaiKhoan = new TaiKhoanModel();
    	$TaiKhoan->hoten = $request->hoTen;
    	$TaiKhoan->username = $request->userName;
    	$TaiKhoan->password = base64_encode(md5('vnpt')).'z';
    	$TaiKhoan->gioi_tinh = $request->gioiTinh;
    	$TaiKhoan->di_dong = $request->diDong;
    	$TaiKhoan->nhom_quyen = 'hoc_vien';
    	$TaiKhoan->state = $request->state;
    	$TaiKhoan->save();

    	$idTaiKhoan = $TaiKhoan->id;

    	$HocVien = new HocVienModel();
    	$HocVien->id_user = $idTaiKhoan;
    	$HocVien->ma_hoc_vien = $request->maHocVien;
    	$HocVien->nam_sinh = $request->namSinh;
    	$HocVien->noi_sinh = $request->noiSinh;
    	$HocVien->chuc_vu_dang = $request->chucVuDang;
    	$HocVien->chuc_vu_chinh_quyen = $request->chucVuCQ;
    	$HocVien->ma_dan_toc = $request->idDanToc;
    	$HocVien->ma_don_vi = $request->idDonVi;
    	$HocVien->ma_khoa_hoc = $request->idKhoaHoc;
    	$HocVien->state = $request->state;
    	$HocVien->save();

    	return true;
    }
	
	public function loadHocVienSua(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$TaiKhoan = TaiKhoanModel::find($request->idUser);
		$HocVien = HocVienModel::where('id_user','=',$request->idUser)->first();
		return array(
			'taikhoan' => $TaiKhoan,
			'hocvien' => $HocVien
		);
	}

	public function luuHocVienSua(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		try{
			$TaiKhoan = TaiKhoanModel::find($request->idTaiKhoan);
			if($TaiKhoan->username != $request->userName){
				$checkTaiKhoan = TaiKhoanModel::where('username','=',$request->userName)->count();
    			if($checkTaiKhoan>0) return 'trung_username';
			}
			$TaiKhoan->hoten = $request->hoTen;
			$TaiKhoan->username = $request->userName;
			if($request->matKhau!=""){		
				$TaiKhoan->password = base64_encode(md5($request->matKhau)).'z';;
			}
			$TaiKhoan->gioi_tinh = $request->gioiTinh;
			$TaiKhoan->di_dong = $request->diDong;
			$TaiKhoan->state = $request->state;
			$TaiKhoan->save();

			$HocVien = HocVienModel::where('id_user','=',$request->idTaiKhoan)->first();
			$HocVien->ma_hoc_vien = $request->maHocVien;
			$HocVien->nam_sinh = $request->namSinh;
			$HocVien->noi_sinh = $request->noiSinh;
			$HocVien->chuc_vu_dang = $request->chucVuDang;
			$HocVien->chuc_vu_chinh_quyen = $request->chucVuCQ;
			$HocVien->ma_dan_toc = $request->idDanToc;
			$HocVien->ma_don_vi = $request->idDonVi;
			$HocVien->ma_khoa_hoc = $request->idKhoaHoc;
			$HocVien->state = $request->state;
			$HocVien->save();

			return true;
		}
		catch(\Exception $ex){
			return $ex;
		}
	}

	public function xoaHocVien(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$TaiKhoan = TaiKhoanModel::find($request->idTaiKhoan);
		if($TaiKhoan->delete()){
			$HocVien = HocVienModel::where('id_user','=',$request->idTaiKhoan)->first();
			if($HocVien->delete()) return true; else return false;
		}
		else{
			return false;
		}
	}

	public function loadHocVienByKhoaHoc(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$dsUser = DB::table('users')
					->select('users.*',\DB::raw("SUBSTRING_INDEX(users.hoten, ' ', -1) as ten"))
					->join('hoc_vien','hoc_vien.id_user','=','users.id')
					->where('users.nhom_quyen','hoc_vien')
					->where('hoc_vien.ma_khoa_hoc',$request->maKhoaHoc)
					->orderBy('ten','ASC')
					->get();
		return view('pages/modules/HocVien/danh-sach-hoc-vien', compact('dsUser'));
	}

	public function duyetHocVien(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$TaiKhoan = TaiKhoanModel::find($request->idUsser);
		$TaiKhoan->state = 1;
		$TaiKhoan->save();

		$HocVien = HocVienModel::where('id_user','=',$request->idUsser)->first();
		$HocVien->state = 1;
		$HocVien->save();

		return true;
	}

	public function xepKhoaHoc(){
		if(!session('login-state')) return redirect()->route('login');
		if(!in_array('xep_khoa_hoc',session('quyen'))) return redirect()->route('404');
		Session::put('active-menu', 'menu-xep-khoa-hoc');
    	Session::put('parent-active-menu', 'menu-quan-ly');
		$dsHocVien = DB::table('users')
					->select('*',\DB::raw("SUBSTRING_INDEX(users.hoten, ' ', -1) as ten"))
					->join('hoc_vien','hoc_vien.id_user','=','users.id')
					->join('dm_don_vi','hoc_vien.ma_don_vi','=','dm_don_vi.ma_don_vi')
					->where('users.nhom_quyen','hoc_vien')
					->where('hoc_vien.ma_khoa_hoc','0')
					->orderBy('hoc_vien.ma_don_vi','ASC')
					->orderBy('ten','ASC')
					->get();
		return view('pages/modules/KhoaHoc/xep-khoa-hoc', compact('dsHocVien'));
	}

	public function luuXepKhoaHoc(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$dsHocVien = $request->dsHocVien;
		foreach($dsHocVien as $hocVien){
			$HocVien = HocVienModel::where('id_user','=',$hocVien)->first();
			$HocVien->ma_khoa_hoc = $request->maKhoaHoc;
			$HocVien->save();
		}
		return true;
	}

	public function getDsHv(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		$maKhoaHoc = $request->maKhoaHoc;
		$dsHocVien = DB::table('users')
					->select('*',\DB::raw("SUBSTRING_INDEX(users.hoten, ' ', -1) as ten"))
					->join('hoc_vien','hoc_vien.id_user','=','users.id')
					->join('dm_don_vi','hoc_vien.ma_don_vi','=','dm_don_vi.ma_don_vi')
					->where('users.nhom_quyen','hoc_vien')
					->where('hoc_vien.ma_khoa_hoc',$request->maKhoaHoc)
					->orderBy('hoc_vien.ma_don_vi','ASC')
					->orderBy('ten','ASC')
					->get();
		return view('pages/modules/KhoaHoc/ajax/get-danh-sach-hoc-vien', compact('dsHocVien'));
	}
}
