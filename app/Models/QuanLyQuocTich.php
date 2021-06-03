<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class QuanLyQuocTich extends Model
{
    protected $table = 'tbl_quoctich';

    public function nhanvien() {
        return $this->hasMany('App\User', 'ID_Quoctich', 'id');
    }
}
