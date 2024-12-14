@extends('layouts.admin.main')
@section('title', 'Admin Product')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Produk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Postingan</div>
                </div>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
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
                        @php
                            $no = 0;
                        @endphp
                        @forelse ($postingans as $item)
                            <tr>
                                <td>{{ $no += 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }} </td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->category }} </td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->lokasi }} </td>
                                <td class="
                                @if ($item->status == 'disetujui')
                                    badge bg-success text-white  <!-- Latar belakang hijau dan teks putih -->
                                @else
                                    badge bg-secondary text-white  <!-- Latar belakang abu-abu dan teks putih -->
                                @endif
                            ">
                                {{ $item->status }}
                            </td>
                            
                            
                            
                                <td>
                                    <!-- Form untuk mengubah status -->
                                    <form action="{{ route('posting.updateStatus', $item->id) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <!-- Tombol untuk mengganti status -->
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            @if ($item->status == 'disetujui')
                                                Belum Setujui
                                            @else
                                             Setujui
                                            @endif
                                        </button>
                                        <a href="#" class="btn btn-warning btn-sm btn-edit">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm btn-delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        
                                    </form>
                                    
                               
                                </td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Data Produk Kosong</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
