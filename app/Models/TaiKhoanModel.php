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

}
