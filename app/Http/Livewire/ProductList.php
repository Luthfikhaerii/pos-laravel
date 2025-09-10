<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductList extends Component
{

    public function add($id, $name_product, $price, $stock,$category)
    {
        $this->emit('addToCart', $id, $name_product, $price, $stock,$category);
    }

    public function yow($isi){
        $this->emit('test',$isi);
    }

    public function render()
    {
        $data = [];
        if (request()->get('category') == 'drink') {
            $data = Product::where('category', 'drink')->orderBy('created_at', 'DESC')->paginate(9);
        } else if (request()->get('category') == 'food') {
            $data = Product::where('category', 'food')->orderBy('created_at', 'DESC')->paginate(9);
        } else {
            $data = Product::orderBy('created_at', 'DESC')->paginate(9);
        }

        return view('livewire.product-list', compact('data'));
    }
}
