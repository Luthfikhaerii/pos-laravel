<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction_item;
use App\Models\Transaction;
use App\Models\Product;

class Cart extends Component
{
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

    public function increment($id){
        $this->cart[$id]['amount']++;
        $this->amount_item++;
        $this->total_price += $this->cart[$id]['price'];
    }

    public function decrement($id){
        if ($this->cart[$id]['amount'] > 1) {
            $this->cart[$id]['amount']--;
            $this->amount_item--;
            $this->total_price -= $this->cart[$id]['price'];
        }
    }

    public function remove($id){
        $this->amount_item -=$this->cart[$id]['amount'];
        $this->total_price -= $this->cart[$id]['price'];
        unset($this->cart[$id]);
    }

    public function createTransaction(){
        $this->validate([
            'amount_item' => 'required|integer',
            'total_price' => 'required|integer',
        ]);

        $transaction = Transaction::create([
            'amount_item' => $this->amount_item,
            'total_price' => $this->total_price,
            'date_transaction' => now(),
        ]);


        if(isset($transaction)) {
            $transaction_item = [];
            $stock_update = [];

            foreach ($this->cart as $item) {
                $transaction_item[] = [
                 'transaction_id' => $transaction->id,
                 'product_id' => $item['id'],
                 'amount' => $item['amount'],
                ];
                $stock_update[] = [
                    'id' => $item['id'],
                    'stock' => $item['stock'] - $item['amount'],
                    'name_product' => $item['name_product'],
                    'category' => $item['category'],
                    'price'=> $item['price']
                ];
           }
            Transaction_item::insert($transaction_item);
            Product::upsert($stock_update, ['id'], ['stock']);
        } 
    
        return redirect('/');
    }

    public function test($isi){
        $this->count += $isi;
    }
    
     public function render()
    {
        return view('livewire.cart', [
            'cart' => $this->cart,
            'amount_item' => $this->amount_item,
            'total_price' => $this->total_price
        ]);
    }
     
}
