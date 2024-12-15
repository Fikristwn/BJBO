@extends('layouts.admin.main')
@section('title', 'Admin Product')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengguna</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Pengguna</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Pengguna</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @forelse ($users as $item)
                                            <tr>
                                                <td>{{ $no += 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    @if ($item->is_blocked)
                                                        <span class="badge badge-danger">Diblokir</span>
                                                    @else
                                                        <span class="badge badge-success">Aktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <!-- Tombol Hapus dengan ikon -->
                                                    <a href="{{ route('pengguna.delete', $item->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">
                                                        <i class="fas fa-trash-alt"></i> Hapus
                                                    </a>

                                                    <!-- Tombol Buka Blokir atau Blokir dengan ikon -->
                                                    @if ($item->is_blocked)
                                                        <a href="{{ route('pengguna.unblock', $item->id) }}" class="btn btn-warning btn-sm" data-confirm="true">
                                                            <i class="fas fa-unlock-alt"></i> Buka Blokir
                                                        </a>
                                                    @else
                                                        <a href="{{ route('pengguna.block', $item->id) }}" class="btn btn-dark btn-sm" data-confirm="true">
                                                            <i class="fas fa-ban"></i> Blokir
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Data Pengguna Kosong</td>
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
