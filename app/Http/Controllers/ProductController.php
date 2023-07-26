<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Http\Requests\StoreProductRequest;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function index(){   
        $products = Product::with('category')->get();
        // dd($products);
        return view('products.index',compact('products'));
    }
    public function create(){
        $categories = Category::get();
        return view('products.create',compact('categories'));
    }
    public function store(StoreProductRequest $request){
        //  dd($request);
       $product = new Product();
       $product->name = $request->name;
       $product->slug = $request->slug;
       $product->price = $request->price;
       $product->description = $request->description;
       $product->quantity = $request->quantity;
       $product->category_id = $request->category_id;
       $product->status = 0;    
       $product->img = '';    
       if ($product->quantity > 0) {
           $product->status = 1;
       }
       $fieldName = 'img';  
       if ($request->hasFile($fieldName)) {
           $get_img = $request->file($fieldName);
           $path = 'storage/product/';
           $new_name_img = rand(1,100).$get_img->getClientOriginalName();
           $get_img->move($path,$new_name_img);
           $product->img = $path.$new_name_img; 
       }
       $product->save();
       alert()->success('Cập nhật thành công');
       return redirect()->route('product.index');
    }
    public function edit(String $id){
        $categories = Category::get();
        $product = Product::find($id);
        return view('products.edit',compact(['product']),compact('categories'));
    }
    public function update(Request $request,$id){
        $product = Product::find($id);
        $product->name = $request->name;
       $product->slug = $request->slug;
       $product->price = $request->price;
       $product->description = $request->description;
       $product->quantity = $request->quantity;
       $product->category_id = $request->category_id;
       $product->status = 0;    
       $product->img = '';    
       if ($product->quantity > 0) {
           $product->status = 1;
       }
       $fieldName = 'img';  
       if ($request->hasFile($fieldName)) {
           $get_img = $request->file($fieldName);
           $path = 'storage/product/';
           $new_name_img = $request->name.$get_img->getClientOriginalName();
           $get_img->move($path,$new_name_img);
           $product->img = $path.$new_name_img;
       }
        $product->save();
        alert()->success('Cập nhật thành công');
        return redirect()->route('product.index');
    }
    
    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}


