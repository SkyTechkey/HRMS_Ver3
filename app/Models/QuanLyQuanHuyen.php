<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\QuanLyTinhThanhPho;
class QuanLyQuanHuyen extends Model
{
    protected $table ='tbl_quanhuyen';

    public function xaphuong() {
        return $this->hasMany('App\Models\QuanLyXaPhuong', 'ID_quanhuyen', 'id');
    }
    
    public function thanhpho() {
        return $this->belongsTo('App\Models\QuanLyTinhThanhPho', 'ID_tinhthanhpho', 'id');
    }
    

    
}
