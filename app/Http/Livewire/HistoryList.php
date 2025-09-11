<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class HistoryList extends Component
{
    public function render()
    {
        $data = Transaction::where('status','DONE')->paginate(15);
        return view('livewire.history-list',compact('data'));
    }
}
