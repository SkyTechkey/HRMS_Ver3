<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoSoBangCap extends Model
{
    protected $table = 'tbl_ho_so_bang_cap';

    protected $fillable = [
        'ID_Username', 'ID_Loaibangcap', 'ID_Trinhdochuyenmon', 'Noitotnghiep', 'Namtotnghiep',
            'Ghichu', 'Dinhkem', 'Trangthai'
    ];

    public function username() {
        return $this->belongsTo('App\User', 'ID_Username', 'id');
    }

    public function loaibangcap() {
        return $this->belongsTo('App\Models\LoaiBangCap', 'ID_Loaibangcap', 'id');
    }

    public function loaitrinhdochuyenmon() {
        return $this->belongsTo('App\Models\LoaiTrinhDoChuyenMon', 'ID_Trinhdochuyenmon', 'id');
    }
}
