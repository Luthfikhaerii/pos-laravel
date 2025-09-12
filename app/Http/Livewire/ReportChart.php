<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Carbon\Carbon;

class ReportChart extends Component
{
    public $startDate;
    public $endDate;

    public $totalTransactions = 0;
    public $totalRevenue = 0;
    public $totalItems = 0;
    public $monthlyRevenue = [];

    public function mount()
    {
        // default: bulan ini
        $this->startDate = Carbon::now()->startOfMonth()->toDateString();
        $this->endDate = Carbon::now()->endOfMonth()->toDateString();

        $this->generateReport();
    }

    public function updated($field)
    {
        if (in_array($field, ['startDate', 'endDate'])) {
            $this->generateReport();
        }
    }

    public function generateReport()
    {
        $query = Transaction::with('transaction_item')
            ->whereBetween('created_at', [$this->startDate, $this->endDate]);

        $transactions = $query->get();

        $this->totalTransactions = $transactions->count();
        $this->totalRevenue = $transactions->sum('total_price');
        $this->totalItems = $transactions->flatMap->transaction_item->sum('amount');

        // Ambil omzet per bulan
        $this->monthlyRevenue = Transaction::selectRaw('DATE_TRUNC(\'month\', created_at) as month, SUM(total_price) as revenue')
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('revenue', 'month')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.report-chart');
    }
}

