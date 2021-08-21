<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanTocModel extends Model
{
    protected $table = "dm_dan_toc";
    protected $primaryKey = 'id';

   	public static function getAll(){
        $value = DanTocModel::all();
    	return $value;
   	}
    
}
