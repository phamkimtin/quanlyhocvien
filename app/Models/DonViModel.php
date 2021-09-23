<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonViModel extends Model
{
    protected $table = "dm_don_vi";
    protected $primaryKey = 'id';

   	public static function getAll(){
        $value = DonViModel::all();
    	return $value;
   	}

    public static function getDonViById($id){
        $value = DonViModel::find($id);
        return $value;
    }
}
