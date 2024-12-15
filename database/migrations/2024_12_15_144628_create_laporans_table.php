<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_laporan'); // Jenis laporan (misalnya: pengguna, transaksi, dll)// Kategori laporan (misalnya: kategori pengguna, transaksi, dll)
            $table->text('teks_laporan'); // Teks deskripsi laporan
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Menghubungkan ke pengguna yang membuat laporan
            $table->string('status'); // Status laporan (misalnya aktif, diblokir, dll)
            $table->unsignedBigInteger('postingan_id')->nullable(); // Menambahkan kolom postingan_id
            $table->foreign('postingan_id')->references('id')->on('postingans')->onDelete('cascade'); // Menambahkan relasi deng
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}
