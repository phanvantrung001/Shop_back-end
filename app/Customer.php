<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
   
        public $table = 'customers';
        public function order()
        {
            return $this->hasMany(Order::class,'customer_id', 'id');
        }
    }
