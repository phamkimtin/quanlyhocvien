<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuyenNhomQuyenModel extends Model
{
    protected $table = "quyen_nhom_quyen";
    protected $primaryKey = 'id';

   	public static function getAll(){
        $value = QuyenNhomQuyenModel::all();
    	return $value;
   	}

    public static function getQuyenByNhomQuyen($ma_nhom_quyen){
        $value = QuyenNhomQuyenModel::where('ma_nhom_quyen','=',$ma_nhom_quyen)->get();
        return $value;
    }

    public static function checkQuyenNhomQuyen($ma_nhom_quyen,$ma_quyen){
        $check = QuyenNhomQuyenModel::where('ma_nhom_quyen','=',$ma_nhom_quyen)->where('ma_quyen','=',$ma_quyen)->count();
        return $check;
    }
}
