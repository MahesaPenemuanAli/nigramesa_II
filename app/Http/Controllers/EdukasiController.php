<?php

namespace App\Http\Controllers;

use App\Models\VideoPembelajaran;

class EdukasiController extends Controller
{
    public function index()
    {
        $semuaVideo = VideoPembelajaran::latest()->get();
        $videoSorotan = $semuaVideo->first();
        $videoTerbaru = $semuaVideo->take(8);
        $videoPopuler = $semuaVideo->where("is_premium", true)->take(8);
        $videoPerKategori = $semuaVideo->groupBy("kategori");

        return view(
            "edukasi.index",
            compact(
                "semuaVideo",
                "videoSorotan",
                "videoTerbaru",
                "videoPopuler",
                "videoPerKategori",
            ),
        );
    }

    public function show(VideoPembelajaran $video)
    {
        $video->link_youtube = VideoPembelajaran::transformYoutubeUrlToEmbed(
            $video->link_youtube,
        );

        $videoRekomendasi = VideoPembelajaran::query()
            ->where("id", "!=", $video->id)
            ->inRandomOrder()
            ->take(4)
            ->get()
            ->map(function (VideoPembelajaran $item) {
                $item->link_youtube = VideoPembelajaran::transformYoutubeUrlToEmbed(
                    $item->link_youtube,
                );

                return $item;
            });

        return view("edukasi.show", compact("video", "videoRekomendasi"));
    }
}
