<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Postingan;

class PostingController extends Controller
{
    public function index()
    {
        $postingans = Postingan::all();
        confirmDelete('Hapus Data!', 'Yakin hapus?');
        return view('pages.admin.postingan.index', compact('postingans'));
    }
    public function delete($id)
    {
        $postingan = Postingan::findOrFail($id);
        $postingan->delete();

        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil dihapus');
    }

    
    
    public function updateStatus($id)
    {
        // Temukan postingan berdasarkan ID
        $postingan = Postingan::findOrFail($id);

        // Cek status saat ini dan toggle antara 'disetujui' dan 'belum disetujui'
        if ($postingan->status === 'disetujui') {
            $postingan->status = 'belum disetujui'; // Ganti ke 'belum disetujui'
        } else {
            $postingan->status = 'disetujui'; // Ganti ke 'disetujui'
        }

        // Simpan perubahan ke database
        $postingan->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('pages.admin.postingan.index')->with('success', 'Status produk berhasil diperbarui.');
    }
}

