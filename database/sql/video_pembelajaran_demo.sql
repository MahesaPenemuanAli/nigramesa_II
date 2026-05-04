-- Demo SQL untuk mengisi tabel video_pembelajarans
-- Jalankan file ini setelah migration video_pembelajarans selesai.
-- Aman dipakai untuk demo awal halaman /edukasi.

TRUNCATE TABLE `video_pembelajarans`;

INSERT INTO `video_pembelajarans`
(`judul`, `deskripsi`, `pemateri`, `cover_gambar`, `link_youtube`, `durasi`, `kategori`, `is_premium`, `created_at`, `updated_at`)
VALUES
(
    'Panduan Dasar Hidroponik untuk Pemula',
    'Materi pengantar untuk memahami sistem hidroponik sederhana di rumah. Video ini membahas alat dasar, media tanam, alur nutrisi, serta kesalahan umum yang sering dilakukan pemula saat memulai kebun hidroponik skala kecil.',
    'Dr. Rina Pramesti, M.Si.',
    NULL,
    'https://www.youtube.com/watch?v=M7lc1UVf-VE',
    '15 Menit',
    'Hidroponik',
    0,
    NOW(),
    NOW()
),
(
    'Teknik Merawat Monstera agar Daun Lebar dan Sehat',
    'Video pembelajaran ini membahas kebutuhan cahaya, pola penyiraman, kelembapan, dan pemupukan untuk tanaman monstera. Cocok untuk pecinta tanaman hias indoor yang ingin pertumbuhan daun lebih optimal dan tampilan tanaman tetap estetik.',
    'Andi Saputra',
    NULL,
    'https://youtu.be/ysz5S6PUM-U',
    '12 Menit',
    'Tanaman Hias',
    0,
    NOW(),
    NOW()
),
(
    'Membuat Pupuk Organik Cair dari Limbah Dapur',
    'Pelajari cara mengolah limbah organik rumah tangga menjadi pupuk organik cair yang praktis dan ekonomis. Materi dilengkapi langkah fermentasi, komposisi bahan, dan cara aplikasi pada tanaman sayur maupun tanaman hias.',
    'Ir. Salsabila Putri',
    NULL,
    'https://www.youtube.com/watch?v=ScMzIvxBSi4',
    '18 Menit',
    'Pupuk Organik',
    0,
    NOW(),
    NOW()
),
(
    'Identifikasi Hama Daun dan Cara Penanganannya',
    'Video ini membantu Anda mengenali gejala serangan hama pada daun seperti kutu, ulat, dan thrips. Disertai strategi pengendalian alami dan langkah pencegahan agar tanaman tetap produktif tanpa ketergantungan pestisida berlebih.',
    'Budi Haryanto, S.P.',
    NULL,
    'https://www.youtube.com/watch?v=d27gTrPPAyk',
    '14 Menit',
    'Hama & Penyakit',
    0,
    NOW(),
    NOW()
),
(
    'Smart Farming: Monitoring Kebun dengan Sensor Sederhana',
    'Materi ini membahas konsep dasar smart farming menggunakan sensor kelembapan, suhu, dan pemantauan sederhana berbasis data. Cocok untuk petani modern, mahasiswa, atau komunitas urban farming yang ingin mulai menerapkan otomasi ringan.',
    'Fajar Nugroho, M.T.',
    NULL,
    'https://www.youtube.com/watch?v=aqz-KE-bpKQ',
    '21 Menit',
    'Smart Farming',
    1,
    NOW(),
    NOW()
),
(
    'Strategi Urban Farming di Lahan Terbatas',
    'Pelajari cara menyusun kebun produktif di halaman sempit, rooftop, atau area balkon. Video ini menjelaskan penataan rak tanam, pemilihan komoditas, manajemen cahaya, dan efisiensi ruang untuk hasil panen maksimal.',
    'Nadia Ayuningtyas',
    NULL,
    'https://www.youtube.com/watch?v=M7lc1UVf-VE',
    '17 Menit',
    'Urban Farming',
    0,
    NOW(),
    NOW()
),
(
    'Teknik Penyemaian Benih Cepat Tumbuh',
    'Video ini menjelaskan tahapan penyemaian benih mulai dari pemilihan media, pengaturan kelembapan, pencahayaan awal, hingga proses pindah tanam. Cocok untuk pembudidaya sayur, buah, maupun tanaman hias skala rumahan.',
    'Arif Maulana, S.P.',
    NULL,
    'https://youtu.be/ScMzIvxBSi4',
    '11 Menit',
    'Pembibitan',
    0,
    NOW(),
    NOW()
),
(
    'Kelas Premium: Manajemen Nutrisi Tanaman Intensif',
    'Kelas lanjutan untuk memahami kebutuhan unsur hara makro dan mikro pada tanaman secara lebih mendalam. Dibahas juga analisis gejala kekurangan nutrisi, strategi penyesuaian dosis, dan evaluasi pertumbuhan berbasis observasi lapangan.',
    'Prof. Diah Kusumawardani',
    NULL,
    'https://www.youtube.com/watch?v=ysz5S6PUM-U',
    '25 Menit',
    'Nutrisi Tanaman',
    1,
    NOW(),
    NOW()
);
