<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::get('/product', function () {
    return view('product');
});
Route::get('/add_product', function () {
    return view('add_product');
});
Route::get('/login', function () {
    return view('login');
});
