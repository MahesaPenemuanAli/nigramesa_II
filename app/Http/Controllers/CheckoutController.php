<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Keranjang;
use App\Notifications\PesananBerhasil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $query = Keranjang::where('user_id', auth()->id())->with('produk');
        
        if ($request->has('selected_items') && is_array($request->selected_items)) {
            $query->whereIn('id', $request->selected_items);
        }

        $keranjangs = $query->get();

        if ($keranjangs->isEmpty()) {
            return redirect()->route('keranjang.index')->with('error', 'Tidak ada item untuk di-checkout.');
        }

        $subtotal = 0;
        foreach ($keranjangs as $item) {
            $subtotal += $item->produk->harga * $item->jumlah;
        }
        $pajak = $subtotal * 0.11;
        $totalHarga = $subtotal + $pajak;

        return view('katalog.checkout', compact('keranjangs', 'subtotal', 'pajak', 'totalHarga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat_pengiriman' => 'required|string',
            'metode_pembayaran' => 'required|string',
            'selected_items' => 'nullable|array'
        ]);

        $query = Keranjang::where('user_id', auth()->id())->with('produk');
        if ($request->has('selected_items') && is_array($request->selected_items)) {
            $query->whereIn('id', $request->selected_items);
        }
        $keranjangs = $query->get();

        if ($keranjangs->isEmpty()) {
            return redirect()->route('katalog')->with('error', 'Pesanan gagal diproses, item tidak ditemukan.');
        }

        $subtotal = 0;
        foreach ($keranjangs as $item) {
            $subtotal += $item->produk->harga * $item->jumlah;
        }
        $pajak = $subtotal * 0.11;
        $totalHarga = $subtotal + $pajak;

        DB::beginTransaction();

        try {
            // 1. Simpan Pesanan Header
            $pesanan = Pesanan::create([
                'user_id' => auth()->id(),
                'total_harga' => $totalHarga,
                'status_pesanan' => 'pending',
                'metode_pembayaran' => $request->metode_pembayaran,
                'alamat_pengiriman' => $request->alamat_pengiriman,
            ]);

            // 2. Simpan Detail Pesanan & Kurangi Stok
            foreach ($keranjangs as $item) {
                $produk = $item->produk;
                
                if ($produk->stok < $item->jumlah) {
                    throw new \Exception("Stok {$produk->nama_produk} tidak mencukupi hari ini. Sisa: {$produk->stok}");
                }

                DetailPesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'produk_id' => $item->produk_id,
                    'jumlah' => $item->jumlah,
                    'subtotal' => $produk->harga * $item->jumlah,
                ]);

                $produk->decrement('stok', $item->jumlah);
            }

            // 3. Clear isi keranjang user ini (hanya yang dicheckout)
            $keranjangIds = $keranjangs->pluck('id')->toArray();
            Keranjang::whereIn('id', $keranjangIds)->delete();

            DB::commit();

            // 4. Kirim Notifikasi
            auth()->user()->notify(new PesananBerhasil($pesanan->id, $totalHarga));

            return redirect()->route('checkout.success', $pesanan->id);
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('keranjang.index')->with('error', 'Gagal: ' . $e->getMessage());
        }
    }

    public function success($id)
    {
        $pesanan = Pesanan::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('katalog.success', compact('pesanan'));
    }
}
