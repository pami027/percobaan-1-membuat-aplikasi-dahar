<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portion extends Model
{
    use HasFactory;

    protected $table = 'portions';

    protected $fillable = [
        'size', // Ukuran porsi
        'price', // Harga untuk ukuran porsi
    ];

    // Relasi dengan tabel Orders
    public function orders()
    {
        // Satu ukuran porsi dapat digunakan dalam banyak pesanan
        return $this->hasMany(Order::class);
    }
}
