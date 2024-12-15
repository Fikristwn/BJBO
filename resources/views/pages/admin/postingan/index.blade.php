@extends('layouts.admin.main')

@section('title', 'Admin Postingan')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Postingan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Postingan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Postingan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Produk</th>
                                            <th>Nama Pengguna</th>
                                            <th>Harga Produk</th>
                                            <th>Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Lokasi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($postingans as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->category }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->lokasi }}</td>
                                                <td>
                                                    <span class="badge {{ $item->status == 'disetujui' ? 'bg-success' : 'bg-secondary' }} text-white">
                                                        {{ $item->status }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <form action="{{ route('posting.updateStatus', $item->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            {{ $item->status == 'disetujui' ? 'Belum Setujui' : 'Setujui' }}
                                                        </button>
                                                    </form>
                                                    <a href="#" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center">Data Postingan Kosong</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
