<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ulasan;
use App\Models\User;
use App\Models\Produk;

class UlasanSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $produks = Produk::all();

        Ulasan::factory()
            ->count(20)
            ->recycle($users)
            ->recycle($produks)
            ->create();
    }
}
