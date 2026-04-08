<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produk;

class ProdukFactory extends Factory
{
    protected $model = Produk::class;

    public function definition(): array
    {
        $kategori = ['Pupuk', 'Benih', 'Alat', 'Pot', 'Lainnya'];
        return [
            'nama_produk' => fake('id_ID')->words(2, true),
            'kategori' => fake()->randomElement($kategori),
            'gambar' => 'https://picsum.photos/seed/' . fake()->uuid() . '/400/300',
            'harga' => fake()->numberBetween(10000, 500000),
            'stok' => fake()->numberBetween(0, 100),
            'deskripsi' => fake('id_ID')->paragraphs(2, true),
        ];
    }
}
