<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dantoc extends Model
{
    protected $table = 'tbl_dan_toc';

    protected $fillable = [
        'ten',
    ];
}
