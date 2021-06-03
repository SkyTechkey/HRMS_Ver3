<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\QuanLyTinhThanhPho;
use App\User;
class QuanLyQuanHuyen extends Model
{
    protected $table ='tbl_quanhuyen';

    public function xaphuong() {
        return $this->hasMany('App\Models\QuanLyXaPhuong', 'ID_quanhuyen', 'id');
    }
    
    public function thanhpho() {
        return $this->belongsTo('App\Models\QuanLyTinhThanhPho', 'ID_tinhthanhpho', 'id');
    }
    public function quanthuongtru() {
        return $this->hasMany('App\User', 'ID_Quanthuongtru', 'id');
        
    }
    public function quantamtru() {
        return $this->hasMany('App\User', 'ID_Quantamtru', 'id');
    }

    
}
