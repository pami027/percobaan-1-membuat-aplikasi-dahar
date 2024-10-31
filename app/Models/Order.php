<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'topping_id',
        'oil_id',
        'spiciness_level_id',
        'portion_id',
        'total_price',
        'qr_code_path',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function topping()
    {
        return $this->belongsTo(Topping::class);
    }

    public function oil()
    {
        return $this->belongsTo(Oil::class);
    }

    public function spicinessLevel()
    {
        return $this->belongsTo(SpicinessLevel::class);
    }

    public function portion()
    {
        return $this->belongsTo(Portion::class);
    }
}
