<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $table = 'tbl_chucvu';

    protected $fillable = [
        'Tenchucvu_Chucvu', 'HesoCV','status',
    ];
    
}
