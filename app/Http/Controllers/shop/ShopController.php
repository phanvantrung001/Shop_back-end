<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ShopController extends Controller
{
    public function home()
    {
        $products = Product::get();
       
        return view('shop.home', compact('products'));
    }
}
