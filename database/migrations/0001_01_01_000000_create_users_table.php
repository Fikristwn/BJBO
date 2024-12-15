<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama pengguna
            $table->string('email')->unique(); // Email unik
            $table->timestamp('email_verified_at')->nullable(); // Waktu verifikasi email
            $table->string('password'); // Kata sandi
            $table->string('google_id')->nullable(); // ID Google untuk login via Google
            $table->string('profile_picture')->nullable(); // Foto profil pengguna
            $table->boolean('is_blocked')->default(false); // Status blokir (default: false)
            $table->rememberToken(); // Token untuk "Remember Me"
            $table->timestamps(); // Kolom created_at dan updated_at
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Email untuk reset password
            $table->string('token'); // Token reset password
            $table->timestamp('created_at')->nullable(); // Waktu pembuatan token
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // ID sesi
            $table->foreignId('user_id')->nullable()->index(); // ID pengguna (opsional)
            $table->string('ip_address', 45)->nullable(); // Alamat IP pengguna
            $table->text('user_agent')->nullable(); // Informasi browser
            $table->longText('payload'); // Data sesi
            $table->integer('last_activity')->index(); // Waktu aktivitas terakhir
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
