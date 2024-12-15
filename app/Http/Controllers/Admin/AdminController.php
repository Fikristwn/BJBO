<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Postingan;
use App\Models\Ulasan;
use App\Models\Laporan;

class AdminController extends Controller
{
    //{
    public function dashboard()
    {
        $users = User::count();
        $postings = Postingan::count();
        $ulasans = Ulasan::count();
        $laporans = Laporan::count();
        return view('pages.admin.index',compact('users','postings','ulasans','laporans'));
    
}


}
