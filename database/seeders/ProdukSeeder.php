<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Sequence;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        Produk::factory()
            ->count(15)
            ->state(new Sequence(
                ['nama_produk' => 'Pupuk Organik Cair', 'kategori' => 'Pupuk', 'harga' => 35000],
                ['nama_produk' => 'Benih Tomat Super', 'kategori' => 'Benih', 'harga' => 15000],
                ['nama_produk' => 'Pot Keramik Minimalis', 'kategori' => 'Pot', 'harga' => 65000],
                ['nama_produk' => 'Sekop Kecil Taman', 'kategori' => 'Alat', 'harga' => 25000],
                ['nama_produk' => 'Semprotan Air 1 Liter', 'kategori' => 'Alat', 'harga' => 22000],
                ['nama_produk' => 'Pupuk NPK Mutiara', 'kategori' => 'Pupuk', 'harga' => 45000],
                ['nama_produk' => 'Benih Cabai Rawit Merah', 'kategori' => 'Benih', 'harga' => 12000],
                ['nama_produk' => 'Pot Plastik Hitam 20cm', 'kategori' => 'Pot', 'harga' => 10000],
                ['nama_produk' => 'Obat Anti Hama Natural', 'kategori' => 'Lainnya', 'harga' => 55000],
                ['nama_produk' => 'Sarung Tangan Berkebun', 'kategori' => 'Alat', 'harga' => 18000],
                ['nama_produk' => 'Media Tanam Tanah Subur', 'kategori' => 'Pupuk', 'harga' => 20000],
                ['nama_produk' => 'Benih Selada Hidroponik', 'kategori' => 'Benih', 'harga' => 17000],
                ['nama_produk' => 'Pot Gantung Sabut Kelapa', 'kategori' => 'Pot', 'harga' => 30000],
                ['nama_produk' => 'Gunting Dahan Pruning', 'kategori' => 'Alat', 'harga' => 85000],
                ['nama_produk' => 'Vitamin B1 Tanaman', 'kategori' => 'Pupuk', 'harga' => 25000],
            ))
            ->create();
    }
}
