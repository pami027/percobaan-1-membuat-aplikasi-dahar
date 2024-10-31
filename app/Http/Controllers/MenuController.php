<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Oil;
use App\Models\Order;
use App\Models\Portion;
use App\Models\SpicinessLevel;
use App\Models\Topping;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Menampilkan pilihan menu, seperti Nasi Goreng dan Mie Goreng
        $menus = Menu::all(); // Ambil semua menu dari database

        return view('menus.index', compact('menus'));
    }

    public function show($id)
    {
        // Ambil menu berdasarkan ID
        $menu = Menu::findOrFail($id);

        // Ambil semua opsi untuk topping, minyak, tingkat kepedasan, dan porsi
        $toppings = Topping::all();
        $oils = Oil::all();
        $spicinessLevels = SpicinessLevel::all();
        $portions = Portion::all();

        // Tampilkan halaman show dengan data yang diperlukan
        return view('menus.show', compact('menu', 'toppings', 'oils', 'spicinessLevels', 'portions'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'topping_id' => 'required|exists:toppings,id',
            'oil_id' => 'required|exists:oils,id',
            'spiciness_level_id' => 'required|exists:spiciness_levels,id',
            'portion_id' => 'required|exists:portions,id',
        ]);

        // Menghitung total harga
        $topping = Topping::findOrFail($validated['topping_id']);
        $oil = Oil::findOrFail($validated['oil_id']);
        $spiciness_level = SpicinessLevel::findOrFail($validated['spiciness_level_id']);
        $portion = Portion::findOrFail($validated['portion_id']);

        // Total harga dihitung dari semua komponen
        $total_price = $topping->price + $oil->price + $spiciness_level->price + $portion->price;

        // Buat pesanan baru
        $order = Order::create(array_merge($validated, ['total_price' => $total_price, 'status' => 'pending']));

        // Membuat URL untuk QR Code
        $qrCodeUrl = route('payment.success', ['id' => $order->id]);

        // Simpan URL QR Code di session
        session(['order' => $order, 'qr_code' => $qrCodeUrl]);

        // Redirect kembali ke halaman show dengan pesan konfirmasi
        return redirect()->route('menus.show', ['id' => $request->menu_id])
                         ->with('payment_success', 'Pesanan berhasil! Silakan scan QR Code untuk pembayaran.');
    }

    public function paymentSuccess($order_id)
    {
        // Mengubah status order menjadi 'paid'
        $order = Order::findOrFail($order_id);
        $order->status = 'paid';
        $order->save();

        // Menampilkan notifikasi bahwa pembayaran berhasil
        return response()->json(['message' => 'Pembayaran berhasil!']);
    }
}
