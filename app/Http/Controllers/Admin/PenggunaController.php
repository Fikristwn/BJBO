<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenggunaController extends Controller
{
    public function index()
    {
        $users = User::all();
        confirmDelete('Hapus Data!', 'Yakin hapus?');
        return view('pages.admin.pengguna.index', compact('users'));
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil dihapus');
    }

    public function blockUser($id)
{
    $user = User::findOrFail($id);
    $user->is_blocked = true;
    $user->save();

    return redirect()->route('admin.pengguna')->with('success', 'Pengguna telah diblokir!');
}

public function unblockUser($id)
{
    $user = User::findOrFail($id);
    $user->is_blocked = false;
    $user->save();

    return redirect()->route('admin.pengguna')->with('success', 'Blokir pengguna berhasil dibatalkan!');
}

}
