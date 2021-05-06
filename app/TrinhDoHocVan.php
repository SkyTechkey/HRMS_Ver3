<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrinhDoHocVan extends Model
{
    protected $table = 'tbl_trinhdohocvan';

    protected $fillable = [
        'ten_trinhdohocvan', 'status',
    ];
}
