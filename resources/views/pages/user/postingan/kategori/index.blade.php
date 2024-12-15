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
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover .card-img-top {
            transform: scale(1.1);
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
            flex-grow: 1;
        }

        .search-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #888;
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
                <div class="dropdown">
                    <a class="nav-link text-dark px-2 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#postingan">Postingan</a></li>
                        <li><a class="dropdown-item" href="#kp">Filter Produk</a></li>
                    </ul>
                </div>
            </nav>

            <!-- Search Bar -->
            <div class="d-flex align-items-center flex-grow-1 mx-3">
                <form action="{{ route('postingan.cari') }}" method="GET" class="d-flex">
                    <i class="bi bi-search search-icon text-dark me-2"></i>
                    <input type="text" name="keyword" class="form-control search-input me-2" id="search" placeholder="Cari Postingan..." style="max-width: 400px;" value="{{ request('keyword') }}">
                    <button class="btn btn-outline-secondary search-btn" type="submit">Cari</button>
                </form>
            </div>

            <!-- User Actions -->
            <div class="d-flex align-items-center">
                <a href="{{ route('user.postingan.create') }}" class="btn btn-warning btn-sm me-2"> Jual</a>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img alt="image" src="{{ asset('assets/templates/admin/img/avatar/avatar-3.png') }}" class="rounded-circle" style="width: 40px; height: 40px;">
                            <div class="d-sm-none d-lg-inline-block">Hi,</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#" class="dropdown-item text-secondary">
                                <i class="fas fa-sign-out-alt"></i>kelola postingan
                            </a>
                            <a href="{{ route('user.profil') }}" class="dropdown-item text-secondary">
                                <i class="fas fa-sign-out-alt"></i> Profil
                            </a>
                            <a href="#" class="dropdown-item text-secondary">
                                <i class="fas fa-sign-out-alt"></i> Bantuan
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
<div style="margin-top: 200px;">
    <!-- Your content goes here -->
</div>

@if(isset($category))
    <h4>Produk dalam Kategori: "{{ $category }}"</h4>
@else
    <h4>Semua Produk</h4>
@endif

<div class="row">
    @forelse($postingan as $item)
        <div class="col-md-3 mb-3">
            <div class="card h-100">
                <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 16px; height: 50px; overflow: hidden;">{{ $item->name }}</h5>
                    <p class="card-text" style="font-size: 14px; height: 60px; overflow: hidden;">{{ Str::limit($item->description, 100) }}</p>
                    <p><strong>Rp {{ number_format($item->price, 0, ',', '.') }}</strong></p>
                    <a href="{{ route('user.detail.postingan', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                </div>
            </div>
        </div>
    @empty
        <p>Tidak ada produk dalam kategori ini.</p>
    @endforelse
</div>


<!-- Footer -->
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
                <a href="https://www.instagram.com/bjbo.bengkalis/" style="color: #000; text-decoration: none; margin-right: 10px;">Instagram</a> |
                <a href="#" style="color: #000; text-decoration: none; margin-right: 10px;">Facebook</a> |
                <a href="#" style="color: #000; text-decoration: none;">LinkedIn</a>
            </p>
        </div>
        <!-- Kolom bjbo -->
        <div>
            <p><strong>BJBO</strong></p>
            <ul style="list-style: none; padding: 0;">
                <li><a href="{{ route('about') }}" style="color: #000; text-decoration: none;">About BJBO</a></li>
                <li><a href="#" style="color: #000; text-decoration: none;">Member Success Story</a></li>
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
    const searchInput = document.getElementById('search');
    const categories = ['Elektronik', 'Olahraga', 'Otomotif', 'Perabot', 'Semua Kategori'];
    let typingInterval;
    let currentCategoryIndex = 0;
    let isTypingByUser = false;

    function typeEffect(text, callback) {
        let index = 0;
        const type = () => {
            if (isTypingByUser) return;
            if (index < text.length) {
                searchInput.value = text.slice(0, index + 1);
                index++;
                setTimeout(type, 150);
            } else {
                callback();
            }
        };
        type();
    }

    function switchCategory() {
        currentCategoryIndex = (currentCategoryIndex + 1) % categories.length;
        typeEffect(categories[currentCategoryIndex], switchCategory);
    }

    searchInput.addEventListener('focus', () => {
        isTypingByUser = true;
        clearInterval(typingInterval);
    });

    searchInput.addEventListener('blur', () => {
        isTypingByUser = false;
        typingInterval = setInterval(switchCategory, 3000);
    });

    typingInterval = setInterval(switchCategory, 3000);
</script>

</body>

</html>
