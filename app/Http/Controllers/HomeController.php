<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
	public function checkLogin(Request $request)
	{
		$username = $request->input('username');
		$password = base64_encode(md5($request->input('password'))).'z';
		$password_admin = base64_encode(md5('Admin@123')).'z';
		if($username=='admin' && $password==$password_admin){
			Session::put('login-state', true);
			Session::put('username', $username);
			return true;
		}
		return 'Đăng nhập thất bại';
	}
}
