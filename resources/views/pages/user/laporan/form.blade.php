<!-- resources/views/laporan/form.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Form Laporan</h1>
        <form action="{{ route('laporan.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kategori">Kategori Laporan</label>
                <select name="kategori" id="kategori" class="form-control">
                    <option value="pengguna">Pengguna</option>
                    <option value="produk">Produk</option>
                    <option value="transaksi">Transaksi</option>
                </select>
            </div>
            <div class="form-group">
                <label for="laporan_text">Laporan</label>
                <textarea name="laporan_text" id="laporan_text" class="form-control" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Laporan</button>
        </form>
    </div>
@endsection
