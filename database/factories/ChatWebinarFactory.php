<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChatWebinar>
 */
class ChatWebinarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pesan_list = [
            'Wah materinya bagus sekali!',
            'Suaranya kurang jelas min, tolong diperkeras.',
            'Apakah sertifikat akan dibagikan di akhir sesi?',
            'Salam dari ujung aspal!',
            'Izin bertanya, kalau daun monstera menguning itu kenapa ya pemateri?',
            'Boleh minta file materi presentasinya dibagikan?',
            'Hadir menyimak dari Jawa Timur.',
            'Sangat informatif, terima kasih Nigramesa!',
            'Apakah ini akan ada siaran rekamannya di YouTube?',
            'Wah baru tahu ternyata begitu teknik potong akarnya.',
            'Sinergi yang luar biasa, ditunggu webinar selanjutnya.',
            'Terima kasih paparan materi yang sangat daging.',
        ];

        return [
            'pesan' => $this->faker->randomElement($pesan_list),
        ];
    }
}
