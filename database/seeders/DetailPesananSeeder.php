<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailPesanan;
use App\Models\Pesanan;
use App\Models\Produk;

class DetailPesananSeeder extends Seeder
{
    public function run(): void
    {
        $pesanans = Pesanan::all();
        $produks = Produk::all();

        foreach ($pesanans as $pesanan) {
            // Buat 1 sampai 3 detail untuk setiap pesanan
            DetailPesanan::factory()
                ->count(rand(1, 3))
                ->state(['pesanan_id' => $pesanan->id])
                ->recycle($produks)
                ->create();
        }
    }
}
