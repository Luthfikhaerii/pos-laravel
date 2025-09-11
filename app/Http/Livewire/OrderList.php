<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrderList extends Component
{
    public function render()
    {
        $data = [];
        if(request()->get('status')=='NEW ORDER'){
            $data = Order::where('status','NEW ORDER')->orderBy('created_at','desc')->paginate(12);
        }else if(request()->get('status')=='ON COOK'){
            $data = Order::where('status','ON COOK')->orderBy('created_at','desc')->paginate(12);
        }else if(request()->get('status')=='DONE'){
            $data = Order::where('status','DONE')->orderBy('created_at','desc')->paginate(12);
        }else if(request()->get('status')=='CANCELED'){
            $data = Order::where('status','CANCELED')->orderBy('created_at','desc')->paginate(12);
        }else{
            $data = Order::orderBy('created_at','desc')->paginate(12);
        }
        return view('livewire.order-list',compact('data'));
    }
}
