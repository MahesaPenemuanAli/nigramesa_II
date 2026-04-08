<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pesanan;
use App\Models\User;

class PesananSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        
        Pesanan::factory()
            ->count(10)
            ->recycle($users)
            ->create();
    }
}
