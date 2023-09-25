<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use App\Orderdetail;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function checkout(Request $request)
    {
        $cart = $request->cart;
        $address = $request->address;
        $email = $request->email;
        $name = $request->name;
        $phone = $request->phone;
    
        // Tạo đối tượng Order
        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->total = 1;
        $order->date_at = date("Y-m-d");
        $order->save();
    
        if (count($cart) > 0) {
            foreach ($cart as $key => $cartItem) {
                $orderDetail = new Orderdetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = (int) $cartItem['product_id'];
                $orderDetail->quantity = $cartItem['quantity'];
                $orderDetail->total = $cartItem['quantity'] * $cartItem['product']['price'];
                $orderDetail->save();
            }
        }
    
        return response()->json([
            'message' => 'Order successfully registered',
            'order' => $order
        ], 201);
    }
}