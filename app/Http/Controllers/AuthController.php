<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //post function login
    public function login(Request $request){
        $credentials = $request->validate([
            'name' => 'required|min:8|max:50',
            'password' => 'required|min:8|max:100'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended("dashboard");
        }
        return back()->withErrors([
            'message' => 'username and password doesn\'t match'
        ]);
    }

    public function logout(Request $request){
        if(Auth::user()){
            $request->session()->invalidate();
        }
        return redirect()->intended("login");
    }
}
