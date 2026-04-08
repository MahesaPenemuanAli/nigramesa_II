<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $item = session('checkout_item');

        if (!$item) {
            return redirect()->route('katalog')->with('error', 'Tidak ada item untuk di-checkout.');
        }

        // Pajak 11% 
        $pajak = $item['subtotal'] * 0.11;
        $totalHarga = $item['subtotal'] + $pajak;

        return view('katalog.checkout', compact('item', 'pajak', 'totalHarga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat_pengiriman' => 'required|string',
            'metode_pembayaran' => 'required|string',
        ]);

        $item = session('checkout_item');

        if (!$item) {
            return redirect()->route('katalog')->with('error', 'Waktu checkout habis. Silakan ulangi.');
        }

        $pajak = $item['subtotal'] * 0.11;
        $totalHarga = $item['subtotal'] + $pajak;

        DB::beginTransaction();

        try {
            // 1. Simpan Pesanan
            $pesanan = Pesanan::create([
                'user_id' => auth()->id(),
                'total_harga' => $totalHarga,
                'status_pesanan' => 'pending',
                'metode_pembayaran' => $request->metode_pembayaran,
                'alamat_pengiriman' => $request->alamat_pengiriman,
            ]);

            // 2. Simpan Detail Pesanan
            DetailPesanan::create([
                'pesanan_id' => $pesanan->id,
                'produk_id' => $item['produk_id'],
                'jumlah' => $item['quantity'],
                'subtotal' => $item['subtotal'],
            ]);

            // 3. Kurangi Stok Produk
            $produk = Produk::find($item['produk_id']);
            if ($produk && $produk->stok >= $item['quantity']) {
                $produk->decrement('stok', $item['quantity']);
            } else {
                throw new \Exception('Stok produk tidak mencukupi.');
            }

            DB::commit();

            // Clear session checkout
            session()->forget('checkout_item');

            return redirect()->route('checkout.success', $pesanan->id);
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }

    public function success($id)
    {
        // Pastikan pesanan adalah milik user yang sedang login
        $pesanan = Pesanan::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        
        return view('katalog.success', compact('pesanan'));
    }
}
