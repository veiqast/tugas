<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Halaman login
    public function login()
    {
        return view('login');
    }

    // Proses login
    public function prosesLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;


        if ($username == "admin" && $password == "123") {
            session(['login' => true]);
            return redirect('/pengguna');
        } else {
            return redirect('/login')->with('error', 'Username atau Password salah!');
        }
    }

    // Logout
    public function logout()
    {
        session()->forget('login');
        return redirect('/login');
    }
}
