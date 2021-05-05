<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanToc extends Model
{
    protected $table = 'tbl_dantoc';

    protected $fillable = [
        'Tendantoc_Dantoc', 'status', 
    ];

}
