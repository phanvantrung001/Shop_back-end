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
        $orders = Order::with('customer')->paginate(10);
        $this->authorize('viewAny',Order::class);
        return view('admin.orders.index',compact(['orders']));  
    }
    public function show(string $id){
        $items = Order::with('orderdetail','product')->findOrFail($id);
        return view('admin.orders.show',compact('items'));
    }
    public function destroy($id){
        $this->authorize('delete',Order::class);

        $orders = Order::find($id);
        $orders->delete();
        return redirect()->route('order.index');
        alert()->warning('Thành công');
            return back();
    }
}
