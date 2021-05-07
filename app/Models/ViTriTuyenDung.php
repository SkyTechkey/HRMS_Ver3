<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViTriTuyenDung extends Model
{
    protected $table = 'tbl_vitrituyendung';
    protected $fillable = [
        'Tenvitrituyendung_Vitrituyendung', 'Tenviettat', 'status',
    ];
}
