<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Literatur;
use Illuminate\Database\Eloquent\Factories\Sequence;

class LiteraturSeeder extends Seeder
{
    public function run(): void
    {
        Literatur::factory()
            ->count(10)
            ->state(new Sequence(
                ['judul' => 'Panduan Lengkap Hidroponik Pemula', 'tipe' => 'E-Book'],
                ['judul' => 'Jurnal Pertanian Tropis Volume 12', 'tipe' => 'Jurnal'],
                ['judul' => 'Cara Mengatasi Hama pada Tanaman Cabai', 'tipe' => 'Artikel'],
                ['judul' => 'Sukses Budidaya Anggrek Bulan', 'tipe' => 'E-Book'],
                ['judul' => 'Pengaruh Cahaya Matahari Terhadap Pertumbuhan', 'tipe' => 'Jurnal'],
                ['judul' => 'Manfaat Pupuk Kompos untuk Kesuburan Tanah', 'tipe' => 'Artikel'],
                ['judul' => 'Mengenal Berbagai Media Tanam Kekinian', 'tipe' => 'Artikel'],
                ['judul' => 'Jurnal Teknologi Pertanian Presisi', 'tipe' => 'Jurnal'],
                ['judul' => 'Bonsai untuk Pemula', 'tipe' => 'E-Book'],
                ['judul' => 'Sistem Irigasi Tetes untuk Lahan Sempit', 'tipe' => 'Artikel'],
            ))
            ->create();
    }
}
