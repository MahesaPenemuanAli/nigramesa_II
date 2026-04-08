<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Literatur;

class LiteraturFactory extends Factory
{
    protected $model = Literatur::class;

    public function definition(): array
    {
        return [
            'judul' => fake('id_ID')->sentence(4),
            'penulis' => fake('id_ID')->name(),
            'tipe' => fake()->randomElement(['Jurnal', 'Artikel', 'E-Book']),
            'cover_gambar' => 'https://picsum.photos/seed/' . fake()->uuid() . '/300/400',
            'file_url' => fake()->url(),
            'tanggal_terbit' => fake()->date(),
        ];
    }
}
