<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\shop\ShopController;
use App\Http\Controllers\GroupController;




use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Order;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/register', 'UserController@register')->name('register');
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/checklogin', [AuthController::class, 'checklogin'])->name('auth.checklogin');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/checkRegister', [AuthController::class, 'checkRegister'])->name('auth.checkRegister');
//SHOP
// Route::middleware(['auth.shop','preventhistory'])->group(function(){
// });
Route::group(['prefix' => 'shop'], function () {
    Route::get('/register', [ShopController::class, 'register'])->name('shop.register');
    Route::get('/home', [ShopController::class, 'home'])->name('home.index');
    Route::post('/checkregister', [ShopController::class, 'checkregister'])->name('shop.checkregister');
    Route::post('/checklogin', [ShopController::class, 'checklogin'])->name('shop.checklogin');
    Route::get('/login', [ShopController::class, 'login'])->name('shop.login');
    Route::post('/logout', [ShopController::class, 'logout'])->name('logout');
    Route::get('/{id}/show', [ShopController::class, 'show'])->name('shop.show');
    Route::patch('update-cart', [ShopController::class, 'update']);
    Route::delete('remove-from-cart', [ShopController::class, 'remove']);
    Route::get('/checkOuts', [ShopController::class, 'checkOuts'])->name('checkOuts');

    //giỏ hàng
    Route::get('/cart', [ShopController::class, 'cart'])->name('cart.index');
    Route::get('/store/{id}', [ShopController::class, 'store'])->name('shop.store');

    //thanh toán
    Route::post('/order', [ShopController::class, 'order'])->name('order');
    Route::get('/search', [ShopController::class, 'search'])->name('shop.search');
    Route::get('/addtocart/{id}', [ShopController::class, 'addtocart'])->name('shop.addtocart');
});

Route::middleware(['auth', 'preventhistory'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/user/show', [UserController::class, 'show'])->name('user.show');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::post('/user/search', [UserController::class, 'search'])->name('user.search');
    Route::put('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

    // Route::get('/category',function(){
    //     dd(10);
    // });
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::get('/customer/show', [CustomerController::class, 'show'])->name('customer.show');
    Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::put('/customer/{id}/update', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customer/{id}/destroy', [CustomerController::class, 'destroy'])->name('customer.destroy');


    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
    Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
    Route::get('/order/{id}/show', [OrderController::class, 'show'])->name('order.show');
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    Route::put('/order/{id}/update', [OrderController::class, 'update'])->name('order.update');
    Route::delete('/order/{id}/destroy', [OrderController::class, 'destroy'])->name('order.destroy');


    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/category/show', [CategoryController::class, 'show'])->name('category.show');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::group(['prefix' => 'category'], function () {
        Route::get('/trash', [CategoryController::class, 'trash'])->name('category.trash'); //
        Route::get('/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore'); //khôi phục
        Route::get('/deleteforever/{id}', [CategoryController::class, 'deleteforever'])->name('category.deleteforever'); //viễn viễn

    });
    Route::group(['prefix' => 'group'], function () {
        Route::get('/permission/{id}', [GroupController::class, 'permission'])->name('group.permission');
        Route::post('/grantpermission', [GroupController::class, 'grantpermission'])->name('group.grantpermission');
    });

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/product/{id}/show', [ProductController::class, 'show'])->name('product.show');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::put('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');


    Route::get('/group', [groupController::class, 'index'])->name('group.index');
    Route::get('/group/create', [GroupController::class, 'create'])->name('group.create');
    Route::get('/group/{id}/edit', [GroupController::class, 'edit'])->name('group.edit');
    Route::get('/group/{id}/show', [GroupController::class, 'show'])->name('group.show');
    Route::post('/group/store', [GroupController::class, 'store'])->name('group.store');
    Route::put('/group/{id}/update', [GroupController::class, 'update'])->name('group.update');
    Route::delete('/group/{id}/destroy', [GroupController::class, 'destroy'])->name('group.destroy');
});
// dn dk shop
// Đăng ký
// Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('/register', 'Auth\RegisterController@register');

// Đăng nhập
// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('/login', 'Auth\LoginController@login');
// Route để thực hiện quá trình đăng nhập bằng Facebook

