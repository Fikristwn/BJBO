<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>



textarea.form-control {
    resize: none;
    border-radius: 5px;
}



        body {
            background-color: #f8f9fa;
        }
        .product-gallery img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .related-products .card img {
            height: 150px;
            object-fit: cover;
        }
        footer {
            background-color: #fbeedb;
            padding: 10px;
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        #chat-app {
    display: flex;
    height: 400px;
    border: 1px solid #ccc;
}
.user-list {
    width: 30%;
    border-right: 1px solid #ccc;
    overflow-y: auto;
}
.chat-box {
    width: 70%;
    display: flex;
    flex-direction: column;
}
.messages {
    flex: 1;
    overflow-y: auto;
    padding: 10px;
}
.chat-input {
    border-top: 1px solid #ccc;
    padding: 10px;
}
.sent {
    text-align: right;
    background-color: #dcf8c6;
}
.received {
    text-align: left;
    background-color: #fff;
}

    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">BJBO</a>
        <form class="d-flex mx-auto">
            <input class="form-control me-2" type="search" placeholder="Cari Produk" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
        <div>
            <a href="{{ route('user.dashboard') }}" class="btn btn-primary">Kembali</a>
            <a href="#" class="me-3"><i class="bi bi-person-circle fs-4"></i></a>
            <button class="btn btn-primary">Jual</button>
        </div>
    </div>
</nav>

<!-- Product Detail Section -->
<div class="container my-5">
    <div class="row g-4">
        <!-- Product Images -->
        <div class="col-md-6">
            <div class="product-gallery">
                <img src="{{ asset('images/' . $postingan->image) }}" alt="Product Image" class="img-fluid">
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h1>{{ $postingan->name }}</h1>
            <h5>{{ $postingan->username }}</h5>

            <p class="text-muted">Rp{{ number_format($postingan->price, 0, ',', '.') }}</p>
            <p>
                <strong>Deskripsi:</strong><br>
                {{ $postingan->description }}
            </p>
            <div class="d-flex align-items-center">
                <span class="badge bg-primary me-2">{{ $postingan->category }}</span>
            </div>
            <button href="chat-app" class="btn btn-success mt-3">Chat Dengan Penjual</button>
            <button class="btn btn-success mt-3">Pesan Sekarang</button>

            <!-- Ulasan Produk -->
            <div class="mt-5">
                <h4>Ulasan Produk</h4>
                <!-- Tampilkan Ulasan yang sudah ada -->
                @foreach ($postingan->ulasan as $ulasan)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>{{ $ulasan->user->name }} (Rating: {{ $ulasan->rating }})</h5>
                            <p>{{ $ulasan->komentar }}</p>
                        </div>
                    </div>
                @endforeach

                <!-- Form Ulasan -->
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('ulasan.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="postingan_id" value="{{ $postingan->id }}">
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <select name="rating" id="rating" class="form-control" required>
                                    <option value="">Pilih Rating</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="komentar">Komentar</label>
                                <textarea name="komentar" id="komentar" class="form-control" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Kirim Ulasan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Related Products -->

<div class="container my-5">
    <h5 class="mb-4">Daftar Terkait</h5>
    <div class="row row-cols-1 row-cols-md-4 g-3">
        @foreach($postingansama as $item)
        <div class="col">
            <div class="card">
                <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title">{{ $item->name }}</h3>
                    <h5 class="card-title">{{ $item->username }}</h5>
                    <p class="card-text">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


<script>
    export default {
      data() {
        return {
          search: '',
          users: [], // Daftar pengguna
          selectedUser: null, // Pengguna yang sedang dipilih untuk chatting
          messages: [], // Daftar pesan untuk percakapan yang dipilih
          newMessage: '', // Pesan baru yang sedang ditulis
          currentUser: { id: 1, name: 'Admin' }, // Pengguna saat ini (ubah dengan data yang sesuai)
        };
      },
      computed: {
        // Filter pengguna berdasarkan pencarian
        filteredUsers() {
          return this.users.filter(user => user.name.toLowerCase().includes(this.search.toLowerCase()));
        },
      },
      methods: {
        // Pilih pengguna untuk memulai percakapan
        selectUser(user) {
          this.selectedUser = user;
          this.fetchMessages(user.id); // Ambil pesan untuk pengguna yang dipilih
        },
        // Ambil pesan dari server
        fetchMessages(receiverId) {
          // Gantilah dengan API Anda untuk mendapatkan pesan
          // Misalnya menggunakan axios:
          axios.get(`/api/messages/${receiverId}`).then(response => {
            this.messages = response.data;
          });
        },
        // Kirim pesan ke server
        sendMessage() {
          if (this.newMessage.trim() === '') return;
    
          const messageData = {
            sender_id: this.currentUser.id,
            receiver_id: this.selectedUser.id,
            message: this.newMessage,
          };
    
          // Kirim pesan ke server (gunakan axios untuk request ke backend)
          axios.post('/api/messages', messageData).then(response => {
            this.messages.push(response.data); // Menambahkan pesan baru ke tampilan
            this.newMessage = ''; // Reset input pesan
          }).catch(error => {
            console.error('Error sending message:', error);
          });
        },
      },
      mounted() {
        // Ambil daftar pengguna dari server (misalnya menggunakan axios)
        axios.get('/api/users').then(response => {
          this.users = response.data;
        });
      },
    };
    </script>
<!-- Footer -->
<footer>
    <p>Ikuti kami di:</p>
    <div>
        <a href="#" class="me-3 text-primary">Facebook</a>
        <a href="#" class="text-danger">Instagram</a>
    </div>
    <small>2024 BJBO, All rights reserved.</small>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
