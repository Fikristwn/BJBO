<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ulasan;

use App\Models\Postingan;
use Illuminate\Support\Facades\Auth;



class UlasanController extends Controller
{
    public function store(Request $request)
    {

        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        $userId = $user->id; // Me
        // Validasi input
        $validated = $request->validate([
            'postingan_id' => 'required|exists:postingans,id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:255',
        ]);

        // Simpan ulasan
        Ulasan::create([
            'postingan_id' => $validated['postingan_id'],
            'user_id' => $userId, // ID pengguna yang sedang login
            'rating' => $validated['rating'],
            'komentar' => $validated['komentar'],
        ]);

        return back()->with('success', 'Ulasan berhasil ditambahkan!');
    }

    // PostingController.php (Controller)
public function show($id)
{
    $postingan = Postingan::with('ulasan')->findOrFail($id);  // Mengambil produk dan ulasannya
    return view('postingan.show', compact('postingan'));
}



    public function index()
    {
        // Mengambil semua data ulasan dengan relasi postingan dan user
        $ulasans = Ulasan::with(['postingan', 'user'])->get();
        
        // Mengirim data ke view
        return view('pages.admin.ulasan.index', compact('ulasans'));
    }
}



