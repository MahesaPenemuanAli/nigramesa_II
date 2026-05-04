<?php

namespace Database\Seeders;

use App\Models\VideoPembelajaran;
use Illuminate\Database\Seeder;

class VideoPembelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videos = [
            [
                'judul' => 'Dasar Hidroponik untuk Pemula',
                'deskripsi' => "Pelajari fondasi sistem hidroponik dari nol, mulai dari pengenalan media tanam, nutrisi dasar, hingga kesalahan umum yang sering dilakukan pemula. Materi ini cocok untuk Anda yang ingin mulai menanam di rumah dengan ruang terbatas.",
                'pemateri' => 'Dewi Lestari, S.P.',
                'cover_gambar' => null,
                'link_youtube' => 'https://www.youtube.com/watch?v=M7lc1UVf-VE',
                'durasi' => '15 Menit',
                'kategori' => 'Hidroponik',
                'is_premium' => false,
            ],
            [
                'judul' => 'Teknik Penyemaian Bibit Sayuran yang Konsisten',
                'deskripsi' => "Video ini membahas langkah-langkah penyemaian bibit sayuran agar tingkat tumbuh lebih stabil. Anda akan mempelajari pemilihan tray semai, kelembapan ideal, pencahayaan awal, serta waktu pindah tanam yang tepat.",
                'pemateri' => 'Rizky Aditya, M.P.',
                'cover_gambar' => null,
                'link_youtube' => 'https://youtu.be/ysz5S6PUM-U',
                'durasi' => '12 Menit',
                'kategori' => 'Pembibitan',
                'is_premium' => false,
            ],
            [
                'judul' => 'Perawatan Monstera dan Philodendron di Dalam Ruangan',
                'deskripsi' => "Fokus pada tanaman hias indoor yang populer, materi ini mengulas kebutuhan cahaya, jadwal penyiraman, sirkulasi udara, dan tanda-tanda stres tanaman. Sangat cocok untuk kolektor tanaman hias rumahan.",
                'pemateri' => 'Nadia Putri, S.Hut.',
                'cover_gambar' => null,
                'link_youtube' => 'https://www.youtube.com/watch?v=ScMzIvxBSi4',
                'durasi' => '18 Menit',
                'kategori' => 'Tanaman Hias',
                'is_premium' => false,
            ],
            [
                'judul' => 'Meracik Pupuk Organik Cair Skala Rumah',
                'deskripsi' => "Pelajari cara membuat pupuk organik cair dari bahan sederhana yang mudah didapat. Materi membahas komposisi dasar, proses fermentasi, penyimpanan, dan aturan pakai agar aman untuk berbagai jenis tanaman.",
                'pemateri' => 'Bayu Pranata, S.P., M.Si.',
                'cover_gambar' => null,
                'link_youtube' => 'https://www.youtube.com/watch?v=d27gTrPPAyk',
                'durasi' => '20 Menit',
                'kategori' => 'Pupuk Organik',
                'is_premium' => true,
            ],
            [
                'judul' => 'Identifikasi Hama Daun dan Penanganan Awal',
                'deskripsi' => "Kenali gejala serangan kutu, ulat, thrips, dan jamur daun sejak dini. Video ini membantu Anda membaca pola kerusakan daun, melakukan isolasi tanaman, dan menentukan tindakan awal sebelum serangan meluas.",
                'pemateri' => 'Rama Kurniawan, S.P.',
                'cover_gambar' => null,
                'link_youtube' => 'https://www.youtube.com/watch?v=aqz-KE-bpKQ',
                'durasi' => '17 Menit',
                'kategori' => 'Hama & Penyakit',
                'is_premium' => true,
            ],
            [
                'judul' => 'Smart Farming: Sensor Sederhana untuk Kebun Rumahan',
                'deskripsi' => "Materi pengantar smart farming ini membahas penggunaan sensor kelembapan tanah, pencatatan data sederhana, dan cara membaca kebutuhan tanaman dengan lebih presisi. Cocok untuk petani modern pemula.",
                'pemateri' => 'Arif Maulana, M.T.',
                'cover_gambar' => null,
                'link_youtube' => 'https://www.youtube.com/watch?v=M7lc1UVf-VE',
                'durasi' => '14 Menit',
                'kategori' => 'Smart Farming',
                'is_premium' => true,
            ],
            [
                'judul' => 'Urban Farming di Lahan Sempit',
                'deskripsi' => "Video ini menunjukkan strategi budidaya tanaman konsumsi di halaman kecil, balkon, atau rooftop. Anda akan mempelajari penataan pot, pencahayaan, efisiensi ruang, dan pemeliharaan rutin agar produktif.",
                'pemateri' => 'Intan Permata, S.P.',
                'cover_gambar' => null,
                'link_youtube' => 'https://youtu.be/ysz5S6PUM-U',
                'durasi' => '16 Menit',
                'kategori' => 'Urban Farming',
                'is_premium' => false,
            ],
            [
                'judul' => 'Pasca Panen: Menjaga Kualitas Sayuran Tetap Segar',
                'deskripsi' => "Pelajari tahap dasar penanganan pasca panen agar kualitas sayuran tetap terjaga lebih lama. Materi meliputi waktu panen ideal, penanganan awal, sortasi, penyimpanan, dan distribusi skala kecil.",
                'pemateri' => 'Salsa Maharani, M.P.',
                'cover_gambar' => null,
                'link_youtube' => 'https://www.youtube.com/watch?v=ScMzIvxBSi4',
                'durasi' => '13 Menit',
                'kategori' => 'Pasca Panen',
                'is_premium' => false,
            ],
        ];

        foreach ($videos as $video) {
            VideoPembelajaran::updateOrCreate(
                ['judul' => $video['judul']],
                $video
            );
        }
    }
}
