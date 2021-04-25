<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'roles';
    protected $fillable =['id','name'];

    public function Permission(){
        return $this->belongsToMany(Permission::class,'role_permissions','id_role','id_pms');
    }
}
