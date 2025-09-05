<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function login() {
        return view('login');
    }

    public function create(Request $request) {
        $data = $request->all();
        print_r($data);
        User::create($data);
        return $data;
    }
}
