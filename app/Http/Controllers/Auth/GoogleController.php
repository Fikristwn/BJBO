<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    // Redirect ke Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback setelah autentikasi
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
    
        // Mencari user berdasarkan google_id
        $user = User::where('google_id', $googleUser->getId())->first();
    
        if (!$user) {
            // Jika user belum terdaftar, buat akun baru
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt(str::random(16)),  // Password acak
            ]);
        }
    
        // Login user
        Auth::login($user);
    
        // Redirect ke halaman dashboard atau halaman utama
        return redirect()->route('user.dashboard');
    }
}

