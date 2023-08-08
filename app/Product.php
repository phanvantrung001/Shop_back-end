<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Category;
class Product extends Model
{
    use Notifiable;
    protected $table = 'products';
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
