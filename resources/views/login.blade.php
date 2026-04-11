<!DOCTYPE html>
<html>

<head>
    <title>Login Futuristik</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            background: #0f172a;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial;
            color: white;
        }

        .login-box {
            background: rgba(15, 23, 42, 1.0);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px cyan;
            text-align: center;
            width: 300px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background: transparent;
            border: 1px solid cyan;
            color: white;
            outline: none;
        }

        input:focus {
            box-shadow: 0 0 10px cyan;
        }

        button {
            background: cyan;
            border: none;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            box-shadow: 0 0 20px cyan;
            transform: scale(1.05);
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

    <div class="login-box">
        <h2>🔐 LOGIN</h2>

        @if(session('error'))
        <p class="error">{{ session('error') }}</p>
        @endif

        <form method="POST" action="/login" id="loginForm">
            @csrf
            <input type="text" name="username" placeholder="Username" id="username">
            <input type="password" name="password" placeholder="Password" id="password">
            <button type="submit">LOGIN</button>
        </form>
    </div>

    <script>
        // efek ketik glow
        const inputs = document.querySelectorAll("input");

        inputs.forEach(input => {
            input.addEventListener("input", () => {
                input.style.boxShadow = "0 0 15px cyan";
                setTimeout(() => {
                    input.style.boxShadow = "0 0 5px cyan";
                }, 200);
            });
        });

        // validasi sederhana + animasi
        document.getElementById("loginForm").addEventListener("submit", function(e) {
            const user = document.getElementById("username").value;
            const pass = document.getElementById("password").value;

            if (user === "" || pass === "") {
                e.preventDefault();
                alert("⚠️ Input tidak boleh kosong!");
            }
        });
    </script>

</body>

</html>