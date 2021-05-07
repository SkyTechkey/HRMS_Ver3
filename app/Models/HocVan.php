<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HocVan extends Model
{
    protected $table = 'tbl_trinh_do_hoc_van';

    protected $fillable = [
        'pho_thong', 'cao_dang', 'dai_hoc', 'cao_hoc'
    ];

    public function hocvan()
    {
        return $this->hasMany('App\User', 'ID_HocVan', 'id');
    }
}
