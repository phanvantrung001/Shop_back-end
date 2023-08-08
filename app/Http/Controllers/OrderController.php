<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

use App\Order;


class OrderController extends Controller
{
    public function index()
    {  
        $orders = Order::with('customer')->paginate(5);
        return view('admin.orders.index',compact(['orders']));
    }
    public function show(string $id){
        $items = DB::table('orders')
        ->join('customers', 'orders.customer_id', '=', 'customers.id')
        ->join('orderdetails', 'orders.id', '=', 'orderdetails.order_id')
        ->join('products', 'orderdetails.product_id', '=', 'products.id')
        ->select('orders.*', 'customers.name as customer_name', 'products.name as product_name', 'products.price as product_price', 'orderdetails.*')
        ->where('orders.customer_id', '=', $id)       
        ->get();
        return view('orders.show',compact('items'));
    }
}
