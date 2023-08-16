<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Customer;
use App\Orderdetail;
use App\Order;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginShopRequest;
use App\Http\Requests\registerShopRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class ShopController extends Controller
{
    public function home()
    {
        $products = Product::get();

        return view('shop.home', compact('products'));
    }

    public function checklogin(LoginShopRequest $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('customers')->attempt($arr)) {
            alert()->success('Đăng nhập thành công');
            return redirect()->route('home.index');
        } else {
            return redirect()->route('shop.login');
        }
    }
    public function register()
    {
        return view('shop.auth.register');
    }

    public function checkregister(RegisterShopRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->phone = $request->phone;
        try {
            $customer->save();
            return redirect()->route('shop.login');
        } catch (\Exception $e) {
            Log::error("message:" . $e->getMessage());
        }
        return redirect()->route('shop.login');
    }
    public function login()
    {
        return view('shop.auth.login');
    }

    public function logout()
    {
        Auth::guard('customers')->logout();

        return redirect()->route('home.index');
    }
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('shop.show', compact('product'));
    }
    public function cart()
    {
        $cart = session()->get('cart', []);
        $param = [
            'cart' => $cart,
        ];

        return view('shop.cart', $param);
    }
    

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            alert()->success('Cập Nhật Đơn Hàng Thành Công!');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            alert()->success('Xóa Đơn Hàng Thành Công!');
        }
    }
    public function checkOuts()
    {
        return view('shop.checkOut');
    }
    public function Order(Request $request)
    {
        if ($request->product_id == null) {
            return redirect()->back();
        } else {
            $id = Auth::guard('customers')->user()->id;
            $data = Customer::find($id);
            $data->address = $request->address;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            if (isset($request->note)) {
                $data->note = $request->note;
            }
            $data->save();
            $order = new Order();
            $order->customer_id = Auth::guard('customers')->user()->id;
            $order->date_at = date('Y-m-d H:i:s');
            $order->save();
        }
        $count_product = count($request->product_id);
        for ($i = 0; $i < $count_product; $i++) {
            $orderItem = new OrderDetail();
            $orderItem->order_id =  $order->id;
            $orderItem->product_id = $request->product_id[$i];
            $orderItem->quantity = $request->quantity[$i];
            $orderItem->total = $request->total[$i];
            $orderItem->save();
            session()->forget('cart');
            DB::table('products')
            ->where('id', '=', $orderItem->product_id)
            ->decrement('quantity', $orderItem->quantity);
        }
        alert()->success('Đặt hàng thành công!');
        return redirect()->route('home.index');
    }


    public function addtocart($id){
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'img' => $product->img,
                'max' => $product->quantity
            ];
        }

        session()->put('cart', $cart);
        $cartQuantity = count($cart);
        return response()->json(['cartQuantity' => $cartQuantity]);
    }
    public function shopsearch(Request $request)
    {
        $search = $request->input('search');
        if (!$search) {
            return redirect()->route('shop.index');
        }
        $products = Product::where('name', 'LIKE', '%' . $search . '%')->paginate(20);
        return view('shop.home', compact('product'));
    }
}
