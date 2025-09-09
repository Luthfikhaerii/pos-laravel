<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        return view('product', ['data' => Product::orderBy('created_at','desc')->paginate(8)]);
    }

    public function edit($id){
        $data = Product::find($id);
        return view('edit_product', compact('data'));
    }

    public function update(Request $request,$id){
        $data = $request->all();
        $product = Product::find($id);
        $product->update([
            'name_product' => $data['name_product'],
            'image' => $data['image'],
            'category' => $data['category'],
            'price' => $data['price'],
            'stock' => $data['stock'],
        ]);
        return redirect(`/edit_product/${$id}`);

    }
}
