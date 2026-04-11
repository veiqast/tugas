<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Futuristik</title>
    <style>
        body {
            margin: 0;
            background: #020617;
            color: white;
            font-family: Arial;
            overflow: hidden;
        }

        .navbar {
            background: rgba(0, 0, 0, 0.7);
            padding: 15px;
            text-align: center;
            box-shadow: 0 0 15px cyan;
        }

        .content {
            text-align: center;
            margin-top: 100px;
        }

        .btn {
            padding: 10px 20px;
            background: transparent;
            border: 1px solid cyan;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background: cyan;
            color: black;
            box-shadow: 0 0 20px cyan;
        }

        canvas {
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
        }
    </style>
</head>

<body>

    <canvas id="bg"></canvas>

    <div class="navbar">
        DASHBOARD ACHMAD
    </div>

    <div class="content">
        <h1 id="welcome">Selamat Datang</h1>
        <br>
        <a href="/logout">
            <button class="btn">Logout</button>
        </a>
    </div>

    <script>
        // animasi teks ketik
        const text = "Selamat Datang di Sistem!";
        let i = 0;

        function typing() {
            if (i < text.length) {
                document.getElementById("welcome").innerHTML += text.charAt(i);
                i++;
                setTimeout(typing, 50);
            }
        }
        document.getElementById("welcome").innerHTML = "";
        typing();

        // background partikel futuristik
        const canvas = document.getElementById("bg");
        const ctx = canvas.getContext("2d");

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        let particles = [];

        for (let i = 0; i < 100; i++) {
            particles.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                size: Math.random() * 2,
                speed: Math.random() * 1
            });
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.fillStyle = "cyan";

            particles.forEach(p => {
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
                ctx.fill();

                p.y += p.speed;

                if (p.y > canvas.height) {
                    p.y = 0;
                    p.x = Math.random() * canvas.width;
                }
            });

            requestAnimationFrame(animate);
        }

        animate();
    </script>

</body>

</html>