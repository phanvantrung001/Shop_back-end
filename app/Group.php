<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Group extends Model
{
    protected $table = 'groups';
    public function user(){
        return $this->hasMany(User::class,'group_id','id');
    }
    public function role(){
        return $this->BelongsToMany(Role::class,'group_roles','group_id','role_id');
    }
   

}
