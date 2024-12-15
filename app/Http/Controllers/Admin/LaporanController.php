<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Postingan;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function showForm()
    {
        // Ambil kategori laporan
        $laporan = Laporan::all();
    
        return view('laporan.form', compact('laporan'));
    }


    public function submit(Request $request)
    {
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user(); 
        $userId = $user->id; // Mendapatkan ID pengguna
      


        // Validasi input dari form
        $validated = $request->validate([
            'jenis_laporan' => 'required|string', // Validasi jenis laporan
            'teks' => 'required|string', 
            'postingan_id' => 'required|exists:postingans,id',// Validasi teks laporan
        ]);
    
        // Membuat laporan baru berdasarkan data yang diterima
        Laporan::create([
            'jenis_laporan' => $validated['jenis_laporan'], // Jenis laporan yang dipilih oleh pengguna
            'teks_laporan' => $validated['teks'], // Teks laporan yang diisi oleh pengguna
            'user_id' => $userId, // Menyimpan ID user yang sedang login
            'status' => 'Pending',
            'postingan_id' => $validated['postingan_id'], // Status laporan, bisa diubah sesuai dengan alur aplikasi Anda
        ]);
    
        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }
    
    public function index()
{
    $laporans = Laporan::with('user')->get(); // Pastikan data user di-relasi dipanggil
    return view('pages.admin.laporan.index', compact('laporans'));
}

}
