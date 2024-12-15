<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostinganController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\PostingController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Admin\UlasanController;
use App\Http\Controllers\Admin\LaporanController;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'splash'])->name('splash');
    Route::get('/layout', function () { return view('layout');})->name('layout');
    Route::get('/about', [AuthController::class, 'about'])->name('about')   ;

    Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');
    
   
    Route::post('/post-register', [AuthController::class, 'post_register'])->name('post.register');
    Route::post('/post-login', [AuthController::class, 'login'])->name('post.login');
});





Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

// Admin Route
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin-logout', [AuthController::class, 'admin_logout'])->name('admin.logout');
    Route::get('/admin/pengguna', [PenggunaController::class, 'index'])->name('admin.users');
    Route::get('/admin/posting', [PostingController::class, 'index'])->name('admin.postings');
    Route::get('admin/ulasan', [UlasanController::class, 'index'])->name('admin.ulasans');
    Route::get('admin/laporan', [LaporanController::class, 'index'])->name('admin.laporans');

    //pengguna

    Route::get('/admin/pengguna/block/{id}', [PenggunaController::class, 'blockUser'])->name('pengguna.block');
    Route::get('/admin/pengguna/unblock/{id}', [PenggunaController::class, 'unblockUser'])->name('pengguna.unblock');
    Route::delete('/admin/pengguna/delete/{id}', [PenggunaController::class, 'delete'])->name('pengguna.delete');


    Route::post('/admin/posting/update-status/{id}', [PostingController::class, 'updateStatus'])->name('posting.updateStatus');
  });

// User Route
Route::group(['middleware' => 'auth'], function () {

    // Dashboard User
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');

    // Logout User
    Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('user.logout');
    Route::get('/about', [UserController::class, 'about'])->name('about');


    // Routes
    Route::prefix('user')->group(function () {
    //postingan
      Route::get('/postingan/create', [PostinganController::class, 'create'])->name('user.postingan.create');
      Route::post('/postingan', [PostinganController::class, 'store'])->name('user.postingan.store');
      Route::get('/postingan/detail/{id}', [UserController::class, 'show'])->name('user.detail.postingan');
      Route::get('/postingan/cari', [PostinganController::class, 'cari'])->name('postingan.cari');
      Route::get('/postingan/kategori/{kategori}', [PostinganController::class, 'filterByCategory'])->name('postingan.kategori');
      Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');
      Route::get('/laporan', [UserController::class, 'showForm'])->name('laporan.form');
      Route::post('/laporan', [LaporanController::class, 'submit'])->name('laporan.submit');
    //profil
      Route::get('/profil', [ProfilController::class, 'index'])->name('user.profil');
      Route::get('/profil/edit/{id}', [ProfilController::class, 'edit'])->name('user.profil.edit');
      Route::post('/profil/update/{id}', [ProfilController::class, 'update'])->name('profil.update');
      Route::delete('/profil/delete/{id}', [ProfilController::class, 'delete'])->name('user.profil.delete');
      
    
    });
});
