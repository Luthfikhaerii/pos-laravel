<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class DetailOrder extends Component
{
    public $status = 'NEW ORDER';

    public $product;
    public $cart = [];
    public $amount_item = 0;
    public $total_price = 0;

    protected $listeners = ['addToCart','test'];

   public function addToCart($id, $name_product, $price,$stock,$category){
        if(isset($this->cart[$id])){
            $this->cart[$id]['amount']++;         
        } else {
            $this->cart[$id] = [
                'id'=>$id,
                'name_product' => $name_product,
                'price' => $price,
                'stock' => $stock,
                'category'=>$category,
                'amount' => 1
            ];
        };
        $this->count=$id;
        $this->amount_item++;
        $this->total_price += $price;
    }

    public function createTransaction($id){

        Transaction::where('id')->update([
            'status'=>$this->status
        ]);
    
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.detail-order',['cart'=>$this->cart,'amount_item' => $this->amount_item]);
    }
}
