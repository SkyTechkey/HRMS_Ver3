<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuanLyTinhThanhPho extends Model
{
    protected $table = 'tbl_tinhthanhpho';
    
    public function quanhuyen() {
        return $this->hasMany('App\Models\QuanLyQuanHuyen', 'ID_tinhthanhpho', 'id');
    }
}
