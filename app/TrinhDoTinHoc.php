<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrinhDoTinHoc extends Model
{
    protected $table = 'tbl_trinhdotinhoc';

    protected $fillable = [
        'Ten_Trinhdotinhoc', 'status',
    ];
}
