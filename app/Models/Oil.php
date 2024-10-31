<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oil extends Model
{
    use HasFactory;

    protected $table = 'oils';

    protected $fillable = [
        'name', // Nama jenis minyak
        'price', // Harga tambahan untuk minyak
    ];

    // Relasi dengan tabel Orders
    public function orders()
    {
        // Satu jenis minyak dapat digunakan dalam banyak pesanan
        return $this->hasMany(Order::class);
    }
}
