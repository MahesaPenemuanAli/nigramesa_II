<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class RiwayatController extends Controller
{
    public function index()
    {
        $pesanans = auth()->user()->pesanans()->with(['detailPesanans.produk'])->latest()->get();

        return view('profil.riwayat', compact('pesanans'));
    }
}
