<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\Laporan;
use App\Models\User;
use App\Models\FlashSale;
use App\Models\History;
use App\Models\message;
use Carbon\Carbon;


use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
{
    $postingans = Postingan::where('status', 'disetujui')->get();
    $username = Auth::user()->name;
    $laporan = Laporan::all();
    return view('pages.user.index',compact('postingans','username','laporan'));
}
public function about()
{
    
    return view('about',);
}


public function postingan()
    {
       
        return view('pages.user.postingan.index');
    }

    public function show($id)
    {
        // Ambil produk berdasarkan ID
        $postingan = Postingan::findOrFail($id);
        // Ambil postingan lain dengan kategori yang sama, kecuali yang ID-nya sama
        $postingansama = Postingan::where('category', $postingan->category)
                                    ->where('id', '!=', $id)  // Menghindari produk yang sama
                                    ->get();
        // Kirim data produk ke view
        return view('pages.user.postingan.detail', compact('postingan','postingansama'));
    }
    
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


   
}