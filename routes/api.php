<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\AuthCustomerController;
use App\Http\Controllers\Api\OrderController;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
    
// Route::apiResource('',UserController::class);
Route::get('users',[UserController::class,'index']);
Route::delete('users/{id}',[UserController::class,'destroy']);
Route::post('users',[UserController::class,'store']);
// Route::delete('users/{id}',[UserController::class,'destroy']);

// Route::post('/login',[UserController::class,'login']);

Route::get('product', [ProductController::class, 'index']);
Route::post('product', [ProductController::class, 'store']);
Route::get('product/{id}', [ProductController::class, 'show']);
Route::put('product/{id}', [ProductController::class, 'update']);
Route::delete('product/{id}', [ProductController::class, 'destroy']);

// category
Route::get('category', [CategoryController::class, 'index']);
Route::post('category', [CategoryController::class, 'store']);
Route::get('category/{id}', [CategoryController::class, 'show']);
Route::put('category/{id}', [CategoryController::class, 'update']);
Route::delete('category/{id}', [CategoryController::class, 'destroy']);


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('/login', [AuthCustomerController::class, 'login']);
    Route::post('/register', [AuthCustomerController::class, 'register']);
    Route::post('/logout', [AuthCustomerController::class, 'logout']);
    Route::post('/refresh', [AuthCustomerController::class, 'refresh']);
    Route::post('/change-pass', [AuthCustomerController::class, 'changePassWord']);
});
Route::post('orders/checkout',[OrderController::class,'checkout']);

