<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjangs = Keranjang::where('user_id', auth()->id())->with('produk')->get();
        
        $subtotal = 0;
        foreach ($keranjangs as $item) {
            $subtotal += $item->produk->harga * $item->jumlah;
        }

        $pajak = $subtotal * 0.11;
        $totalHarga = $subtotal + $pajak;

        return view('katalog.keranjang', compact('keranjangs', 'subtotal', 'pajak', 'totalHarga'));
    }

    public function tambah(Request $request, Produk $produk)
    {
        $quantity = $request->input('quantity', 1);

        if ($produk->stok < $quantity) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi.');
        }

        $keranjang = Keranjang::where('user_id', auth()->id())
                              ->where('produk_id', $produk->id)
                              ->first();

        if ($keranjang) {
            $keranjang->jumlah += $quantity;
            $keranjang->save();
        } else {
            $keranjang = Keranjang::create([
                'user_id' => auth()->id(),
                'produk_id' => $produk->id,
                'jumlah' => $quantity
            ]);
        }

        if ($request->input('action') === 'buy_now') {
            return redirect()->route('checkout.index', ['selected_items' => [$keranjang->id]]);
        }

        return redirect()->route('keranjang.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request, Keranjang $keranjang)
    {
        if ($keranjang->user_id !== auth()->id()) abort(403);

        $request->validate(['jumlah' => 'required|integer|min:1']);
        
        $produk = $keranjang->produk;
        if ($produk->stok < $request->jumlah) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Stok maksimal yang tersedia adalah '.$produk->stok], 400);
            }
            return redirect()->back()->with('error', 'Stok maksimal yang tersedia adalah ' . $produk->stok);
        }

        $keranjang->update(['jumlah' => $request->jumlah]);

        if ($request->ajax() || $request->wantsJson()) {
            $keranjangs = Keranjang::where('user_id', auth()->id())->with('produk')->get();
            $subtotal = 0;
            foreach ($keranjangs as $item) {
                $subtotal += $item->produk->harga * $item->jumlah;
            }
            $pajak = $subtotal * 0.11;
            $totalHarga = $subtotal + $pajak;
            $totalQty = $keranjangs->sum('jumlah');

            return response()->json([
                'success' => true,
                'subtotal_formatted' => 'Rp ' . number_format($subtotal, 0, ',', '.'),
                'pajak_formatted' => 'Rp ' . number_format($pajak, 0, ',', '.'),
                'total_formatted' => 'Rp ' . number_format($totalHarga, 0, ',', '.'),
                'total_qty' => $totalQty
            ]);
        }

        return redirect()->back()->with('success', 'Jumlah produk berhasil diperbarui.');
    }

    public function hapus(Keranjang $keranjang)
    {
        if ($keranjang->user_id !== auth()->id()) abort(403);
        $keranjang->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}
