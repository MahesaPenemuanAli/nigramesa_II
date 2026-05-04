<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Webinar;
use App\Models\ChatWebinar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        if ($users->count() === 0) {
            $this->command->warn('Tabel users kosong! Silakan jalankan seeder user terlebih dahulu atau membuat setidaknya 1 user di database agar chat simulasi jalan.');
            // Kita coba buat factory user fiktif agar tidak total gagal
            $users = User::factory()->count(5)->create();
        }

        // Buat 2 Upcoming
        $upcomingWebinars = Webinar::factory()->count(2)->create([
            'status' => 'upcoming',
        ]);

        // Buat 1 Live
        $liveWebinars = Webinar::factory()->count(1)->create([
            'status' => 'live',
        ]);

        // Buat 2 Finished
        $finishedWebinars = Webinar::factory()->count(2)->create([
            'status' => 'finished',
        ]);

        $allWebinars = $upcomingWebinars->concat($liveWebinars)->concat($finishedWebinars);

        foreach ($allWebinars as $webinar) {
            // Pilih 3-10 user acak untuk mendaftar
            $randomUsers = $users->random(rand(2, min(10, $users->count())));
            
            foreach ($randomUsers as $user) {
                // Attach ke tabel pivot pendaftaran_webinars
                $webinar->pendaftarans()->firstOrCreate([
                    'user_id' => $user->id,
                ]);
            }

            // Generate Chat jika live / finished
            if ($webinar->status === 'live' || $webinar->status === 'finished') {
                $registeredUsers = $webinar->pendaftarans()->with('user')->get()->pluck('user');

                if ($registeredUsers->count() > 0) { // Pastikan ada pendaftar
                    for ($i = 0; $i < rand(10, 20); $i++) {
                        ChatWebinar::factory()->create([
                            'webinar_id' => $webinar->id,
                            'user_id' => $registeredUsers->random()->id,
                            'created_at' => now()->subMinutes(rand(1, 100))
                        ]);
                    }
                }
            }
        }
    }
}
