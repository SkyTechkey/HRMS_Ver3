<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaDanh extends Model
{
    protected $table = "tbl_dia_danh";

    public function tinhthanh() {
        return $this->belongsTo('App\Models\TinhThanh', 'id_tinhthanh', 'id');
    }

    public function quanhuyen() {
        return $this->belongsTo('App\Models\QuanHuyen', 'id_quanhuyen', 'id');
    }

    public function xaphuong() {
        return $this->belongsTo('App\Models\XaPhuong', 'id_xaphuong', 'id');
    }
}
