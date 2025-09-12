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

// HISTORY
Route::get('/history', function () {
    return view('history');
});
Route::get('/history_detail/{id}', [App\Http\Controllers\HistoryDetail::class,'index'])->name('history_detail.index');


// REPORT
Route::get('/report',[\App\Http\Controllers\ReportController::class, 'index'])->name('report.index');
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

Route::put('/update_product/{id}',[App\Http\Controllers\ProductController::class,'update'])->name('product.update');

Route::get('/delete_product/{id}',[App\Http\Controllers\ProductController::class,'delete'])->name('product.delete');

