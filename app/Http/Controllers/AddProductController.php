<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AddProductController extends Controller
{
    public function index(){
        return view('add_product');
    }

    public function create(Request $request) {
        $data = $request->all();
        var_dump($data);
        Product::create([
            'name_product' => $data['name_product'],
            'price' => $data['image'],
            'category' => $data['category'],
            'price' => $data['price'],
            'stock' => $data['stock'],
        ]);
        return redirect('/add_product');
    }
}
