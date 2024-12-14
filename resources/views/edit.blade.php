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

<div class="container mt-5">
    <!-- Profile Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
            <img src="https://via.placeholder.com/80" alt="User Image" class="profile-img">
            <div class="ms-3">
                <h5 class="mb-0">Dimas Rio Ardianto</h5>
                <p>Bengkalis · Tervrifikasi</p>
            </div>
        </div>
        <a href="#" class="btn btn-primary">Ubah Profil</a>
    </div>

    <!-- Product Section -->
    <h4>Produk</h4>
    
    <!-- Product Card 1 -->
    <div class="card product-card">
        <div class="d-flex justify-content-between">
            <div>
                <h5>Lenovo Thinkpad</h5>
                <p>Rp 3.500.000</p>
                <p>Barang pemakaian baru 3 bulan, no minus</p>
                <p>Bengkalis, sungai alam</p>
            </div>
            <div>
                <a href="#" class="btn btn-warning btn-sm btn-edit">Edit produk</a>
                <a href="#" class="btn btn-danger btn-sm btn-delete">Hapus produk</a>
            </div>
        </div>
    </div>

    <!-- Product Card 2 -->
    <div class="card product-card">
        <div class="d-flex justify-content-between">
            <div>
                <h5>Infinix</h5>
                <p>Rp 1.500.000</p>
                <p>Barang seperti baru</p>
                <p>Bengkalis, sungai alam</p>
            </div>
            <div>
                <a href="#" class="btn btn-warning btn-sm btn-edit">Edit produk</a>
                <a href="#" class="btn btn-danger btn-sm btn-delete">Hapus produk</a>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
