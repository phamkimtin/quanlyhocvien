<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaiKhoanModel extends Model
{
    protected $table = "users";
    protected $primaryKey = 'id';

   	public static function getAll(){
        $value = TaiKhoanModel::all();
    	return $value;
   	}

    public static function getFromUsernamePass($userName, $passWord){
        $user = TaiKhoanModel::where('username','=',$userName)->where('password','=',$passWord);
        if($user->count()==0){
            return false;
        }
        return $user->first();
    }
}
