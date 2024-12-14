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

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" src="{{ asset('images/logo.png') }}" alt="Logo" height="50"></a>
        <div class="d-flex align-items-center">
            <input type="text" class="form-control me-3" placeholder="Cari Produk">
           
            <button class="btn btn-success">Jual</button>
        </div>
    </div>
</nav>
    <div class="main-content">
        <section class="section">
            
            <a href="{{ route('user.postingan.create') }}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-plus"></i>Tambah Produk</a>

            <div class="card-body">
                <div class="row">
                   
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title"></h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">HargaPoints</p>
                                    <p class="card-text">Distributor: {{ $item->nama_distributor }}</p>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('product.detail', $item->id) }}" class="badge badge-info">Detail</a>
                                        <a href="{{ route('product.edit', $item->id) }}" class="badge badge-warning">Edit</a>
                                        <a href="{{ route('product.delete', $item->id) }}" class="badge badge-danger" data-confirm-delete="true">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center">Data Produk Kosong</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
