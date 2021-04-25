<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    protected $table = 'permissions';
public function Role(){
    // lấy danh sách các nhóm vai trò.
    // Công việc này sẽ join 2 bảng với nhau để lấy dữ liệu
     return $this->belongsToMany(Role::class,'role_permissions','id_pms','id_role');
}
}

