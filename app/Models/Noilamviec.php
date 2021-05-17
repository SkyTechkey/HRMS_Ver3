<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noilamviec extends Model
{
    protected $table = 'tbl_noilamviec';

    protected $fillable = [
        'Tenchinhanh', 'Diachi'
    ];
}
