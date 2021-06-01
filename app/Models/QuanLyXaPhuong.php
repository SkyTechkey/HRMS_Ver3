<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\QuanLyQuanHuyen;
class QuanLyXaPhuong extends Model
{
    protected $table ='tbl_xaphuong';

    public function tenquanhuyen() {
        return $this->belongsTo('App\Models\QuanLyQuanHuyen', 'ID_quanhuyen', 'id');
    }
}
