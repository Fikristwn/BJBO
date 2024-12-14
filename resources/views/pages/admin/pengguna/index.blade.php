@extends('layouts.admin.main')
@section('title', 'Admin Product')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengguna</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Pengguna</div>
                </div>
            </div>
                      <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tr>
                            <th>#</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        @php
                            $no = 0;
                        @endphp
                        @forelse ($users as $item)
                            <tr>
                                <td>{{ $no += 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    
                                    <a href="{{ route('pengguna.delete', $item->id) }}" class="badge badge-danger"data-confirm-delete="true">Hapus</a>
                                </td>
                            </tr>
                        @empty
                            <td colspan="5" class="text-center">Data Produk Kosong</td>
                        @endforelse
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
