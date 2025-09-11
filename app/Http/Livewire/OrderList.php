<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class OrderList extends Component
{
    public function addDetail($id, $transaction_item, $total_price, $amount_item, $created_at,$status){
        return $this->emit('addToDetail',$id, $transaction_item, $total_price, $amount_item, $created_at,$status);
    }

    public function render()
    {
        $data = [];
        if(request()->get('status')=='NEW ORDER'){
            $data = Transaction::with('transaction_item')->where('status','NEW ORDER')->orderBy('created_at','desc')->paginate(12);
        }else if(request()->get('status')=='ON COOK'){
            $data = Transaction::with('transaction_item')->where('status','ON COOK')->orderBy('created_at','desc')->paginate(12);
        }else if(request()->get('status')=='DONE'){
            $data = Transaction::with('transaction_item')->where('status','DONE')->orderBy('created_at','desc')->paginate(12);
        }else if(request()->get('status')=='CANCELED'){
            $data = Transaction::with('transaction_item')->where('status','CANCELED')->orderBy('created_at','desc')->paginate(12);
        }else{
            $data = Transaction::with('transaction_item')->orderBy('created_at','desc')->paginate(12);
        }
        return view('livewire.order-list',compact('data'));
    }
}
