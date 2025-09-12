<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SalesChart;

class ReportController extends Controller
{
    public function index(SalesChart $chart)
    {
        return view('report', ['chart' => $chart]);
    }
}
