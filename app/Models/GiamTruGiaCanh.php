<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiamTruGiaCanh extends Model
{
    protected $table = 'tbl_giam_tru_gia_canh';

    public function loaiquanhe() {
        return $this->belongsTo('App\Models\LoaiQuanhe', 'ID_Loaiquanhe', 'id');
    }
}
