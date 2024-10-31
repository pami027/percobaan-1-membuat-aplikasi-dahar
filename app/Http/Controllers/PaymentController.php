<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function success($id)
    {
        // Ambil order berdasarkan ID
        $order = Order::findOrFail($id);

        // Update status menjadi 'completed' atau yang sesuai
        $order->status = 'completed';
        $order->save();

        // Kembalikan response JSON
        return response()->json(['message' => 'Pembayaran berhasil!']);
    }
}
