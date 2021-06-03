<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuanLyPhongBan extends Model
{
    protected $table = 'tbl_phongban';
    public function chinhanh()
    {
       return $this->belongsTo('App\Models\QuanlyChinhanh','id');
    }
    public function nhanvien()
    {
      return $this->hasMany('App\User','ID_Chinhanh','id');
    }
}
