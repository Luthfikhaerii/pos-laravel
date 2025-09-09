<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddProductController extends Controller
{
    public function index(){
        return view('add_product', compact('data'));
    }

    public function create(Request $request) {
        $data = $request->all();
        Product::create([
            'name_product' => $data['name_product'],
            'price' => $data['image'],
            'category' => $data['category'],
            'price' => $data['price'],
            'stock' => $data['stock'],
        ]);
        return $data;
    }
}
