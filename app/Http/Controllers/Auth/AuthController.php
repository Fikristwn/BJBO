<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:6|max:20',
        ]);
    
        if ($validator->fails()) {
            Alert::error('Error', 'Pastikan semua email dan password terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Login Admin
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            toast('Selamat datang, admin!', 'success');
            return redirect()->route('admin.dashboard');
        }
        
        // Login User
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            
            // Cek jika akun diblokir
            if ($user->is_blocked) {
                Auth::logout();
                Alert::error('Akun Diblokir', 'Akun Anda telah diblokir!');
                return redirect()->route('login')->withInput();
            }
    
            toast('Selamat datang!', 'success');
            return redirect()->route('user.dashboard');
        }
    
        // Jika otentikasi gagal
        Alert::error('Login Gagal!', 'Email atau password tidak valid!');
        return redirect()->back()->withInput();
    }
    

    public function admin_logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            toast('Berhasil logout!', 'success');
        }
        return redirect('/');
    }

    public function user_logout()
    {
        if (Auth::check()) {
            Auth::logout();
            toast('Berhasil logout!', 'success');
        }
        return redirect('/');
    }

    public function register(Request $request)
    {
        // Validasi
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Simpan user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Registrasi berhasil',
        ]);
    }

    

   
    public function splash()
    {
        return view('splash');
    }
    public function layout()
    {
        
        return view('layout');
    }

    public function post_register(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:6|max:20',
            
        ]);
    
        // Jika validasi gagal, tampilkan pesan error dan redirect kembali
        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }
    
        // Simpan data pengguna ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            
        ]);
    
        // Jika berhasil disimpan, tampilkan pesan sukses dan redirect
        if ($user) {
            Alert::success('Berhasil!', 'Akun baru berhasil dibuat, silahkan melakukan login!');
            return redirect('/');
        } else {
            Alert::error('Gagal!', 'Akun gagal dibuat, silahkan coba lagi!');
            return redirect()->back();
        }
    }

    public function about()
    {
        
        return view('about',);
    }

  
    }


