# Nigramesa II

**Nigramesa II** adalah aplikasi web berbasis **Laravel** yang dikembangkan untuk menyediakan informasi, edukasi, katalog produk, panduan perawatan tanaman, perpustakaan literatur, serta fitur transaksi sederhana melalui katalog, keranjang, dan checkout. Aplikasi ini juga dilengkapi dengan autentikasi pengguna, profil pengguna, notifikasi, chatbot, dan panel admin berbasis Filament.

Repository ini merupakan versi pengembangan website Nigramesa menggunakan Laravel 13.

---

## Daftar Isi

- [Tentang Aplikasi](#tentang-aplikasi)
- [Fitur Utama](#fitur-utama)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Role Pengguna](#role-pengguna)
- [Struktur Menu Aplikasi](#struktur-menu-aplikasi)
- [Struktur Folder Penting](#struktur-folder-penting)
- [Instalasi Project](#instalasi-project)
- [Konfigurasi Environment](#konfigurasi-environment)
- [Menjalankan Aplikasi](#menjalankan-aplikasi)
- [Akses Admin Panel](#akses-admin-panel)
- [Database dan Seeder](#database-dan-seeder)
- [Alur Penggunaan Aplikasi](#alur-penggunaan-aplikasi)
- [Testing dan Formatting](#testing-dan-formatting)
- [Build Production](#build-production)
- [Catatan Pengembangan](#catatan-pengembangan)
- [Kontributor](#kontributor)

---

## Tentang Aplikasi

Nigramesa II dirancang sebagai platform digital bertema tanaman/botani yang menggabungkan beberapa kebutuhan utama pengguna, yaitu:

1. Melihat informasi dan katalog produk.
2. Mencari produk berdasarkan nama dan kategori.
3. Menambahkan produk ke keranjang.
4. Melakukan checkout dan membuat pesanan.
5. Melihat panduan perawatan tanaman.
6. Mengakses literatur/perpustakaan digital.
7. Mengakses edukasi berbasis video.
8. Menggunakan chatbot bantuan.
9. Mengelola data melalui admin panel.

Aplikasi ini cocok digunakan sebagai project pembelajaran Laravel, e-commerce sederhana, sistem informasi edukasi tanaman, atau platform katalog produk botani.

---

## Fitur Utama

### 1. Autentikasi Pengguna

Aplikasi menyediakan fitur autentikasi pengguna, meliputi:

- Register akun.
- Login akun.
- Logout.
- Verifikasi email.
- Lupa password.
- Reset password.
- Update password.
- Edit profil pengguna.
- Hapus akun pengguna.

Autentikasi menggunakan Laravel Breeze sebagai dasar sistem login dan registrasi.

---

### 2. Dashboard Pengguna

Dashboard menampilkan ringkasan data penting seperti:

- Produk terbaru.
- Tanaman terbaru.
- Literatur terbaru.
- Video pembelajaran sorotan.

Dashboard hanya dapat diakses oleh pengguna yang sudah login dan terverifikasi.

---

### 3. Katalog Produk

Fitur katalog digunakan untuk menampilkan daftar produk yang tersedia di aplikasi.

Fitur katalog meliputi:

- Menampilkan daftar produk.
- Pencarian produk berdasarkan nama.
- Filter produk berdasarkan kategori.
- Pagination produk.
- Halaman detail produk.
- Menampilkan ulasan produk.
- Tombol tambah ke keranjang.
- Proses beli langsung melalui checkout.

Contoh data produk dapat dimasukkan melalui seeder `ProdukSeeder`.

---

### 4. Keranjang Belanja

Fitur keranjang memungkinkan pengguna menyimpan produk sebelum checkout.

Fitur keranjang meliputi:

- Menambahkan produk ke keranjang.
- Menentukan jumlah produk.
- Mengubah jumlah produk.
- Validasi stok produk.
- Menghapus produk dari keranjang.
- Menghitung subtotal.
- Menghitung pajak 11%.
- Menghitung total harga.
- Mendukung update kuantitas menggunakan respons JSON/AJAX.

---

### 5. Checkout dan Pesanan

Fitur checkout digunakan untuk memproses produk dari keranjang menjadi pesanan.

Fitur checkout meliputi:

- Memilih item yang ingin di-checkout.
- Mengisi alamat pengiriman.
- Memilih metode pembayaran.
- Menghitung subtotal, pajak, dan total harga.
- Membuat data pesanan.
- Membuat detail pesanan.
- Mengurangi stok produk setelah checkout berhasil.
- Menghapus item dari keranjang setelah checkout.
- Mengirim notifikasi pesanan berhasil.
- Menampilkan halaman sukses checkout.

---

### 6. Riwayat Pesanan

Pengguna dapat melihat riwayat pesanan melalui halaman profil/riwayat.

Fitur ini berguna untuk melihat daftar transaksi yang pernah dilakukan oleh pengguna.

---

### 7. Notifikasi

Aplikasi memiliki sistem notifikasi untuk pengguna.

Fitur notifikasi meliputi:

- Notifikasi pesanan berhasil.
- Menandai semua notifikasi sebagai sudah dibaca.

---

### 8. Panduan Perawatan Tanaman

Fitur perawatan tanaman digunakan untuk memberikan informasi perawatan tanaman kepada pengguna.

Fitur perawatan meliputi:

- Menampilkan daftar tanaman.
- Pencarian tanaman berdasarkan nama.
- Filter tanaman berdasarkan kategori.
- Pagination data tanaman.
- Halaman detail tanaman.

Data tanaman dapat dimasukkan melalui `TanamanSeeder` atau dikelola melalui admin panel.

---

### 9. Perpustakaan Digital

Fitur perpustakaan digunakan untuk menampilkan data literatur atau referensi bacaan.

Fitur perpustakaan meliputi:

- Menampilkan daftar literatur.
- Melihat detail literatur.
- Mendukung data file atau URL literatur.
- Dapat dikelola melalui admin panel.

---

### 10. Edukasi Video

Fitur edukasi menyediakan video pembelajaran untuk pengguna.

Fitur edukasi meliputi:

- Menampilkan daftar video pembelajaran.
- Melihat detail video.
- Akses hanya untuk pengguna yang sudah login.
- Data video dapat dikelola melalui admin panel.

---

### 11. Chatbot

Aplikasi memiliki endpoint chatbot yang dapat diakses dari halaman aplikasi.

Fitur chatbot dapat digunakan sebagai bantuan interaktif untuk pengguna, misalnya menjawab pertanyaan umum tentang aplikasi, produk, tanaman, atau edukasi.

---

### 12. Admin Panel Filament

Admin panel digunakan untuk mengelola data aplikasi secara lebih mudah melalui browser.

Admin panel berbasis **Filament** dan dapat digunakan untuk mengelola beberapa data utama, seperti:

- Produk.
- Tanaman.
- Literatur.
- Video pembelajaran.
- Pesanan.
- Webinar.

Admin panel tersedia melalui path:

```text
/admin
```

---

### 13. Admin Demo UI

Selain admin panel Filament, repository juga memiliki route demo tampilan admin untuk preview UI.

Route demo admin:

```text
/admin-demo/dashboard
/admin-demo/products
/admin-demo/orders
/admin-demo/payments
```

Route ini bersifat preview tampilan dan bukan pengganti admin panel utama Filament.

---

### 14. Modul Webinar

Di dalam source code terdapat model, controller, view, resource, migration, dan seeder yang berkaitan dengan webinar.

Modul webinar mencakup:

- Data webinar.
- Status webinar seperti live dan upcoming.
- Pendaftaran webinar.
- Streaming webinar untuk pengguna terdaftar.
- Chat pada webinar.

Catatan: jika route webinar belum aktif pada `routes/web.php`, tambahkan route webinar terlebih dahulu sebelum fitur ini digunakan secara penuh.

---

## Teknologi yang Digunakan

### Backend

- PHP `^8.3`
- Laravel `^13.0`
- Laravel Tinker
- Laravel Breeze
- Laravel Queue
- Laravel Notification
- Laravel Migration dan Seeder

### Admin Panel

- Filament `^5.6`

### Frontend

- Blade Template
- Tailwind CSS
- Alpine.js
- Vite
- Axios

### Database

Aplikasi dapat menggunakan database yang didukung Laravel, seperti:

- MySQL/MariaDB
- PostgreSQL
- SQLite untuk pengembangan lokal sederhana

---

## Role Pengguna

### 1. Guest

Guest adalah pengguna yang belum login.

Akses yang tersedia:

- Halaman welcome.
- Login.
- Register.
- Forgot password.
- Chatbot jika ditampilkan pada halaman publik.

---

### 2. User

User adalah pengguna yang sudah login.

Akses yang tersedia:

- Dashboard.
- Edit profil.
- Riwayat pesanan.
- Edukasi.
- Perawatan tanaman.
- Katalog produk.
- Keranjang.
- Checkout.
- Perpustakaan.
- Tentang aplikasi.
- Notifikasi.

---

### 3. Admin

Admin adalah pengguna yang memiliki akses ke panel admin Filament.

Akses yang tersedia:

- Login admin.
- Kelola produk.
- Kelola tanaman.
- Kelola literatur.
- Kelola video pembelajaran.
- Kelola pesanan.
- Kelola webinar.

---

## Struktur Menu Aplikasi

Berikut gambaran menu/halaman yang tersedia pada aplikasi:

| Halaman | URL | Keterangan |
|---|---|---|
| Welcome | `/` | Halaman awal aplikasi |
| Dashboard | `/dashboard` | Ringkasan data utama pengguna |
| Login | `/login` | Login pengguna |
| Register | `/register` | Registrasi pengguna |
| Profile | `/profile` | Edit profil pengguna |
| Riwayat | `/profil/riwayat` | Riwayat pesanan pengguna |
| Edukasi | `/edukasi` | Daftar video pembelajaran |
| Detail Edukasi | `/edukasi/{video}` | Detail video pembelajaran |
| Perawatan | `/perawatan` | Daftar panduan perawatan tanaman |
| Detail Perawatan | `/perawatan/{tanaman}` | Detail tanaman |
| Katalog | `/katalog` | Daftar produk |
| Detail Katalog | `/katalog/{produk}` | Detail produk |
| Keranjang | `/keranjang` | Daftar item keranjang |
| Checkout | `/checkout` | Proses checkout |
| Checkout Success | `/checkout/success/{id}` | Halaman checkout berhasil |
| Perpustakaan | `/perpustakaan` | Daftar literatur |
| Detail Literatur | `/perpustakaan/{literatur}` | Detail literatur |
| Tentang | `/tentang` | Informasi aplikasi |
| Chatbot | `/chatbot/respond` | Endpoint chatbot |
| Admin Panel | `/admin` | Panel admin Filament |
| Admin Demo | `/admin-demo/dashboard` | Preview dashboard admin |

---

## Struktur Folder Penting

```text
nigramesa_II/
├── app/
│   ├── Filament/Resources/        # Resource admin panel Filament
│   ├── Helpers/                   # Helper custom aplikasi
│   ├── Http/Controllers/          # Controller aplikasi
│   ├── Models/                    # Model Eloquent
│   ├── Notifications/             # Notifikasi aplikasi
│   └── Providers/                 # Service provider Laravel dan Filament
│
├── database/
│   ├── factories/                 # Factory data dummy
│   ├── migrations/                # Struktur tabel database
│   ├── seeders/                   # Seeder data awal
│   └── sql/                       # File SQL tambahan jika ada
│
├── public/                        # Asset publik
├── resources/
│   ├── css/                       # File CSS
│   ├── js/                        # File JavaScript
│   └── views/                     # Blade view aplikasi
│
├── routes/
│   ├── web.php                    # Route halaman web
│   └── auth.php                   # Route autentikasi
│
├── storage/                       # Storage Laravel
├── tests/                         # Unit dan feature test
├── composer.json                  # Dependency PHP
├── package.json                   # Dependency frontend
└── vite.config.js                 # Konfigurasi Vite
```

---

## Instalasi Project

### 1. Clone Repository

```bash
git clone https://github.com/MahesaPenemuanAli/nigramesa_II.git
cd nigramesa_II
```

---

### 2. Install Dependency PHP

```bash
composer install
```

---

### 3. Install Dependency Frontend

```bash
npm install
```

---

### 4. Buat File Environment

```bash
cp .env.example .env
```

Untuk Windows PowerShell:

```powershell
copy .env.example .env
```

---

### 5. Generate Application Key

```bash
php artisan key:generate
```

---

## Konfigurasi Environment

Buka file `.env`, lalu sesuaikan konfigurasi aplikasi dan database.

Contoh konfigurasi dasar:

```env
APP_NAME="Nigramesa II"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nigramesa_ii
DB_USERNAME=root
DB_PASSWORD=
```

Jika menggunakan PostgreSQL:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nigramesa_ii
DB_USERNAME=postgres
DB_PASSWORD=password_database
```

---

## Menjalankan Migration dan Seeder

Jalankan migration untuk membuat tabel database:

```bash
php artisan migrate
```

Jalankan seeder untuk mengisi data awal:

```bash
php artisan db:seed
```

Atau jalankan migration dan seeder sekaligus:

```bash
php artisan migrate --seed
```

Jika ingin reset database lokal:

```bash
php artisan migrate:fresh --seed
```

---

## Storage Link

Jika aplikasi menggunakan gambar/file yang disimpan pada storage, jalankan:

```bash
php artisan storage:link
```

---

## Menjalankan Aplikasi

### 1. Jalankan Laravel Server

```bash
php artisan serve
```

Aplikasi akan berjalan di:

```text
http://127.0.0.1:8000
```

---

### 2. Jalankan Vite

Buka terminal baru, lalu jalankan:

```bash
npm run dev
```

---

### 3. Menjalankan Server, Queue, Log, dan Vite Sekaligus

Project ini juga memiliki script composer untuk development:

```bash
composer run dev
```

Script tersebut menjalankan beberapa proses sekaligus, yaitu:

- Laravel development server.
- Queue listener.
- Laravel Pail untuk log.
- Vite development server.

---

## Akses Admin Panel

Admin panel Filament dapat diakses melalui:

```text
http://127.0.0.1:8000/admin
```

Seeder admin menyediakan akun awal:

```text
Email    : admin@nigramesa.botany.id
Password : password
```

> Penting: segera ubah password admin setelah instalasi, terutama jika aplikasi akan diunggah ke hosting atau digunakan secara publik.

---

## Database dan Seeder

Seeder yang tersedia pada project:

| Seeder | Fungsi |
|---|---|
| `AdminSeeder` | Membuat akun admin awal |
| `UserSeeder` | Membuat data user |
| `TanamanSeeder` | Mengisi data tanaman |
| `ProdukSeeder` | Mengisi data produk |
| `LiteraturSeeder` | Mengisi data literatur |
| `VideoPembelajaranSeeder` | Mengisi data video pembelajaran |
| `UlasanSeeder` | Mengisi data ulasan produk |
| `PesananSeeder` | Mengisi data pesanan |
| `DetailPesananSeeder` | Mengisi detail pesanan |
| `WebinarSeeder` | Mengisi data webinar |

Relasi utama yang digunakan aplikasi:

- User memiliki banyak keranjang.
- User memiliki banyak pesanan.
- User dapat memiliki ulasan produk.
- Produk dapat masuk ke banyak keranjang.
- Produk dapat memiliki banyak ulasan.
- Pesanan memiliki banyak detail pesanan.
- Detail pesanan terhubung ke produk.
- Webinar dapat memiliki pendaftaran dan chat.

---

## Alur Penggunaan Aplikasi

### Alur User

1. User membuka halaman awal aplikasi.
2. User membuat akun atau login.
3. User masuk ke dashboard.
4. User melihat katalog produk.
5. User mencari atau memfilter produk.
6. User membuka detail produk.
7. User menambahkan produk ke keranjang.
8. User membuka halaman keranjang.
9. User mengubah jumlah produk jika diperlukan.
10. User melakukan checkout.
11. User mengisi alamat dan metode pembayaran.
12. Sistem membuat pesanan.
13. Sistem mengurangi stok produk.
14. Sistem mengirim notifikasi pesanan berhasil.
15. User melihat halaman sukses checkout.

---

### Alur Admin

1. Admin membuka `/admin`.
2. Admin login menggunakan akun admin.
3. Admin masuk ke dashboard Filament.
4. Admin mengelola data produk, tanaman, literatur, video, pesanan, dan webinar.
5. Data yang dikelola admin akan tampil pada halaman pengguna.

---

## Testing dan Formatting

### Menjalankan Test

```bash
php artisan test
```

Atau melalui Composer:

```bash
composer test
```

---

### Formatting Kode dengan Laravel Pint

```bash
./vendor/bin/pint
```

Untuk Windows:

```bash
vendor\bin\pint
```

---

## Build Production

Sebelum deploy ke hosting, jalankan build frontend:

```bash
npm run build
```

Optimasi konfigurasi Laravel:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Jika ingin membersihkan cache:

```bash
php artisan optimize:clear
```

---

## Deployment Singkat

Langkah umum deploy ke hosting:

1. Upload project ke hosting/VPS.
2. Jalankan `composer install --optimize-autoloader --no-dev`.
3. Jalankan `npm install` dan `npm run build`.
4. Buat file `.env` production.
5. Set `APP_ENV=production`.
6. Set `APP_DEBUG=false`.
7. Konfigurasi database production.
8. Jalankan `php artisan key:generate` jika belum ada APP_KEY.
9. Jalankan `php artisan migrate --force`.
10. Jalankan `php artisan storage:link`.
11. Pastikan document root hosting mengarah ke folder `public`.

---

## Catatan Pengembangan

Beberapa hal yang dapat dikembangkan lebih lanjut:

- Menambahkan role dan permission admin yang lebih detail.
- Menambahkan status pembayaran pesanan.
- Menambahkan upload bukti pembayaran.
- Menambahkan tracking pengiriman.
- Mengaktifkan dan merapikan route webinar jika fitur webinar ingin digunakan penuh.
- Menambahkan dashboard statistik admin.
- Menambahkan filter produk yang lebih lengkap.
- Menambahkan sistem rating produk yang lebih interaktif.
- Menambahkan integrasi payment gateway.
- Menambahkan API untuk mobile app.
- Menambahkan dokumentasi screenshot aplikasi pada README.

---

## Troubleshooting

### 1. Error `APP_KEY` belum tersedia

Jalankan:

```bash
php artisan key:generate
```

---

### 2. Tampilan CSS tidak muncul

Jalankan:

```bash
npm install
npm run dev
```

Untuk production:

```bash
npm run build
```

---

### 3. Gambar atau file tidak muncul

Jalankan:

```bash
php artisan storage:link
```

---

### 4. Database error

Pastikan konfigurasi `.env` sudah sesuai:

```env
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Lalu jalankan:

```bash
php artisan migrate --seed
```

---

### 5. Admin tidak bisa login

Pastikan seeder admin sudah dijalankan:

```bash
php artisan db:seed --class=AdminSeeder
```

Kemudian login melalui:

```text
/admin
```

---

## Kontributor

Project ini dikembangkan oleh:

```text
MahesaPenemuanAli
```

Repository:

```text
https://github.com/MahesaPenemuanAli/nigramesa_II
```

---

## Lisensi

Project ini mengikuti lisensi yang digunakan pada repository. Jika project digunakan untuk tugas, portofolio, atau pengembangan lanjutan, cantumkan kredit kepada pemilik repository.
