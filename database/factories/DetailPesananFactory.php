<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DetailPesanan;
use App\Models\Pesanan;
use App\Models\Produk;

class DetailPesananFactory extends Factory
{
    protected $model = DetailPesanan::class;

    public function definition(): array
    {
        return [
            'pesanan_id' => Pesanan::factory(),
            'produk_id' => Produk::factory(),
            'jumlah' => fake()->numberBetween(1, 5),
            'subtotal' => fake()->numberBetween(10000, 500000),
        ];
    }
}
