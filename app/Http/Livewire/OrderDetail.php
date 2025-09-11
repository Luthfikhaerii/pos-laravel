<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class OrderDetail extends Component
{
    public $detail = ['transaction_item'=>[],'id'=>''];
    public $amount_item = 0;
    public $total_price = 0;
    public $created_at = '';
    public $status = 'NEW ORDER';
    protected $listeners = ['addToDetail'];

   public function addToDetail($id, $transaction_item, $total_price, $amount_item, $created_at,$status){
        $this->detail['id']=$id;
        $this->detail['transaction_item']=is_string($transaction_item) ? json_decode($transaction_item,true)
        : $transaction_item;;
        $this->total_price=$total_price;
        $this->amount_item=$amount_item;
        $this->created_at=$created_at;
        $this->status=$status;
    }

    public function updateStatus($id,$status){
        Transaction::where('id',$id)->update([
            'status'=>$status
        ]);

        return redirect('/transaction');
    }

    public function render()
    {
        return view('livewire.order-detail',['detail'=>$this->detail,'amount_item' => $this->amount_item,'total_price'=>$this->total_price,'created_at'=>$this->created_at]);
    }
}
