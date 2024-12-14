<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - BJBO</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f9f9f9;">
    @include('sweetalert::alert')
    <form class="row login_form" action="{{ route('post.register') }}" method="POST" id="contactForm" novalidate="novalidate">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%; border-radius: 10px;">
        <div class="text-center mb-4">
            <img src="{{ asset('images/bjbo.png') }}"  alt="Logo BJBO" class="mb-3" height="100" weight="50">
            <h5>Daftar sekarang</h5>
            <p class="text-muted">Sudah punya akun? <a href="#" class="text-primary">Masuk</a></p>
        </div>
        <form action="#" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Dimas Ardianto" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email atau nomor handphone</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan  sandi" required>
                    <span class="input-group-text">
                        <i class="bi bi-eye"></i>
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Daftar</button>
        </form>
        <p class="text-center mt-3 small">
            Dengan mendaftar, anda setuju dengan <a href="#" class="text-primary">Syarat & Ketentuan</a> dan <a href="#" class="text-primary">Kebijakan BJBO</a>
        </p>
    </div>
</div>
    </form>
<footer class="text-center mt-auto py-3 bg-light">
    <div class="container">
        <p class="mb-2">Ikuti kami di:</p>
        <div>
            <a href="#" class="me-2"><i class="bi bi-facebook"></i></a>
            <a href="#" class="me-2"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-youtube"></i></a>
        </div>
        <p class="text-muted mt-3">&copy; 2024 BJBO, All rights reserved.</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
