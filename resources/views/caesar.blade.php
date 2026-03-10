<!DOCTYPE html>
<html>

<head>
    <title>Caesar Cipher</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card shadow">

                    <div class="card-header text-center bg-primary text-white">
                        <h4>Caesar Cipher Encryption</h4>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="/caesar">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Text</label>
                                <input type="text" name="text" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Shift</label>
                                <input type="number" name="shift" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Mode</label>
                                <select name="mode" class="form-select">
                                    <option value="encrypt">Encrypt</option>
                                    <option value="decrypt">Decrypt</option>
                                </select>
                            </div>

                            <button class="btn btn-primary w-100">
                                Proses Cipher
                            </button>

                        </form>

                    </div>

                </div>

                @if(isset($text))

                <?php

                $result = "";
                $shiftValue = $shift;

                if ($mode == "decrypt") {
                    $shiftValue = -$shift;
                }

                for ($i = 0; $i < strlen($text); $i++) {

                    $char = $text[$i];

                    if (ctype_alpha($char)) {

                        $ascii = ord($char);

                        if (ctype_upper($char)) {
                            $result .= chr(($ascii - 65 + $shiftValue + 26) % 26 + 65);
                        } else {
                            $result .= chr(($ascii - 97 + $shiftValue + 26) % 26 + 97);
                        }
                    } else {
                        $result .= $char;
                    }
                }

                ?>

                <div class="card mt-4 shadow">

                    <div class="card-header bg-success text-white">
                        Hasil Cipher
                    </div>

                    <div class="card-body">

                        <p><b>Text Asli :</b> {{ $text }}</p>
                        <p><b>Shift :</b> {{ $shift }}</p>
                        <p><b>Mode :</b> {{ $mode }}</p>
                        <p><b>Output :</b> <span class="text-primary fw-bold">{{ $result }}</span></p>

                    </div>

                </div>

                @endif

            </div>

        </div>

    </div>

</body>

</html>