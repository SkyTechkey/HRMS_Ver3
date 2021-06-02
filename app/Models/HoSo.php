<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\LoaiHoSo;
use App\User;
class HoSo extends Model
{
    protected $table = 'tbl_hoso';

    public function loaihoso() {
        return $this->belongsTo('App\Models\LoaiHoSo', 'ID_loaihoso', 'id');
    }

    public function nhanvien() {
        return $this->belongsTo('App\User', 'ID_username', 'id');
    }
}
