<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class HistoryDetail extends Controller
{

    public function index($id){
        $data = Transaction::with('transaction_item')->find($id);
        return view('history_detail',compact('data'));
    }
}
