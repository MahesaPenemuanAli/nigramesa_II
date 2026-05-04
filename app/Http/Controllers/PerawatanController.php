<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use Illuminate\Http\Request;

class PerawatanController extends Controller
{
    public function index(Request $request)
    {
        $query = Tanaman::query();

        // Fitur Pencarian berdasarkan nama
        if ($request->filled('search')) {
            $query->where('nama_tanaman', 'like', '%' . $request->search . '%');
        }

        // Filter Kategori
        if ($request->filled('kategori') && $request->kategori !== 'Semua') {
            $query->where('kategori', $request->kategori);
        }

        // Ambil semua tipe kategori unik untuk filter pill buttons
        $kategoris = Tanaman::select('kategori')->whereNotNull('kategori')->distinct()->pluck('kategori');

        // Pagination 9 item per halaman
        $tanamans = $query->latest()->paginate(9)->withQueryString();

        return view('perawatan.index', compact('tanamans', 'kategoris'));
    }

    public function show(Tanaman $tanaman)
    {
        return view('perawatan.show', compact('tanaman'));
    }
}
