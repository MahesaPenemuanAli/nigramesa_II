<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tanaman;
use Illuminate\Database\Eloquent\Factories\Sequence;

class TanamanSeeder extends Seeder
{
    public function run(): void
    {
        Tanaman::factory()
            ->count(10)
            ->state(new Sequence(
                ['nama_tanaman' => 'Janda Bolong', 'kategori' => 'Tanaman Hias'],
                ['nama_tanaman' => 'Lidah Mertua', 'kategori' => 'Tanaman Hias'],
                ['nama_tanaman' => 'Cabai Rawit', 'kategori' => 'Pertanian'],
                ['nama_tanaman' => 'Monstera Deliciosa', 'kategori' => 'Tanaman Hias'],
                ['nama_tanaman' => 'Padi', 'kategori' => 'Pertanian'],
                ['nama_tanaman' => 'Jagung Manis', 'kategori' => 'Pertanian'],
                ['nama_tanaman' => 'Anggrek Bulan', 'kategori' => 'Tanaman Hias'],
                ['nama_tanaman' => 'Tomat Ceri', 'kategori' => 'Pertanian'],
                ['nama_tanaman' => 'Lidah Buaya', 'kategori' => 'Tanaman Hias'],
                ['nama_tanaman' => 'Bawang Merah', 'kategori' => 'Pertanian'],
            ))
            ->create();
    }
}
