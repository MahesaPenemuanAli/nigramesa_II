<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@nigramesa.botany.id'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('password')
            ]
        );
    }
}
