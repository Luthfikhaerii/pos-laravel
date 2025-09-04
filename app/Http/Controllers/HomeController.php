<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $data = $this->get();
        return view('home',['data'=> $data]);
    }

    public function get(){
        return [
        [
            'name_product' => 'Coklat Berry Superman',
            'category' => 'Food',
            'price' => 15000,
            'stock' => 20,
            'status' => 'Available',
        ],
        [
            'name_product' => 'Snack Ring Cheese',
            'category' => 'Food',
            'price' => 10000,
            'stock' => 15,
            'status' => 'Available',
        ],
        [
            'name_product' => 'Kopi Susu Gula Aren',
            'category' => 'Drink',
            'price' => 12000,
            'stock' => 10,
            'status' => 'Available',
        ],
    ];
    }
}
