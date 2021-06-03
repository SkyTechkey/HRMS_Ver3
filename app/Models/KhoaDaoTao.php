<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class KhoaDaoTao extends Model
{
    protected $table = 'tbl_khoadaotao';

    public function nhanvien() {
        return $this->belongsTo('App\User', 'ID_nhanvien', 'id');
    }
}
