<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eaeff4;
        }
        .navbar {
            background-color: #f8f9c9;
        }
        .navbar-brand img {
            height: 40px;
        }
        .upload-section {
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .upload-photo {
            border: 2px dashed #cccccc;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            cursor: pointer;
        }
        .upload-photo img {
            max-width: 100%;
            margin-top: 15px;
        }
        .upload-photo:hover {
            background-color: #f8f8f8;
        }
        .btn-upload {
            background-color: #20c997;
            color: #fff;
            border: none;
        }
        .btn-upload:hover {
            background-color: #17a589;
        }
    </style>
</head>
<body>

<!-- Form -->

<form action="{{ route('user.postingan.store') }}" class="needs-validation" novalidate="" enctype="multipart/form-data" method="POST">
    @csrf
    <!-- Upload Section -->
    <div class="container upload-section">
        <h4 class="text-center mb-4">Unggah Produk</h4>
        
        <a href="{{ route('user.dashboard') }}" class="btn btn-primary">kembali</a>
        <br>
        <div class="row">
            <!-- Upload Photo -->
            <br>
            <div class="col-md-6">
                <div class="upload-photo">
                    <i class="bi bi-camera fs-1"></i>
                    <input class="custom-file-input" name="image" id="customFile" type="file" required>
                    <p class="mt-3">Pilih Foto</p>
                    <p class="text-muted">Masukkan foto produk anda</p>
                    <img src="preview-image.png" alt="Preview Foto">
                </div>
               
            </div>
            <!-- Product Form -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="category" class="form-label">Pilih Kategori</label>
                    <select class="form-select" id="category" name="category" required>
                        <option selected>Pilih kategori</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Fashion">Fashion</option>
                        <option value="Otomotif">Otomotif</option>
                        <option value="Otomotif">Lainnya</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="productName" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama produk" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan harga produk" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi (Opsional)</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Masukkan deskripsi produk"></textarea>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Pilih Lokasi Anda</label>
                    <select class="form-select" id="lokasi" name="lokasi" required>
                        <option selected>Pilih Lokasi</option>
                        <option value="Bengkalis">Bengkalis</option>
                        <option value="Bantan">Bantan</option>
                        <option value="Luar Bengkalis">Di luar Bengkalis</option>
                    </select>
                </div>
                <input type="hidden" name="status" id="status" value="belum disetujui"> <!-- Status hidden field set to "belum disetujui" -->
                <button type="submit" class="btn btn-upload w-100">Simpan</button>
            </div>
        </div>
    </div>
</form>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.getElementById('customFile').addEventListener('change', function(e) {
    const reader = new FileReader();
    reader.onload = function(event) {
        document.querySelector('.upload-photo img').src = event.target.result;
    };
    reader.readAsDataURL(e.target.files[0]);
});
</script>

</body>
</html>
