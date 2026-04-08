<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tanaman;

class TanamanFactory extends Factory
{
    protected $model = Tanaman::class;

    public function definition(): array
    {
        $kategori = ['Tanaman Hias', 'Pertanian'];
        return [
            'nama_tanaman' => fake('id_ID')->words(2, true),
            'kategori' => fake()->randomElement($kategori),
            'gambar' => 'https://picsum.photos/seed/' . fake()->uuid() . '/400/300',
            'deskripsi_singkat' => fake('id_ID')->sentence(10),
            'cara_perawatan' => fake('id_ID')->paragraphs(3, true),
            'kebutuhan_air' => fake()->randomElement(['Sedikit', 'Sedang', 'Banyak']),
            'kebutuhan_cahaya' => fake()->randomElement(['Teduh', 'Cahaya Tidak Langsung', 'Matahari Penuh']),
        ];
    }
}
