<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pesanan;
use App\Models\User;

class PesananFactory extends Factory
{
    protected $model = Pesanan::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'total_harga' => fake()->numberBetween(50000, 1000000),
            'status_pesanan' => fake()->randomElement(['pending', 'diproses', 'dikirim', 'selesai', 'dibatalkan']),
            'metode_pembayaran' => fake()->randomElement(['Transfer Bank', 'Kartu Kredit', 'E-Wallet', 'COD']),
            'alamat_pengiriman' => fake('id_ID')->address(),
        ];
    }
}
