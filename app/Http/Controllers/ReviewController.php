<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Tampilkan form review untuk produk dalam pesanan
     */
    public function create($pesanan_id, $produk_id)
    {
        $pesanan = Pesanan::with('detailPesanans.produk')
            ->where('id', $pesanan_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Cek apakah pesanan sudah selesai
        if (strtolower($pesanan->status_pesanan) !== 'selesai') {
            return redirect()->back()->with('error', 'Pesanan belum selesai, belum bisa direview.');
        }

        // Cek apakah produk ada dalam pesanan ini
        $detailPesanan = $pesanan->detailPesanans->where('produk_id', $produk_id)->first();
        if (!$detailPesanan) {
            abort(404);
        }

        // Cek apakah sudah pernah review
        $existingReview = Review::where('pesanan_id', $pesanan_id)
            ->where('produk_id', $produk_id)
            ->where('user_id', Auth::id())
            ->first();

        return view('review.create', compact('pesanan', 'detailPesanan', 'existingReview'));
    }

    /**
     * Simpan review baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'pesanan_id' => 'required|exists:pesanans,id',
            'produk_id'  => 'required|exists:produks,id',
            'rating'     => 'required|integer|min:1|max:5',
            'komentar'   => 'nullable|string|max:1000',
            'foto.*'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Cek pesanan milik user dan statusnya selesai
        $pesanan = Pesanan::where('id', $request->pesanan_id)
            ->where('user_id', Auth::id())
            ->whereRaw('LOWER(status_pesanan) = ?', ['selesai'])
            ->firstOrFail();

        $hasProductInOrder = $pesanan->detailPesanans()
            ->where('produk_id', $request->produk_id)
            ->exists();

        if (! $hasProductInOrder) {
            abort(404);
        }

        // Cek duplikat review
        $exists = Review::where('pesanan_id', $request->pesanan_id)
            ->where('produk_id', $request->produk_id)
            ->where('user_id', Auth::id())
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Anda sudah memberikan review untuk produk ini.');
        }

        // Upload foto
        $fotoPaths = [];
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $path = $file->store('reviews', 'public');
                $fotoPaths[] = $path;
            }
        }

        Review::create([
            'pesanan_id' => $request->pesanan_id,
            'produk_id'  => $request->produk_id,
            'user_id'    => Auth::id(),
            'rating'     => $request->rating,
            'komentar'   => $request->komentar,
            'foto'       => !empty($fotoPaths) ? $fotoPaths : null,
        ]);

        return redirect()->route('riwayat.index')
            ->with('success', 'Terima kasih! Review Anda berhasil disimpan.');
    }

    /**
     * Tampilkan semua review untuk satu produk (publik)
     */
    public function indexProduk($produk_id)
    {
        $reviews = Review::with('user')
            ->where('produk_id', $produk_id)
            ->latest()
            ->paginate(10);

        $rataRating = Review::where('produk_id', $produk_id)->avg('rating');
        $totalReview = Review::where('produk_id', $produk_id)->count();

        return view('review.index', compact('reviews', 'rataRating', 'totalReview', 'produk_id'));
    }
}
