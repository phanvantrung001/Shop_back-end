<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;



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
Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');
Route::post('/checklogin',[AuthController::class,'checkLogin'])->name('auth.checklogin');
Route::get('/register',[AuthController::class,'register'])->name('auth.register');
Route::post('/checkRegister',[AuthController::class,'checkRegister'])->name('auth.checkRegister');

Route::middleware(['auth','preventhistory'])->group(function(){
Route::get('/', function () {
    return view('layout.master'); 
    
});
Route::get('/user',[UserController::class,'index'])->name('user.index');
Route::get('/user/create',[UserController::class,'create'])->name('user.create');
Route::get('/user/{id}/edit',[UserController::class,'edit'])->name('user.edit');
Route::get('/user/show',[UserController::class,'show'])->name('user.show');
Route::post('/user/store',[UserController::class,'store'])->name('user.store');
Route::put('/user/{id}/update',[UserController::class,'update'])->name('user.update');
Route::delete('/user/{id}/destroy',[UserController::class,'destroy'])->name('user.destroy');

// Route::get('/category',function(){
//     dd(10);
// });
Route::get('/customer',[customerController::class,'index'])->name('customer.index');
Route::get('/customer/create',[customerController::class,'create'])->name('customer.create');
Route::get('/customer/{id}/edit',[customerController::class,'edit'])->name('customer.edit');
Route::get('/customer/show',[customerController::class,'show'])->name('customer.show');
Route::post('/customer/store',[customerController::class,'store'])->name('customer.store');
Route::put('/customer/{id}/update',[customerController::class,'update'])->name('customer.update');
Route::delete('/customer/{id}/destroy',[customerController::class,'destroy'])->name('customer.destroy');

Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
Route::get('/category/show',[CategoryController::class,'show'])->name('category.show');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::put('/category/{id}/update',[CategoryController::class,'update'])->name('category.update');
Route::delete('/category/{id}/destroy',[CategoryController::class,'destroy'])->name('category.destroy');

Route::group(['prefix'=>'category'],function(){
    Route::get('/trash',[CategoryController::class,'trash'])->name('category.trash');//
    Route::get('/restore/{id}',[CategoryController::class,'restore'])->name('category.restore'); //khôi phục
    Route::get('/deleteforever/{id}',[CategoryController::class,'deleteforever'])->name('category.deleteforever');//viễn viễn
});
Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::get('/product/show',[ProductController::class,'show'])->name('product.show');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::put('/product/{id}/update',[ProductController::class,'update'])->name('product.update');
Route::delete('/product/{id}/destroy',[ProductController::class,'destroy'])->name('product.destroy');
});
