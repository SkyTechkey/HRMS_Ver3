<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class QuanLyDanToc extends Model
{
    protected $table = 'tbl_dantoc';

    public function nhanvien() {
        return $this->hasMany('App\User', 'ID_Dantoc', 'id');
    }
}
