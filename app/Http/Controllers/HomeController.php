<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\TaiKhoanModel;
use App\Models\QuyenNhomQuyenModel;


class HomeController extends Controller
{
	public function checkLogin(Request $request)
	{
		$username = $request->input('username');
		$password = base64_encode(md5($request->input('password'))).'z';
		$password_admin = base64_encode(md5('Admin@123')).'z';
		$user = TaiKhoanModel::getFromUsernamePass($username,$password);
		if($user==false) return false;
		if($user->state==0) return 'chua_duyet';
		Session::put('login-state', true);
		Session::put('username', $username);
		Session::put('ho-ten', $user->hoten);
		Session::put('nhom-quyen', $user->nhom_quyen);
		$dsQuyen = QuyenNhomQuyenModel::getQuyenByNhomQuyen($user->nhom_quyen);
		$arrayQuyen = [];
		foreach($dsQuyen as $quyen){
			array_push($arrayQuyen,$quyen->ma_quyen); 
		}
		Session::put('quyen', $arrayQuyen);
		return true;
	}

	public function checkLogout(Request $request){
		Session::flush();
		return redirect()->route('login');
	}

}
