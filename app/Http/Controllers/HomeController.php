<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Tanaman;
use App\Models\Literatur;
use App\Models\VideoPembelajaran;

class HomeController extends Controller
{
    public function index()
    {
        $produks = Produk::latest()->take(4)->get();
        $tanamans = Tanaman::latest()->take(3)->get();
        $literaturs = Literatur::latest()->take(3)->get();
        $videoSorotanDashboard = VideoPembelajaran::latest()->first();

        return view(
            "dashboard",
            compact(
                "produks",
                "tanamans",
                "literaturs",
                "videoSorotanDashboard",
            ),
        );
    }
}
