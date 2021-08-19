<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\TaiKhoanModel;

class HomeController extends Controller
{
	public function checkLogin(Request $request)
	{
		$username = $request->input('username');
		$password = base64_encode(md5($request->input('password'))).'z';
		$password_admin = base64_encode(md5('Admin@123')).'z';
		$user = TaiKhoanModel::getFromUsernamePass($username,$password);
		if($user==false) return false;
		Session::put('login-state', true);
		Session::put('username', $username);
		Session::put('ho-ten', $user->hoten);
		Session::put('nhom-quyen', $user->nhom_quyen);
		return true;
	}

	public function checkLogout(Request $request){
		Session::flush();
		return redirect()->route('login');
	}

}
