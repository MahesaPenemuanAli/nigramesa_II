<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function perawatan() { return view('perawatan'); }
    public function katalog() { return view('katalog'); }
    public function perpustakaan() { return view('perpustakaan'); }
    public function tentang() { return view('tentang'); }
}