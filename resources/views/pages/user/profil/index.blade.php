<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .profile-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }
        .product-card {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
        }
        .product-card img {
            max-height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }
        .btn-edit, .btn-delete {
            margin-right: 5px;
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
            <!-- User Actions -->
            <div class="d-flex align-items-center">
                <a class="btn btn-danger btn-sm me-2" href="{{ route('user.logout') }}">Logout</a>
                <a class="btn btn-secondary btn-sm me-2" href="{{ route('user.dashboard') }}">Kembali</a>
                <a href="{{ route('user.postingan.create') }}" class="btn btn-warning btn-sm me-2"> Jual</a>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <!-- User Profile Image with Bootstrap Class -->
                            <img alt="image" src="{{ asset('assets/templates/admin/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1" style="width: 40px; height: 40px;">
                            <!-- User Name (Hi, Fikri) -->
                            <div class="d-sm-none d-lg-inline-block">Hi, Fikri</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- Dropdown Item for Logout -->
                            <a href="{{ route('user.logout') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>


<div style="margin-top: 120px;">
    <!-- Your content goes here -->
</div>


<div class="container mt-5">
   <!-- Profile Section -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="d-flex align-items-center">
        <img src="https://via.placeholder.com/80" alt="User Image" class="profile-img">
        <div class="ms-3">
            <h5 class="mb-0">{{ Auth::user()->name }}</h5>
        </div>
    </div>
        <a href="#" class="btn btn-primary">Ubah Profil</a>
    </div>

    <!-- Product Section -->
    <h4>Produk</h4>
    
    <div class="container">
        @foreach($postingan as $item)
        <div class="card product-card mb-3">
            <div class="d-flex">
                <!-- Gambar di sebelah kiri -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('images/' . $item->image) }}" class="card-img-left" alt="{{ $item->name }}" style="width: 150px; height: auto;">
                </div>
                
                <!-- Konten di sebelah kanan -->
                <div class="flex-grow-1 ms-3">
                    <h5>{{ $item->name }}</h5>
                    <p>Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                    <p>{{ $item->description }}</p>
                    <p>{{ $item->lokasi }}</p>
                    <div>
                        <!-- Edit Postingan Button -->
                        <a href="{{ route('user.profil.edit', $item->id) }}" class="btn btn-warning btn-sm btn-edit">Edit postingan</a>
                        <!-- Delete Form -->
                        <form action="{{ route('user.profil.delete', $item->id) }}" method="POST" id="delete-form-{{ $item->id }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <!-- Hidden Delete Button -->
                            <button type="submit" style="display: none" id="delete-btn-{{ $item->id }}"></button>
                        </form>
                        <!-- Delete Button with JavaScript for Form Submission -->
                        <a href="#" class="btn btn-danger btn-sm btn-edit" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
