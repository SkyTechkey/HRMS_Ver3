<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrinhDoNgoaiNgu extends Model
{
    protected $table = 'tbl_trinhdongoaingu';

    protected $fillable = [
        'Tentrinhdongoaingu_Trinhdongoaingu', 'status',
    ];
}
