<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HocVienModel extends Model
{
    protected $table = "hoc_vien";
    protected $primaryKey = 'id';

   	public static function getAll(){
        $value = HocVienModel::all();
    	return $value;
   	}

}
