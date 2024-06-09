<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "username" => 'required',
            "password" => 'required'
        ]);

        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Mengarahkan pengguna berdasarkan peran mereka
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/admin');
            }

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', "Gagal/Failed Login");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
