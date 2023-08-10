<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Customer;

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
            return redirect()->route('viewlogin');
        } catch (\Exception $e) {
            Log::error("message:".$e->getMessage());
        }
                return redirect()->route('shop.login');
    }
    public function login()
    {
        return view('shop.auth.login');
    }

    public function logout(){
        Auth::guard('customers')->logout();

        return redirect()->route('shop.login');
      }
    // public function index()
    // {
    //     if (isset(Auth::guard('customers')->user()->id)) {
    //         $user = Auth::guard('customers')->user()->id;
    //         $carts = session()->get('carts'.$user);
    //         if (isset($carts[Auth::guard('customers')->user()->id])){
    //             $carts = array_values($carts);
    //         }
    //     } else {
    //             $carts = [];
    //         }
    //     $products = Product::where('status',1)->get();
    //     $param = [
    //         'products' => $products,
    //     ];
    //     return view('shop.include.main', $param);
    // }
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('shop.show', compact('product'));
}
}

