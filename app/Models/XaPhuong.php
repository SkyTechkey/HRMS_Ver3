<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class XaPhuong extends Model
{
    protected $table = 'tbl_xaphuong';

    public function quanhuyen() {
        return $this->belongsTo('App\Models\QuanHuyen', 'id', 'id_quanhuyen');
    }
}
