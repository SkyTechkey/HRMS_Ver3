<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class QuanLyTinhThanhPho extends Model
{
    protected $table = 'tbl_tinhthanhpho';
    
    public function quanhuyen() {
        return $this->hasMany('App\Models\QuanLyQuanHuyen', 'ID_tinhthanhpho', 'id');
    }
    public function tinhthuongtru() {
        return $this->hasMany('App\User', 'ID_Tinhthuongtru', 'id');
        
    }
    public function tinhtamtru() {
        return $this->hasMany('App\User', 'ID_Tinhtamtru', 'id');
    }
}
