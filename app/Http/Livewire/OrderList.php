<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;

class OrderList extends Component
{
    use WithPagination;

    public $statusFilter = null;
    
    protected $queryString = [
        'statusFilter' => ['except' => '', 'as' => 'status']
    ];

    public function mount()
    {
        // Set initial filter from query string
        $this->statusFilter = request()->get('status');
    }

    public function addDetail($id, $transaction_item, $total_price, $amount_item, $created_at, $status)
    {
        return $this->emit('addToDetail', $id, $transaction_item, $total_price, $amount_item, $created_at, $status);
    }

    public function updatedStatusFilter()
    {
        // Reset pagination when filter changes
        $this->resetPage();
    }

    public function render()
    {
        $query = Transaction::with('transaction_item')->orderBy('created_at', 'desc');
        
        // Apply filter if status is set
        if ($this->statusFilter && $this->statusFilter !== '') {
            $query->where('status', $this->statusFilter);
        }
        
        $data = $query->paginate(12);
        
        return view('livewire.order-list', compact('data'));
    }
}