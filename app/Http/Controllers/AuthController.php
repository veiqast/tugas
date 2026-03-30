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

        // LOGIN SEDERHANA (hardcode)
        if ($username == "admin" && $password == "123") {
            session(['login' => true]);
            return redirect('/dashboard');
        } else {
            return redirect('/login')->with('error', 'Username atau Password salah!');
        }
    }

    // Halaman dashboard
    public function dashboard()
    {
        if (!session('login')) {
            return redirect('/login');
        }
        return view('dashboard');
    }

    // Logout
    public function logout()
    {
        session()->forget('login');
        return redirect('/login');
    }
}
