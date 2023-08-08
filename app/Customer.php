<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   
        public $table = 'customers';
        public function order()
        {
            return $this->hasMany(Order::class,'customer_id', 'id');
        }
    }
