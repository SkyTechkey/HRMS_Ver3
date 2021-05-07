<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;


class TinHoc extends Model
{
    protected $table = 'tbl_tin_hoc';

    protected $fillable = [
        'word', 'excel', 'power_point'
    ];

    public function tinhoc()
    {
        return $this->hasMany('App\User', 'ID_TinHoc', 'id');
    }
}
