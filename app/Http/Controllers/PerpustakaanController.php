<?php

namespace App\Http\Controllers;

use App\Models\Literatur;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    public function index(Request $request)
    {
        $query = Literatur::query();

        // Fitur Pencarian berdasarkan judul atau penulis
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('penulis', 'like', '%' . $request->search . '%');
            });
        }

        // Filter Tipe (Jurnal, Artikel, E-Book)
        if ($request->filled('tipe') && $request->tipe !== 'Semua') {
            $query->where('tipe', $request->tipe);
        }

        // Ambil semua tipe literatur unik untuk tab navigasi
        $tipes = Literatur::select('tipe')->whereNotNull('tipe')->distinct()->pluck('tipe');

        // Pagination 12 item per halaman
        $literaturs = $query->latest()->paginate(12)->withQueryString();

        return view('perpustakaan.index', compact('literaturs', 'tipes'));
    }

    public function show(Literatur $literatur)
    {
        return view('perpustakaan.show', compact('literatur'));
    }
}
