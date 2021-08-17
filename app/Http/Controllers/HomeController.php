<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
	public function checkLogin(Request $request)
	{
		$username = $request->input('username');
		$password = $request->input('password');
		return 'Đăng nhập thành công';
	}
}
