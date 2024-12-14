<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $fillable = ['postingan_id', 'user_id', 'rating', 'komentar'];

    public function postingan()
    {
        return $this->belongsTo(Postingan::class );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


