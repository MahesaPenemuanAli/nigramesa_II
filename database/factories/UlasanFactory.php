<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ulasan;
use App\Models\User;
use App\Models\Produk;

class UlasanFactory extends Factory
{
    protected $model = Ulasan::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'produk_id' => Produk::factory(),
            'rating' => fake()->numberBetween(1, 5),
            'komentar' => fake('id_ID')->sentence(15),
        ];
    }
}
