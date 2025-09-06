<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data = Product::all();
        return view('product', compact('data'));
    }

    public function create(Request $request) {
        $data = $request->all();
        print_r($data);
        return $data;
    }
}
