<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\HoSo;
class LoaiHoSo extends Model
{
    protected $table = 'tbl_loaihoso';

    public function hoso() {
        return $this->hasMany('App\Models\HoSo', 'ID_loaihoso', 'id');
    }
}
