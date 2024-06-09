<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class daftarController extends Controller
{
    public function index()
    {
        return view('login.daftar');
    }

    public function daftar(Request $request)
    {
        $validatedData = $request->validate([
            "name" => 'required|max:255',
            "username" => 'required|max:255',
            "password" => 'required|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::Create($validatedData);

        return redirect('/')->with('success', 'Registrasi berhasil. Silakan login menggunakan akun yang baru dibuat.');
    }
}
