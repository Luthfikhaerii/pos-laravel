<?php

namespace App\Charts;

use App\Models\Transaction;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class SalesChart extends Chart
{
    public function __construct()
    {
        parent::__construct();

        // Query aggregate PostgreSQL: group by bulan tahun 2025
        $omset = Transaction::selectRaw("TO_CHAR(created_at, 'Month') as bulan, SUM(total_price) as total_omset")
            ->whereYear('created_at', 2025)
            ->groupBy('bulan')
            ->orderByRaw("MIN(created_at)")
            ->get();

        // Ambil label (nama bulan) & data (total_omset)
        $labels = $omset->pluck('bulan')->toArray();
        $data   = $omset->pluck('total_omset')->toArray();

        // Masukkan ke chart
        $this->labels($labels);

        $this->dataset('Omset Bulanan', 'bar', $data)
            ->backgroundColor('rgba(54, 162, 235, 0.6)');
    }
}
