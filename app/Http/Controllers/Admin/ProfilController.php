<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
    use App\Models\Postingan;
    use App\Models\User;
    use Illuminate\Support\Facades\Validator;
    use RealRashid\SweetAlert\Facades\Alert;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\File;


class ProfilController extends Controller
{
    public function index()
        {
            $postingan = Postingan::where('user_id', Auth::id())->get();
            return view('pages.user.profil.index', compact('postingan'));
        }
    public function update(Request $request, $id)
{
    $user = Auth::user(); // Mendapatkan pengguna yang sedang login
    $userId = $user->id; // Mendapatkan ID pengguna
    $username = $user->name; // Mendapatkan username pengguna

    // Validasi input
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'price' => 'numeric',
        'category' => 'required',
        'description' => 'required',
        'image' => 'nullable|image|mimes:png,jpeg,jpg|max:2048', // Gambar opsional
        'lokasi' => 'required',
    ]);

    // Jika validasi gagal
    if ($validator->fails()) {
        Alert::error('Gagal!', 'Pastikan semua input terisi dengan benar!');
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Mencari produk yang akan diupdate
    $post = Postingan::findOrFail($id);

    // Penanganan file gambar baru (jika ada)
    try {
        $imageName = $post->image; // Gunakan gambar lama jika tidak ada gambar baru
        if ($request->hasFile('image')) {
            // Menghapus gambar lama jika ada file baru
            if ($imageName && file_exists(public_path('images/' . $imageName))) {
                unlink(public_path('images/' . $imageName));
            }

            // Mengambil gambar baru
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        // Update data produk di database
        $post->update([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imageName,
            'lokasi' => $request->lokasi,
            'user_id' => $userId,  // Menyimpan ID pengguna
            'username' => $username, // Menyimpan username pengguna
        ]);

        Alert::success('Berhasil!', 'Produk berhasil diperbarui!');
        return redirect()->route('user.postingan.index');
    } catch (\Exception $e) {
        Alert::error('Gagal!', 'Terjadi kesalahan saat memperbarui data!');
        return redirect()->back()->withInput()->with('error', $e->getMessage());
    }
    
}

public function edit($id)
    {
        $postingan = Postingan::findOrFail($id);
        return view('pages.user.profil.edit', compact('postingan'));
    }


    public function delete($id)
    {
        $postingan = Postingan::findOrFail($id);

        $oldPath = public_path('images/' . $postingan->image);
        if (File::exists($oldPath)) {
            File::delete($oldPath);
        }

        $postingan->delete();

        if ($postingan) {
            Alert::success('Berhasil!', 'Produk berhasil dihapus!');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Produk gagal dihapus!');
            return redirect()->back();
        }
    }

}
