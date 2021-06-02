<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiBangCap extends Model
{
    protected $table = 'tbl_loai_bang_cap';

    public function hosobangcap_loaibangcap() {
        return $this->hasMany('App\Models\HoSoBangCap', 'ID_Loaibangcap', 'id');
    }
}
