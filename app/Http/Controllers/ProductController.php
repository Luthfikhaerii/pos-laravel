<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request){
        $query = $request->query('category');
        $data = [];
        if ($query=="drink") {
            $data = Product::where('category','drink')->orderBy('created_at','desc')->paginate(8);
        }else if ($query=="food") {
            $data = Product::where('category','food')->orderBy('created_at','desc')->paginate(8);
        }else{
            $data = Product::orderBy('created_at','desc')->paginate(8);
        }
        return view('product', compact('data'));
    }

    public function edit($id){
        $data = Product::find($id);
        return view('edit_product', compact('data'));
    }

    public function update(Request $request,$id){
        $data = $request->all();
        $product = Product::find($id);
        if(isset($data['image'])){
            $path = $request->file('image')->store('images','public');
            $data['image'] = $path;
        }else{
            $data['image'] = $product->image;
        }
        $product->update([
            'name_product' => $data['name_product'],
            'image' => $data['image'],
            'category' => $data['category'],
            'price' => $data['price'],
            'stock' => $data['stock'],
        ]);
        return redirect('/edit_product/'.$id);

    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        return redirect('/product');
    }
}
