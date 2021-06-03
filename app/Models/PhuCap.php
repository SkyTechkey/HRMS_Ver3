<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PhuCap;
class PhuCap extends Model
{
    protected $table = 'tbl_phucap';

    public function luongphucap() {
        return $this->hasMany('App\Models\LuongPhuCap', 'ID_luongphucap', 'id');
    }
}
