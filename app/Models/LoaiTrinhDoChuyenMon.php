<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiTrinhDoChuyenMon extends Model
{
    protected $table = 'tbl_loai_trinh_do_chuyen_mon';

    public function hosobangcap_loaitrinhdochuyenmon() {
        return $this->hasMany('App\Models\HoSoBangCap', 'ID_Loaitrinhdochuyenmon', 'id');
    }
}
