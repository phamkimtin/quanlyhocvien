<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhomQuyenModel extends Model
{
    protected $table = "dm_nhom_quyen";
    protected $primaryKey = 'id';

   	public static function getAll(){
        $value = NhomQuyenModel::all();
    	return $value;
   	}

}
