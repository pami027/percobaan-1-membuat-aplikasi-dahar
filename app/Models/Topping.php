<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    use HasFactory;

    protected $table = 'toppings';

    protected $fillable = [
        'name', // Nama topping
        'price', // Harga tambahan untuk topping
    ];

    // Relasi dengan tabel Orders
    public function orders()
    {
        // Satu topping dapat digunakan dalam banyak pesanan
        return $this->hasMany(Order::class);
    }
}
