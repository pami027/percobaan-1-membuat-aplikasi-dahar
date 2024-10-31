<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpicinessLevel extends Model
{
    use HasFactory;

    protected $table = 'spiciness_levels';

    protected $fillable = [
        'level', // Nama tingkat kepedasan
        'price', // Harga tambahan untuk tingkat kepedasan
    ];

    // Relasi dengan tabel Orders
    public function orders()
    {
        // Satu tingkat kepedasan dapat digunakan dalam banyak pesanan
        return $this->hasMany(Order::class);
    }
}
