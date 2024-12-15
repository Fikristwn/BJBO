@extends('layouts.admin.main')

@section('title', 'Ulasan')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ulasan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="#">Ulasan</a>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Ulasan</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Postingan</th>
                                        <th>Pengguna</th>
                                        <th>Rating</th>
                                        <th>Komentar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ulasans as $index => $ulasan)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $ulasan->postingan->judul ?? 'Tidak ada judul' }}</td>
                                        <td>{{ $ulasan->user->name ?? 'Tidak ada pengguna' }}</td>
                                        <td>{{ $ulasan->rating }}</td>
                                        <td>{{ $ulasan->komentar }}</td>
                                        <td>
                                            <!-- Aksi seperti Edit, Hapus bisa ditambahkan di sini -->
                                           
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
