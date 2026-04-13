<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // HALAMAN LOGIN
    public function login()
    {
        return view('login');
    }

    // PROSES LOGIN
    public function prosesLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if ($username == "admin" && $password == "123") {

            // penting biar session aman & kebaca
            $request->session()->regenerate();

            session(['login' => true]);

            return redirect('/pengguna');
        } else {
            return redirect('/login')->with('error', 'Username atau Password salah!');
        }
    }

    // DASHBOARD
    public function dashboard()
    {
        if (!session('login')) {
            return redirect('/login');
        }

        return view('dashboard');
    }

    // LOGOUT
    public function logout()
    {
        session()->flush(); // hapus semua session
        return redirect('/login');
    }
}
