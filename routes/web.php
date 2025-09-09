<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddProductController;

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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/order', function () {
    return view('order');
});
Route::get('/history', function () {
    return view('history');
});
Route::get('/report', function () {
    return view('report');
});
Route::get('/product',[App\Http\Controllers\ProductController::class,'index']);

Route::get('/add_product', function () {
    return view('add_product');
});

Route::get('/edit_product/{id}', [App\Http\Controllers\ProductController::class,'edit']);

Route::get('/login', function () {
    return view('login');
});

// API Route
Route::get('/get_product',[App\Http\Controllers\ProductController::class,'get']);

Route::post('/add_product',[AddProductController::class,'create'])->name('add_product.create');

Route::put('/update_product/{id}',[App\Http\Controllers\ProductController::class,'update']);

