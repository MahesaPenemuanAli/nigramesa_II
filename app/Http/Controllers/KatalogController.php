<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::query();

        // 1. Filter Pencarian berdasarkan Nama Produk
        if ($request->filled('search')) {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        // 2. Filter Kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Dapatkan semua produk unik untuk kategori filter sidebar
        $kategoris = Produk::select('kategori')->distinct()->pluck('kategori');

        // Pagination 12 per halaman
        $produks = $query->latest()->paginate(12)->withQueryString();

        return view('katalog.index', compact('produks', 'kategoris'));
    }

    public function show(Produk $produk)
    {
        // Eager load relasi ulasans dan relasi ulasans->user
        $produk->load(['ulasans' => function($q) {
            $q->latest();
        }, 'ulasans.user']);

        return view('katalog.show', compact('produk'));
    }

    public function checkout(Request $request, Produk $produk)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $produk->stok
        ]);

        // Simpan data produk ke session untuk diproses di halaman checkout
        session()->put('checkout_item', [
            'produk_id' => $produk->id,
            'nama_produk' => $produk->nama_produk,
            'gambar' => $produk->gambar,
            'harga' => $produk->harga,
            'quantity' => $request->quantity,
            'subtotal' => $produk->harga * $request->quantity
        ]);

        return redirect()->route('checkout.index');
    }
}
