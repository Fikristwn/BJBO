<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Postingan;
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
    $postingans = Postingan::all();
    $username = Auth::user()->name;
    return view('pages.user.index',compact('postingans','username'));
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
    
}