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
    protected $table = 'orderdetails';
    protected $timestamp = true;
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
        
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
        
    }
}
