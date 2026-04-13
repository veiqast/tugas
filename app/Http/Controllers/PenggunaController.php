<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // WAJIB

class PenggunaController extends Controller
{
    public function index()
    {
        if (!session('login')) {
            return redirect('/login');
        }

        $data = User::all(); // ambil semua data dari tabel pengguna

        return view('pengguna', compact('data'));
    }

    public function store(Request $request)
    {
        if (!session('login')) {
            return redirect('/login');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/pengguna');
    }

    public function update(Request $request, $id)
    {
        if (!session('login')) {
            return redirect('/login');
        }

        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect('/pengguna');
    }

    public function destroy($id)
    {
        if (!session('login')) {
            return redirect('/login');
        }

        User::find($id)->delete();

        return redirect('/pengguna');
    }
}
