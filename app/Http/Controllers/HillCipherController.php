<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HillCipherController extends Controller
{

    private $key = [
        [3, 3],
        [2, 5]
    ];

    private function mod26($n)
    {
        return ($n % 26 + 26) % 26;
    }

    private function textToNumbers($text)
    {
        $text = strtoupper($text);
        $numbers = [];

        for ($i = 0; $i < strlen($text); $i++) {
            $numbers[] = ord($text[$i]) - 65;
        }

        return $numbers;
    }

    private function numbersToText($numbers)
    {
        $text = '';

        foreach ($numbers as $num) {
            $text .= chr($num + 65);
        }

        return $text;
    }

    public function encrypt(Request $request)
    {
        $text = str_replace(" ", "", strtoupper($request->text));

        if (strlen($text) % 2 != 0) {
            $text .= "X";
        }

        $nums = $this->textToNumbers($text);
        $result = [];

        for ($i = 0; $i < count($nums); $i += 2) {

            $a = $nums[$i];
            $b = $nums[$i + 1];

            $c1 = $this->mod26($this->key[0][0] * $a + $this->key[0][1] * $b);
            $c2 = $this->mod26($this->key[1][0] * $a + $this->key[1][1] * $b);

            $result[] = $c1;
            $result[] = $c2;
        }

        $cipher = $this->numbersToText($result);

        return back()->with([
            'plaintext' => $text,
            'ciphertext' => $cipher
        ]);
    }


    public function decrypt(Request $request)
    {
        $text = strtoupper($request->text);
        $nums = $this->textToNumbers($text);

        // invers matriks dari key
        $inverse = [
            [15, 17],
            [20, 9]
        ];

        $result = [];

        for ($i = 0; $i < count($nums); $i += 2) {

            $a = $nums[$i];
            $b = $nums[$i + 1];

            $p1 = $this->mod26($inverse[0][0] * $a + $inverse[0][1] * $b);
            $p2 = $this->mod26($inverse[1][0] * $a + $inverse[1][1] * $b);

            $result[] = $p1;
            $result[] = $p2;
        }

        $plain = $this->numbersToText($result);

        return back()->with([
            'ciphertext' => $text,
            'plaintext' => $plain
        ]);
    }
}
