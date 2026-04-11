<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PenggunaController extends Controller
{
    // 🔒 Proteksi login
    public function __construct()
    {
        if (!session('login')) {
            redirect('/login')->send();
        }
    }

    public function index()
    {
        $data = User::all();
        return view('pengguna.index', compact('data'));
    }

    public function store(Request $request)
    {
        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/pengguna');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'email' => $request->email
        ]);

        return redirect('/pengguna');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/pengguna');
    }
}
