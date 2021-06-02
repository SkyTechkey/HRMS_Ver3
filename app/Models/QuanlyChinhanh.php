<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuanlyChinhanh extends Model
{
    protected $table = 'tbl_Chinhanh';
    public function phongban()
    {
      return $this->hasMany('App\Models\QuanLyPhongBan','ID_Chinhanh');
    }
}

