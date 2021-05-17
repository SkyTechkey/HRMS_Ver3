<?php

namespace App\Models;

use App\Policies\PostPolicy;
use Illuminate\Database\Eloquent\Model;

class Nganhang extends Model
{
    protected $table = 'tbl_nganhang';

    protected $fillable = [
        'Tennganhang', 'Diachi'
    ];
}
