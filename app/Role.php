<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    public function group(){
        return $this->belongsToMany(Group::class,'group_roles','group_id','role_id');
    }
}
