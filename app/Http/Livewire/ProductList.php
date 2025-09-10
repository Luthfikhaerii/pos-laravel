<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductList extends Component
{

    public $category='';

    public function mount(){
        $this->category= request()->get('category');
    }

    public function add($id, $name_product, $price, $stock)
    {
        $this->emit('addToCart', $id, $name_product, $price, $stock);
    }

    public function render()
    {
        $data = [];
        if ($category == 'drink') {
            $data = Product::where('category', 'drink')->orderBy('created_at', 'DESC')->paginate(8);
        } else if ($category == 'food') {
            $data = Product::where('category', 'food')->orderBy('created_at', 'DESC')->paginate(8);
        } else {
            $data = Product::orderBy('created_at', 'DESC')->paginate(8);
        }

        return view('livewire.product-list', compact('data'));
    }
}
