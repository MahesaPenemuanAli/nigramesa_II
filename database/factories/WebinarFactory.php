<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Webinar>
 */
class WebinarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $judul_list = [
            'Rahasia Sukses Hidroponik Skala Rumahan',
            'Webinar Perawatan Anggrek Spesies Langka',
            'Teknik Pemupukan Organik Cair Tepat Guna',
            'Pengendalian Hama Tanaman Hias Secara Alami',
            'Trend Landscape & Tanaman Hias Indoor 2026',
            'Eksplorasi Bisnis Agrikultur Modern Berbasis IoT',
            'Merawat Bonsai Pemula hingga Bebas Hama'
        ];

        $status = $this->faker->randomElement(['upcoming', 'live', 'finished']);
        $waktu_mulai = now();
        $waktu_selesai = now();
        $link_streaming = null;

        if ($status === 'upcoming') {
            $waktu_mulai = now()->addDays(rand(1, 7))->addHours(rand(1, 10));
            $waktu_selesai = (clone $waktu_mulai)->addHours(2);
        } elseif ($status === 'live') {
            $waktu_mulai = now()->subMinutes(rand(10, 50));
            $waktu_selesai = (clone $waktu_mulai)->addHours(2);
            // embed youtube loop video
            $link_streaming = "https://www.youtube.com/embed/d27gTrPPAyk?autoplay=1&mute=1&loop=1"; 
        } elseif ($status === 'finished') {
            $waktu_mulai = now()->subDays(rand(1, 30));
            $waktu_selesai = (clone $waktu_mulai)->addHours(2);
            $link_streaming = "https://www.youtube.com/embed/d27gTrPPAyk";
        }

        return [
            'judul' => $this->faker->randomElement($judul_list),
            'deskripsi' => $this->faker->paragraphs(3, true),
            'pembicara' => $this->faker->name . ($this->faker->boolean ? ', S.P., M.Si.' : ', Ph.D.'),
            'cover_gambar' => 'https://placehold.co/800x450/10b981/ffffff?font=montserrat&text=Webinar+Nigramesa',
            'waktu_mulai' => $waktu_mulai,
            'waktu_selesai' => $waktu_selesai,
            'status' => $status,
            'link_streaming' => $link_streaming,
        ];
    }
}
