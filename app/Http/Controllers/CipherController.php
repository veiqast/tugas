<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CipherController extends Controller
{
    public function index()
    {
        return view('caesar');
    }

    public function process(Request $request)
    {
        return view('caesar', [
            'text' => $request->text,
            'shift' => $request->shift,
            'mode' => $request->mode
        ]);
    }
}
