<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $table = 'tbl_chucvu';
    public function nhanvien()
    {
      return $this->hasMany('App\User','ID_Chucvu');
    }
}
