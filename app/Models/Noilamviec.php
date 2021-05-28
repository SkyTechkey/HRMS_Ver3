<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noilamviec extends Model
{
    protected $table = "tbl_noi_lam_viec";

    public function diachi() {
        return $this->belongsTo('App\Models\DiaDanh', 'Id_Diachi', 'id');
    }
    
}
