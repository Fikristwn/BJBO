<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_laporan',
        'teks_laporan',
        'user_id',
        'status',
        'postingan_id',
    ];

    // Menambahkan relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function postingan()
{
    return $this->belongsTo(Postingan::class);
}

}
