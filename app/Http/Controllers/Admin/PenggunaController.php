<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
}
