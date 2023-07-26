<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Product;
class Category extends Model
{
    use Notifiable,SoftDeletes;
    protected $table = 'categories';
    public function product(){
        return $this->hasMany(Product::class,'category_id','id')->withTrashed();
    }
}
