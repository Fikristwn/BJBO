<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Postingan extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'name',
        'price',
        'category',
        'description',
        'image',
        'lokasi',
        'user_id',
        'username',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }
}

