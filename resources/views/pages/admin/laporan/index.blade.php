@extends('layouts.admin.main')

@section('title', 'Admin Laporan')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Laporan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Laporan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Laporan</th>
                                            <th>Teks Laporan</th>
                                            <th>Nama Pengguna</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($laporans as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->jenis_laporan }}</td>
                                                <td>{{ $item->teks_laporan }}</td>
                                                <td>{{ $item->user ? $item->user->name : 'Tidak Diketahui' }}</td>
                                                <td class="{{ $item->status == 'aktif' ? 'badge bg-success text-white' : 'badge bg-secondary text-white' }}">
                                                    {{ $item->status }}
                                                </td>
                                                <td>
                                                   
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
        </div>
    </section>
</div>
@endsection
