<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // Mengatur nama tabel jika berbeda dari default
    protected $table = 'menus';

    // Mengizinkan kolom yang dapat diisi massal
    protected $fillable = [
        'name', // Nama menu
    ];

    // Relasi dengan tabel Orders
    public function orders()
    {
        // Satu menu dapat memiliki banyak pesanan
        return $this->hasMany(Order::class);
    }
}
