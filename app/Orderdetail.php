<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'order_date','delivery_date','total_amount','email','password',
    ];
    protected $primaryKey = 'id';
    protected $table = 'orderdetail';
    protected $timestamp = true;
    public function product(){
        return $this->belongsToMany(Product::class, 'orderdetails', 'order_id', 'product_id');
    }
    public function order(){
        return $this->belongsToMany(Order::class, 'orderdetails', 'product_id', 'order_id');
    }
}
