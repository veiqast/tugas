<!DOCTYPE html>
<html>

<head>
    <title>Pengguna</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('https://images.unsplash.com/photo-1500595046743-ddf4d3d753fd') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', sans-serif;
        }

        .overlay {
            background: rgba(255, 255, 255, 0.85);
            min-height: 100vh;
            padding-bottom: 50px;
        }

        .navbar {
            background-color: rgba(76, 175, 80, 0.9);
        }

        .card {
            border-radius: 15px;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .btn-primary {
            background-color: #4CAF50;
            border: none;
        }

        .btn-warning {
            background-color: #ffb74d;
            border: none;
        }

        .btn-danger {
            background-color: #e57373;
            border: none;
        }

        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="overlay">

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <span class="navbar-brand text-white">🐄</span>
                <a href="/logout" class="btn btn-light btn-sm">Logout</a>
            </div>
        </nav>

        <div class="container mt-5 fade-in">

            <!-- FORM TAMBAH -->
            <div class="card mb-4 shadow">
                <div class="card-body">
                    <form action="/pengguna/store" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="email" name="email" class="form-control" placeholder="Email Pengguna" required>
                            </div>
                            <div class="col">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary w-100">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- TABEL -->
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-hover align-middle">
                        <thead class="table-success">
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->email }}</td>
                                <td>{{ $d->password }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editData({{ $d->id }}, '{{ $d->email }}')">Edit</button>
                                    <a href="/pengguna/delete/{{ $d->id }}" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

    <!-- MODAL EDIT -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formEdit" method="POST">
                    @csrf
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title">Edit Pengguna</h5>
                    </div>
                    <div class="modal-body">
                        <input type="email" name="email" id="editEmail" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function editData(id, email) {
            document.getElementById('editEmail').value = email;
            document.getElementById('formEdit').action = '/pengguna/update/' + id;

            let modal = new bootstrap.Modal(document.getElementById('editModal'));
            modal.show();
        }
    </script>

</body>

</html>