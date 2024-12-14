<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlasansTable extends Migration
{
    public function up()
    {
        Schema::create('ulasans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postingan_id'); // Kolom untuk menyimpan ID postingan
            $table->unsignedBigInteger('user_id'); // Kolom untuk menyimpan ID user yang memberikan ulasan
            $table->integer('rating'); // Nilai rating
            $table->text('komentar'); // Komentar ulasan
            $table->timestamps(); // Waktu dibuat dan diubah

            // Menambahkan foreign key untuk postingan_id
            $table->foreign('postingan_id')->references('id')->on('postingans')->onDelete('cascade');
            // Menambahkan foreign key untuk user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ulasans');
    }
}


