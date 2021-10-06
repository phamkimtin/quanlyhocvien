<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonHocModel extends Model
{
    protected $table = "mon_hoc";
    protected $primaryKey = 'id';

   	public static function getAll(){
        $value = MonHocModel::all();
    	return $value;
   	}

}
