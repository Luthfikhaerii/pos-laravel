<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $id;
    public $stock;
    public $price;
    public $name;
    public $image;
    public function render()
    {
        return view('livewire.cart');
    }

    public function incrementStock($id){
        $this->stock = $this->stock + 1;
        $this->emit('incrementStockEvent', $id);
    }
    
    public function decrementStock($id){
        if ($this->stock > 0) {
            $this->stock = $this->stock - 1;
            $this->emit('decrementStockEvent', $id);
        }
    }
     
     
}
