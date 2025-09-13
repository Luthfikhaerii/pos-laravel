<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        return view('login');
    }

    public function create(Request $request) {
        $data = $request->all();
        User::create($data);
        return $data;
    }

    public function login(Request $request){
        $credential = $request->only('email','password');
        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect('/');
        }

        return redirect('/login');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
