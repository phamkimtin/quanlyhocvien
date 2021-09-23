<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhoaHocModel extends Model
{
    protected $table = "khoa_hoc";
    protected $primaryKey = 'id';

   	public static function getAll(){
        $value = KhoaHocModel::all();
    	return $value;
   	}

}
