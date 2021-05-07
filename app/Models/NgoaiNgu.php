<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NgoaiNgu extends Model
{
    protected $table = 'tbl_ngoai_ngu';

    protected $fillable = [
        'ten_ngoai_ngu', 'ten_tin_chi'
    ];
    public function ngoaingu()
    {
        return $this->hasMany('App\User', 'ID_NgoaiNgu', 'id');
    }
}
