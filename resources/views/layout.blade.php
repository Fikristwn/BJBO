<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BJBO - Belanjo & Jual Barang Bekas atau Baru sedagho</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
  
</head>

<body>

<!-- Header -->
<header class="p-3 bg-light border-bottom">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <a href="/" class="logo d-flex align-items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" height="60">
            </a>

            <!-- Navigation Links -->
            <nav class="d-flex align-items-center ms-3">
                <a href="#" class="nav-link text-dark px-2">Postingan</a>
                <a href="#" class="nav-link text-dark px-2">Fesyen</a>
                <a href="#" class="nav-link text-dark px-2">Perawatan Pribadi</a>
              
            </nav>

            <!-- Search Bar -->
            <div class="d-flex align-items-center flex-grow-1 mx-3">
                <i class="bi bi-search search-icon text-dark me-2"></i>
                <input type="text" class="form-control search-input me-2" id="search" placeholder="Cari Produk..." style="max-width: 400px;">
                <button class="btn btn-outline-secondary search-btn" type="button">Cari</button>
            </div>

        

            <!-- User Actions -->
            <div class="d-flex align-items-center">
                <button class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#registerModal">Daftar</button>
                <button class="btn btn-secondary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Masuk</button>
                <button class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Jual</button>
                
            </div>
        </div>
    </div>
</header>



<!-- Modal Registrasi -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mb-4">
                    <img src="{{ asset('images/bjbo.png') }}" alt="Logo BJBO" class="mb-3" height="100">
                    <h5>Daftar sekarang</h5>
                    <p class="text-muted">Sudah punya akun? <a href="loginmodal" class="text-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loginModal">Masuk</a></p>
                </div>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form action="{{ route('post.register') }}" method="POST" id="contactForm" novalidate="novalidate">
                    @csrf
                    <div class="mb-3">
                        <label for="registerName" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Dimas Ardianto" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Email atau nomor handphone</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">Kata Sandi</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="Password" name="password" placeholder="Masukkan sandi" required>
                            <span class="input-group-text">
                                <i class="bi bi-eye"></i>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Daftar</button>
                </form>
                <p class="text-center mt-3 small">Atau daftar dengan</p>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('google.redirect') }}" class="btn btn-outline-secondary me-2">
                        <img src="{{ asset('images/google-icon.png') }}" alt="Google" height="20" class="me-2"> Daftar dengan Google
                    </a>
                    
                    <button class="btn btn-outline-secondary">
                        <img src="{{ asset('images/facebook-icon.png') }}" alt="Facebook" height="20" class="me-2"> Daftar dengan Facebook
                    </button>
                </div>
                <p class="text-center mt-3 small">
                    Dengan mendaftar, Anda setuju dengan <a href="#" class="text-primary">Syarat & Ketentuan</a> dan <a href="#" class="text-primary">Kebijakan BJBO</a>
                </p>
            </div>
        </div>
    </div>
</div>


<!-- Modal Login -->
<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mb-4">
                    <img src="{{ asset('images/bjbo.png') }}" alt="Logo BJBO" class="mb-3" height="100">
                    <h5>Masuk ke akun Anda</h5>
                    <p class="text-muted">Belum punya akun? <a href="#" class="text-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerModal">Daftar</a></p>
                </div>
                <form action="/post-login" method="POST" id="contactForm" novalidate="novalidate">
                    @csrf
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email atau nomor handphone</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Kata Sandi</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan sandi" required>
                            <span class="input-group-text">
                                <i class="bi bi-eye"></i>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary w-100">Masuk</button>
                </form>
                <p class="text-center mt-3 small">Atau masuk dengan</p>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('google.redirect') }}" class="btn btn-outline-secondary me-2">
                        <img src="{{ asset('images/google-icon.png') }}" alt="Google" height="20" class="me-2"> Daftar dengan Google
                    </a>
                    <button class="btn btn-outline-secondary">
                        <img src="{{ asset('images/facebook-icon.png') }}" alt="Facebook" height="20" class="me-2"> Masuk dengan Facebook
                    </button>
                </div>
                <p class="text-center mt-3 small">
                    Lupa kata sandi? <a href="#" class="text-primary">Klik di sini</a>
                </p>
            </div>
        </div>
    </div>
</div>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container my-4">
                <h5 class="mb-3">Kategori Produk</h5>
                <div class="d-flex justify-content-around flex-wrap">
                    <button type="button" class="btn btn-outline-primary mb-3" style="width: 100px; height: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <i class="bi bi-tv display-4"></i>
                        <span>Elektronik</span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary mb-3" style="width: 100px; height: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <i class="bi bi-bicycle display-4"></i>
                        <span>Olahraga</span>
                    </button>
                    <button type="button" class="btn btn-outline-success mb-3" style="width: 100px; height: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <i class="bi bi-car-front display-4"></i>
                        <span>Otomotif</span>
                    </button>
                    <button type="button" class="btn btn-outline-warning mb-3" style="width: 100px; height: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <i class="bi bi-house-door display-4"></i>
                        <span>Perabot</span>
                    </button>
                    <button type="button" class="btn btn-outline-dark mb-3" style="width: 100px; height: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <i class="bi bi-grid display-4"></i>
                        <span>Semua</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    @section('content')
    <div class="container my-5">
        <!-- Carousel Iklan -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/iklan1.jpg') }}" class="d-block w-100" alt="Iklan 1" style="height: 300px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/iklan2.jpg') }}" class="d-block w-100" alt="Iklan 2" style="height: 300px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/iklan3.jpg') }}" class="d-block w-100" alt="Iklan 2" style="height: 300px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/iklan4.jpg') }}" class="d-block w-100" alt="Iklan 2" style="height: 300px;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    
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
              <a href="https://www.instagram.com/bjbo.bengkalis/" style="color: #000; text-decoration: none; margin-right: 10px;">Instagram</a> |
              <a href="#" style="color: #000; text-decoration: none; margin-right: 10px;">Facebook</a> |
              <a href="#" style="color: #000; text-decoration: none;">LinkedIn</a>
            </p>
          </div>
          <!-- Kolom bjbo -->
          <div>
            <p><strong>BJBO</strong></p>
            <ul style="list-style: none; padding: 0;">
              <li>< <a href="{{ route('about') }}" style="color: #000; text-decoration: none;">About BJBO</></li>
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
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('contactForm');
    
            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Mencegah pengiriman default untuk simulasi
                const formData = new FormData(this);
    
                // Simulasi Pengiriman ke Server (gunakan AJAX untuk yang sebenarnya)
                fetch('{{ route('post.register') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) { // Asumsikan server mengembalikan respons JSON dengan "success"
                        // Tutup modal
                        const registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
                        registerModal.hide();
    
                        // Tampilkan alert berhasil
                        alert('Registrasi berhasil! Selamat datang di BJBO!');
                    } else {
                        // Tangani kesalahan
                        alert('Registrasi gagal: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Kesalahan:', error);
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                });
            });
        });
    </script>
    
    <!--================End Login Box Area =================-->
     <script src="{{ asset('assets/templates/user/js/vendor/jquery-2.2.4.min.js') }}"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-
     b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
     <script src="{{ asset('assets/templates/user/js/vendor/bootstrap.min.js') }}"></script>
     <script src="{{ asset('assets/templates/user/js/jquery.ajaxchimp.min.js') }}"></script>
     <script src="{{ asset('assets/templates/user/js/jquery.nice-select.min.js') }}"></script>
     <script src="{{ asset('assets/templates/user/js/jquery.sticky.js') }}"></script>
     <script src="{{ asset('assets/templates/user/js/nouislider.min.js') }}"></script>
     <script src="{{ asset('assets/templates/user/js/jquery.magnific-popup.min.js') }}"></script>
     <script src="{{ asset('assets/templates/user/js/owl.carousel.min.js') }}"></script>
     <!--gmaps Js-->
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDO
     vfAu6eE"></script>
     <script src="{{ asset('assets/templates/user/js/gmaps.min.js') }}"></script>
     <script src="{{ asset('assets/templates/user/js/main.js') }}"></script>
    <script>
      
    document.querySelector('#contactForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);

        fetch("{{ route('post.register') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Registrasi berhasil!");
                const modal = bootstrap.Modal.getInstance(document.querySelector('#registerModal'));
                modal.hide();
                form.reset();
            } else {
                alert("Registrasi gagal: " + data.message);
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });


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
                    currentCategoryIndex = (currentCategoryIndex + 1) % categories.length; // Pindah ke kategori berikutnya
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
