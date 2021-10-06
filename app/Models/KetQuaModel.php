<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KetQuaModel extends Model
{
    protected $table = "ket_qua";
    protected $primaryKey = 'id';

   	public static function getAll(){
        $value = KetQuaModel::all();
    	return $value;
   	}

}
