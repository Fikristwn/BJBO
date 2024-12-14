<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Postingan;

class AdminController extends Controller
{
    //{
    public function dashboard()
    {
        $users = User::count();
        $postings = Postingan::count();
        return view('pages.admin.index',compact('users','postings'));
    
}
}
