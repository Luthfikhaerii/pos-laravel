<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class SalesChart extends Chart
{
    public function __construct()
    {
        parent::__construct();

        $this->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May']);

        $this->dataset('Omset Bulanan', 'bar', [1500000, 2300000, 1800000, 2500000, 3000000])
            ->backgroundColor('rgba(54, 162, 235, 0.6)');
    }
}
