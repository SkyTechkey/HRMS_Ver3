<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class QuanlyChinhanh extends Model
{
    protected $table = 'tbl_Chinhanh';
    public function phongban()
    {
      return $this->hasMany('App\Models\QuanLyPhongBan','ID_Chinhanh');
    }
    public function nhanvien()
    {
      return $this->hasMany('App\User','ID_Chinhanh');
    }
}

