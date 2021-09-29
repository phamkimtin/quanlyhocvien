<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\HocVienModel;
use App\Models\TaiKhoanModel;
use DB;

class HocVienController extends Controller
{
	public function getAllHocVien(Request $request){
		$dsUser = TaiKhoanModel::where('nhom-quyen','=','hoc_vien');
		return view('pages/modules/HocVien/hoc-vien', compact('dsUser'));
	}

	public function loadDanhSachHocVien(Request $request){
		if(!session('login-state')) return redirect()->route('login');
		if(!in_array('view_hoc_vien',session('quyen'))) return redirect()->route('404');
		$dsUser = TaiKhoanModel::where('nhom_quyen','=','hoc_vien')->get();
		return view('pages/modules/HocVien/danh-sach-hoc-vien', compact('dsUser'));
	}

	public static function getHvByIduser($id_user){
        $value = HocVienModel::where('id_user','=',$id_user)->first();
        return $value;
    }

    public function themHocVien(Request $request){
    	if(!session('login-state')) return redirect()->route('login');
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
					->select('users.*')
					->join('hoc_vien','hoc_vien.id_user','=','users.id')
					->where('users.nhom_quyen','hoc_vien')
					->where('hoc_vien.ma_khoa_hoc',$request->maKhoaHoc)
					->get();
		return view('pages/modules/HocVien/danh-sach-hoc-vien', compact('dsUser'));
	}
}
