<!DOCTYPE html>
<html>

<head>
    <title>Hill Cipher App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #141e30, #243b55);
            color: white;
            min-height: 100vh;
        }

        .card {
            background: #1f2937;
            border: none;
            border-radius: 15px;
        }

        .title {
            font-weight: bold;
            letter-spacing: 2px;
        }

        .result {
            font-size: 22px;
            font-weight: bold;
            color: #00ffcc;
        }
    </style>

</head>

<body>

    <div class="container mt-5">

        <div class="text-center mb-4">
            <h1 class="title">HILL CIPHER</h1>
            <p>Laravel Cryptography Tool</p>
        </div>

        <div class="card shadow-lg p-4">

            <div class="row">

                <div class="col-md-6">

                    <h4>Encrypt</h4>

                    <form action="/hill/encrypt" method="POST">
                        @csrf

                        <input
                            type="text"
                            name="text"
                            id="plaintext"
                            class="form-control mb-3"
                            placeholder="Masukkan plaintext">

                        <button class="btn btn-success w-100">
                            Encrypt
                        </button>

                    </form>

                </div>

                <div class="col-md-6">

                    <h4>Decrypt</h4>

                    <form action="/hill/decrypt" method="POST">
                        @csrf

                        <input
                            type="text"
                            name="text"
                            id="ciphertext"
                            class="form-control mb-3"
                            placeholder="Masukkan ciphertext">

                        <button class="btn btn-danger w-100">
                            Decrypt
                        </button>

                    </form>

                </div>

            </div>

            <hr class="mt-4">

            <div class="text-center">

                @if(session('ciphertext'))
                <div class="result" id="cipherResult">
                    Cipher : {{ session('ciphertext') }}
                </div>

                <button class="btn btn-outline-light mt-2" onclick="copyCipher()">
                    Copy Cipher
                </button>
                @endif

                @if(session('plaintext'))
                <div class="result mt-3">
                    Plain : {{ session('plaintext') }}
                </div>
                @endif

            </div>

        </div>

    </div>


    <script>
        document.getElementById("plaintext")?.addEventListener("input", function() {
            this.value = this.value.toUpperCase().replace(/[^A-Z]/g, '')
        })

        document.getElementById("ciphertext")?.addEventListener("input", function() {
            this.value = this.value.toUpperCase().replace(/[^A-Z]/g, '')
        })


        function copyCipher() {

            let text = document.getElementById("cipherResult").innerText

            navigator.clipboard.writeText(text)

            alert("Cipher berhasil dicopy!")

        }
    </script>

</body>

</html>