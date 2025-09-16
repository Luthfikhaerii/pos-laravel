<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//AUTH
Route::get('/login', [App\Http\Controllers\UserController::class,'index'])->name('login');
Route::post('/login_user', [App\Http\Controllers\UserController::class,'login'])->name('login_user');
Route::get('/logout_user', [App\Http\Controllers\UserController::class,'logout'])->name('logout_user');

//MIDDLEWARE
Route::middleware('auth.custom').group(function(){
    // PRODUCT
    Route::get('/get_product',[App\Http\Controllers\ProductController::class,'get']);
    Route::post('/add_product',[App\Http\Controllers\AddProductController::class,'create'])->name('add_product.create');
    Route::put('/update_product/{id}',[App\Http\Controllers\ProductController::class,'update'])->name('product.update');
    Route::get('/delete_product/{id}',[App\Http\Controllers\ProductController::class,'delete'])->name('product.delete');
});
