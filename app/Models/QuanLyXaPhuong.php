<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\QuanLyQuanHuyen;
use App\User;
class QuanLyXaPhuong extends Model
{
    protected $table ='tbl_xaphuong';

    public function tenquanhuyen() {
        return $this->belongsTo('App\Models\QuanLyQuanHuyen', 'ID_quanhuyen', 'id');
    }
    public function xatamtru() {
        return $this->hasMany('App\User', 'ID_Xatamtru', 'id');
    }
    public function xathuongtru() {
        return $this->hasMany('App\User', 'ID_Xathuongtru', 'id');
    }
}
