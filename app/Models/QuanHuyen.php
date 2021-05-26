<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model
{
    protected $table = 'tbl_quanhuyen';

    public function tinhthanh() {
        return $this->belongsTo('App\Models\TinhThanh', 'id', 'id_tinhthanh');
    }
}
