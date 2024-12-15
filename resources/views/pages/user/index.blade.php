<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Bekas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>


    <style>
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            /* Membuat kartu membesar */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            /* Memberikan efek bayangan */
        }

        .card-img-top {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover .card-img-top {
            transform: scale(1.1);
            /* Membuat gambar membesar */
        }

        .search-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-input {
            width: 300px;
            height: 40px;
            font-size: 16px;
            padding-left: 30px;
            /* Memberikan ruang untuk ikon */
            flex-grow: 1;
        }

        .search-btn {
            margin-left: 10px;
            height: 40px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="p-3 bg-light border-bottom fixed-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Logo -->
                <a href="/" class="logo d-flex align-items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" height="60">
                </a>

                <!-- Navigation Links -->
                <nav class="d-flex align-items-center ms-3">
                    <a href="#" class="nav-link text-dark px-2">Dashbboard</a>
                    <div class="dropdown">
                        <a class="nav-link text-dark px-2 dropdown-toggle" href="#" role="button"
                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#postingan">Postingan</a></li>
                            <li><a class="dropdown-item" href="#kp">FIlter Produk</a></li>
                            <li><a class="dropdown-item" href="#"></a></li>
                        </ul>
                    </div>
                </nav>


                <!-- Search Bar -->
                <div class="d-flex align-items-center flex-grow-1 mx-3">
                    <form action="{{ route('postingan.cari') }}" method="GET" class="d-flex">
                        <input type="text" name="keyword" class="form-control search-input me-2" id="search"
                            placeholder="Cari Postingan..." style="max-width: 400px;" value="{{ request('keyword') }}">
                        <button class="btn btn-outline-secondary search-btn" type="submit">Cari</button>
                    </form>
                </div>


                <!-- User Actions -->
                <div class="d-flex align-items-center">
                    <a href="{{ route('user.postingan.create') }}" class="btn btn-warning btn-sm me-2"><i
                            class="fas fa-plus me-2"></i>Jual</a>
                    <a href="" class="btn btn-light btn-sm me-2"><i class="fas fa-shopping-cart"></i> </a>
                    <a href="" class="btn btn-light btn-sm me-2"><i class="fas fa-bell"></i></a>


                    <ul class="navbar-nav navbar-right">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <img alt="image" src="{{ asset('assets/templates/admin/img/avatar/avatar-3.png') }}"
                                    class="rounded-circle" style="width: 40px; height: 40px;">
                                <div class="d-sm-none d-lg-inline-block">Hi, {{ $username }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item text-secondary">
                                    <i class="fas fa-clipboard"></i> Kelola Postingan
                                </a>
                                <a href="{{ route('user.profil') }}" class="dropdown-item text-secondary">
                                    <i class="fas fa-user"></i> Profil
                                </a>
                                <a href="#" class="dropdown-item text-secondary">
                                    <i class="fas fa-life-ring"></i> Bantuan
                                </a>
                                <a href="{{ route('user.logout') }}" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </header>

    <!-- Content Section (with margin-top to prevent content from being hidden behind the navbar) -->
    <div style="margin-top: 150px;">
        <!-- Your content goes here -->
    </div>

    <!-- Modal Laporan -->
    <div class="modal fade" id="laporanModal" tabindex="-1" aria-labelledby="laporanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="laporanModalLabel">Form Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('laporan.submit') }}" method="POST">
                        @csrf
    
                        <!-- Jenis Laporan -->
                        <div class="mb-3">
                            <label for="jenis_laporan" class="form-label">Jenis Laporan</label>
                            <select name="jenis_laporan" id="jenis_laporan" class="form-select" required>
                                <option value="">Pilih Jenis Laporan</option>
                                <option value="Postingan Palsu">Postingan Palsu</option>
                                <option value="Penipuan">Penipuan</option>
                                <option value="Konten Melanggar">Konten Melanggar</option>
                            </select>
                        </div>
    
                        <!-- Teks Laporan -->
                        <div class="mb-3">
                            <label for="teks" class="form-label">Teks Laporan</label>
                            <textarea name="teks" id="teks" class="form-control" rows="4" required></textarea>
                        </div>
    
                        <!-- Input Hidden untuk ID Postingan -->
                        <input type="hidden" name="postingan_id" id="postingan_id" required>
    
                        <!-- Tombol Kirim Laporan -->
                        <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Modal Registrasi -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/bjbo.png') }}" alt="Logo BJBO" class="mb-3" height="100">
                        <h5>Daftar sekarang</h5>
                        <p class="text-muted">Sudah punya akun? <a href="#" class="text-primary"
                                data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loginModal">Masuk</a>
                        </p>
                    </div>
                    <form action="{{ route('post.register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="registerName" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Dimas Ardianto" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerEmail" class="form-label">Email atau nomor handphone</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerPassword" class="form-label">Kata Sandi</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="Password" name="password"
                                    placeholder="Masukkan sandi" required>
                                <span class="input-group-text">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Daftar</button>
                    </form>
                    <p class="text-center mt-3 small">
                        Dengan mendaftar, anda setuju dengan <a href="#" class="text-primary">Syarat &
                            Ketentuan</a> dan <a href="#" class="text-primary">Kebijakan BJBO</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/bjbo.png') }}" alt="Logo BJBO" class="mb-3" height="100">
                        <h5>Masuk ke akun Anda</h5>
                        <p class="text-muted">Belum punya akun? <a href="#" class="text-primary"
                                data-bs-dismiss="modal" data-bs-toggle="modal"
                                data-bs-target="#registerModal">Daftar</a></p>
                    </div>
                    <form class="row login_form" action="/post-login" method="POST" id="contactForm"
                        novalidate="novalidate">
                        @csrf
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email atau nomor handphone</label>
                            <input type="email" class="form-control" id="loginEmail" name="email"
                                placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Kata Sandi</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="loginPassword" name="password"
                                    placeholder="Masukkan sandi" required>
                                <span class="input-group-text">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-secondary w-100">Masuk</button>
                    </form>
                    <p class="text-center mt-3 small">
                        Lupa kata sandi? <a href="#" class="text-primary">Klik di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>



    @section('content')
        <div class="container my-5">
            <!-- Carousel Iklan -->
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/iklan9.png') }}" class="d-block w-100" alt="Iklan 1"
                            style="height: 300px;">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/iklan6.jpg') }}" class="d-block w-100" alt="Iklan 2"
                            style="height: 300px;">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/iklan10.png') }}" class="d-block w-100" alt="Iklan 2"
                            style="height: 300px;">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/iklan8.jpg') }}" class="d-block w-100" alt="Iklan 2"
                            style="height: 300px;">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>



            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="container my-4">
                        <h5 class="mb-3" id="kp">Kategori Produk</h5>
                        <div class="d-flex justify-content-around flex-wrap">
                            <a href="{{ route('postingan.kategori', 'Elektronik') }}"
                                class="btn btn-outline-primary mb-3"
                                style="width: 100px; height: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <i class="bi bi-tv display-4"></i>
                                <span>Elektronik</span>
                            </a>
                            <a href="{{ route('postingan.kategori', 'Fashion') }}" class="btn btn-outline-secondary mb-3"
                                style="width: 100px; height: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <i class="bi bi-bag display-4"></i>
                                <span>Fashion</span>
                            </a>
                            <a href="{{ route('postingan.kategori', 'Otomotif') }}" class="btn btn-outline-success mb-3"
                                style="width: 100px; height: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <i class="bi bi-car-front display-4"></i>
                                <span>Otomotif</span>
                            </a>
                            <a href="{{ route('postingan.kategori', 'Perabot') }}" class="btn btn-outline-warning mb-3"
                                style="width: 100px; height: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <i class="bi bi-house-door display-4"></i>
                                <span>Perabot</span>
                            </a>
                            <a href="{{ route('postingan.kategori', 'Lainnya') }}" class="btn btn-outline-dark mb-3"
                                style="width: 100px; height: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <i class="bi bi-grid display-4"></i>
                                <span>Semua</span>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>





            <!-- Filter Produk -->
            <div class="container my-4">
                <h5 class="mb-3">Filter Produk</h5>
                <div class="d-flex justify-content-around">
                    <button type="button" class="btn btn-outline-primary">
                        <i class="bi bi-stars"></i> Produk Terbaru
                    </button>
                    <button type="button" class="btn btn-outline-secondary">
                        <i class="bi bi-eye"></i> Sering Dilihat
                    </button>
                    <button type="button" class="btn btn-outline-success">
                        <i class="bi bi-heart"></i> Paling Diminati
                    </button>
                </div>
            </div>



            <div class="my-4" id="postingan">
                <h4>Rekomendasi Untuk Anda</h4>
                <div class="row">
                    @foreach ($postingans as $item)
                        <div class="col-md-3 mb-3 d-flex">
                            <div class="card w-100 d-flex flex-column">
                                <!-- Batasi tinggi gambar agar seragam -->
                                <div style="height: 200px; overflow: hidden;">
                                    <img src="{{ asset('images/' . $item->image) }}" class="card-img-top img-fluid"
                                        alt="{{ $item->name }}" style="object-fit: cover; height: 100%; width: 100%;">
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <h3 class="card-name">{{ $item->username }}</h3>

                                    <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                                    <p><strong>Rp {{ number_format($item->price, 0, ',', '.') }}</strong></p>

                                    <!-- Tombol-tombol di bagian bawah -->
                                    <div class="mt-auto">
                                        <a href="" class="btn btn-link">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24">
                                                <path
                                                    d="M12 4C7.03 4 3 7.03 3 12s4.03 8 9 8 9-4.03 9-8-4.03-8-9-8zm0 14c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7zm0-10c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" />
                                            </svg>
                                        </a>

                                        <a href="{{ route('user.detail.postingan', $item->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24">
                                                <path
                                                    d="M6 2C5.447 2 5 2.447 5 3v1H3a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V6a2 2 0 00-2-2h-2V3c0-.553-.447-1-1-1h-4c-.553 0-1 .447-1 1v1H6V3c0-.553-.447-1-1-1zm0 2h12v14H6V4z" />
                                            </svg>
                                        </a>

                                        <a href="#" class="btn btn-link">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24">
                                                <path
                                                    d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                            </svg>
                                        </a>

                                        <a href="#" class="btn btn-link">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24">
                                                <path
                                                    d="M3 2v16a1 1 0 001 1h14a1 1 0 001-1V2h-4V1a1 1 0 00-1-1H8a1 1 0 00-1 1v1H3z" />
                                            </svg>
                                        </a>

                                        <!-- Tombol Laporkan dengan SVG Icon -->
                                        <!-- Tombol Laporkan di dalam Card -->
                                        @foreach ($postingans as $post)
                                            <a href="#" class="btn btn-link laporanLink"
                                                data-postingan-id="{{ $post->id }}" data-bs-toggle="modal"
                                                data-bs-target="#laporanModal">
                                                <!-- SVG Icon untuk Laporkan dengan tanda seru -->
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    width="24" height="24" fill="currentColor">
                                                    <path
                                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z" />
                                                </svg>
                                            </a>
                                        @endforeach







                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="modal fade" id="laporanModal" tabindex="-1" aria-labelledby="laporanModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="laporanModalLabel">Form Laporan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('laporan.submit') }}" method="POST">
                                @csrf

                                <!-- Jenis Laporan -->
                                <div class="mb-3">
                                    <label for="jenis_laporan" class="form-label">Jenis Laporan</label>
                                    <select name="jenis_laporan" id="jenis_laporan" class="form-select" required>
                                        <option value="">Pilih Jenis Laporan</option>
                                        <option value="Postingan Palsu">Postingan Palsu</option>
                                        <option value="Penipuan">Penipuan</option>
                                        <option value="Konten Melanggar">Konten Melanggar</option>
                                    </select>
                                </div>

                                <!-- Teks Laporan -->
                                <div class="mb-3">
                                    <label for="teks" class="form-label">Teks Laporan</label>
                                    <textarea name="teks" id="teks" class="form-control" rows="4" required></textarea>
                                </div>

                                <!-- Tombol Kirim Laporan -->
                                <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

        <!-- Content Section -->
        <main>
            @yield('content')
        </main>


        <footer style="background-color: #f5f1f1; color: #000; padding: 30px 0; font-family: Arial, sans-serif;">
            <div style="display: flex; justify-content: space-around; flex-wrap: wrap;">
                <!-- Logo dan Alamat -->
                <div>
                    <img src="{{ asset('images/bjbo.png') }}" alt="Logo" height="80" width="80">
                    <p><strong>Alamat:</strong></p>
                    <p>
                        Jl. AL Muslihun,<br>
                        Desa. Wonosari Tengah,<br>
                        Kec. Bengkalis,<br>
                        Kab. Bengkalis, Provinsi Riau,<br>
                        Kode Pos: 28711
                    </p>
                    <p><strong>Follow Us:</strong></p>
                    <p>
                        <a href="https://www.instagram.com/bjbo.bengkalis/"
                            style="color: #000; text-decoration: none; margin-right: 10px;">Instagram</a> |
                        <a href="#" style="color: #000; text-decoration: none; margin-right: 10px;">Facebook</a>
                        |
                        <a href="#" style="color: #000; text-decoration: none;">LinkedIn</a>
                    </p>
                </div>
                <!-- Kolom bjbo -->
                <div>
                    <p><strong>BJBO</strong></p>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="{{ route('about') }}" style="color: #000; text-decoration: none;">About BJBO
                        </li>
                        <li><a href="#" style="color: #000; text-decoration: none;">Member Success Story</a>
                        </li>
                        <li><a href="#" style="color: #000; text-decoration: none;">Contact Us</a></li>
                        <li><a href="#" style="color: #000; text-decoration: none;">Community</a></li>
                        <li><a href="#" style="color: #000; text-decoration: none;">Pricing Plan</a></li>
                        <li><a href="#" style="color: #000; text-decoration: none;">FAQ</a></li>
                    </ul>
                </div>


                <!-- Kolom Program -->
                <div>
                    <p><strong>Program</strong></p>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="#" style="color: #000; text-decoration: none;">Jual Barang Bekas</a></li>
                        <li><a href="#" style="color: #000; text-decoration: none;">Beli Barang Bekas</a></li>
                        <li><a href="#" style="color: #000; text-decoration: none;">Pasang Iklan Gratis</a></li>
                        <li><a href="#" style="color: #000; text-decoration: none;">Promo Barang Baru</a></li>
                        <li><a href="#" style="color: #000; text-decoration: none;">Kategori Populer</a></li>
                    </ul>
                </div>
            </div>

            <div style="text-align: center; margin-top: 20px;">
                <p>Owned by <strong>PT Subaru Technologi Bangsa</strong></p>
            </div>
        </footer>

        <!-- Bootstrap JS -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.getElementById('laporanLink').addEventListener('click', function(e) {
                e.preventDefault();
                // Menampilkan modal
                var laporanModal = new bootstrap.Modal(document.getElementById('laporanModal'));
                laporanModal.show();
            });
        </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const laporanLinks = document.querySelectorAll('.laporanLink');
        
        laporanLinks.forEach(link => {
            link.addEventListener('click', function() {
                const postinganId = link.getAttribute('data-postingan-id');
                document.getElementById('postingan_id').value = postinganId;
            });
        });
    });
</script>



        <script>
            const searchInput = document.getElementById('search');
            const categories = ['Elektronik', 'Olahraga', 'Otomotif', 'Perabot', 'Semua Kategori'];
            let typingInterval; // Untuk menyimpan interval typing
            let currentCategoryIndex = 0; // Indeks kategori saat ini
            let isTypingByUser = false; // Menyimpan status apakah pengguna sedang mengetik

            function typeEffect(text, callback) {
                let index = 0;
                const type = () => {
                    if (isTypingByUser) return; // Jika pengguna sedang mengetik, hentikan animasi
                    if (index < text.length) {
                        searchInput.value = text.slice(0, index + 1); // Ketik huruf per huruf
                        index++;
                        typingInterval = setTimeout(type, 150); // Delay untuk setiap huruf
                    } else {
                        setTimeout(() => eraseEffect(callback), 1000); // Setelah selesai mengetik, mulai proses penghapusan
                    }
                };
                type();
            }

            function eraseEffect(callback) {
                let index = searchInput.value.length;
                const erase = () => {
                    if (isTypingByUser) return; // Hentikan jika pengguna mulai mengetik
                    if (index > 0) {
                        searchInput.value = searchInput.value.slice(0, index - 1); // Hapus huruf satu per satu
                        index--;
                        typingInterval = setTimeout(erase, 100); // Delay untuk penghapusan huruf
                    } else {
                        callback(); // Panggil callback untuk mengetik kategori berikutnya
                    }
                };
                erase();
            }

            function startTyping() {
                const typeNext = () => {
                    typeEffect(categories[currentCategoryIndex], () => {
                        currentCategoryIndex = (currentCategoryIndex + 1) % categories
                            .length; // Pindah ke kategori berikutnya
                        typeNext(); // Ketik kategori berikutnya
                    });
                };
                typeNext();
            }

            // Fungsi untuk menghentikan animasi saat pengguna mulai mengetik
            function stopTypingByUser() {
                clearTimeout(typingInterval); // Hentikan animasi
                isTypingByUser = true; // Tandai bahwa pengguna sedang mengetik
            }

            // Mulai animasi ketika pengguna tidak mengetik
            function resumeTyping() {
                if (!isTypingByUser) {
                    searchInput.value = ''; // Mulai dari input kosong
                    isTypingByUser = false;
                    startTyping(); // Mulai ulang animasi
                }
            }

            // Event listener untuk mendeteksi input dari pengguna
            searchInput.addEventListener('input', stopTypingByUser);

            // Event listener untuk mulai ulang animasi saat pengguna mengosongkan input atau menaruh kursor
            searchInput.addEventListener('focus', () => {
                isTypingByUser = false;
                searchInput.value = ''; // Kosongkan input saat fokus
                clearTimeout(typingInterval); // Hentikan interval sebelumnya
                startTyping(); // Mulai ulang animasi
            });

            // Mulai efek pengetikan saat halaman dimuat
            window.onload = startTyping;
        </script>

</body>

</html>
