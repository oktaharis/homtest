Klinik App
Aplikasi manajemen klinik berbasis Laravel 12 dengan SRBAC (Simple Role-Based Access Control) dan Tailwind CSS untuk antarmuka.
Peran (Roles)

Admin: Mengelola pengguna, wilayah, pegawai, tindakan, obat, pasien, dan laporan. Bisa mendaftarkan pengguna baru di /register.
Petugas: Mengelola data pasien dan kunjungan.
Dokter: Mengelola kunjungan, transaksi tindakan, dan transaksi obat.
Kasir: Mengelola pembayaran dan melihat laporan.

Prasyarat

PHP >= 8.2 (dengan ekstensi pdo_mysql, mbstring, openssl, bcmath, xml)
Composer
Node.js & npm
MySQL/MariaDB atau SQLite
Git

Langkah Setup

Kloning atau Siapkan Proyek
git clone <url-repository>
cd klinik-app


Instal Dependensi PHP
composer install


Instal Dependensi Node.js (untuk Tailwind CSS)
npm install
npm run build

Catatan: Proyek menggunakan Tailwind CSS via CDN di app.blade.php, jadi kompilasi lokal opsional.

Konfigurasi Lingkungan

Salin .env.example ke .env:cp .env.example .env


Ubah pengaturan database di .env:DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=klinik_app
DB_USERNAME=root
DB_PASSWORD=

( SESUAIKAN SAJA )

Generate kunci aplikasi:php artisan key:generate




Jalankan Migrasi

Buat database klinik_app di PosgtreSQL.
Jalankan php artisan migrate 

atau juga bisa

Jalankan php artisan migrate:fresh
untuk generate ulang.


Isi Data Awal (Opsional)

Buat seeder:php artisan make:seeder UserSeeder


Edit database/seeders/UserSeeder.php:<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'nama' => 'Administrator'
        ]);
        User::create([
            'username' => 'petugas1',
            'password' => Hash::make('password123'),
            'role' => 'petugas',
            'nama' => 'Petugas Satu'
        ]);
        User::create([
            'username' => 'dokter1',
            'password' => Hash::make('password123'),
            'role' => 'dokter',
            'nama' => 'Dokter Satu'
        ]);
        User::create([
            'username' => 'kasir1',
            'password' => Hash::make('password123'),
            'role' => 'kasir',
            'nama' => 'Kasir Satu'
        ]);
    }
}


Jalankan seeder:php artisan db:seed --class=UserSeeder

Kalau ingin reset bisa 
Jalankan php artisan migrate:fresh --seed


Jalankan Server
php artisan serve

Akses aplikasi di http://localhost:8000.

Akses Aplikasi

Login: Buka /login, gunakan akun (contoh: admin/password123).
Sign-Up: Admin bisa mendaftarkan pengguna baru di /register.
Dashboard: Otomatis dialihkan ke /dashboard setelah login, menampilkan statistik sesuai peran.



Struktur Proyek

Routes: Didefinisikan di routes/web.php dengan middleware berbasis peran.
Controllers: AuthController untuk autentikasi, lainnya untuk data master, transaksi, pembayaran, dan laporan.
Views: Menggunakan resources/views/layouts/app.blade.php untuk layout, dengan sidebar.blade.php dan bottombar.blade.php untuk navigasi.
Database: Tabel users (id, username, password, role, nama, created_at, updated_at).

Catatan

Pastikan migrasi untuk tabel users dan lainnya (misalnya, pasien, kunjungan) sudah dibuat dan dijalankan.
Tailwind CSS menggunakan CDN di app.blade.php. Untuk kompilasi lokal, atur tailwind.config.js dan jalankan npm run build.
Uji fitur Sign-Up sebagai admin di /register.
Untuk fitur tambahan (misalnya, grafik di dashboard dengan Chart.js), edit dashboard.blade.php.

Pemecahan Masalah

Error Koneksi Database: Periksa pengaturan .env dan pastikan PostgreSQL berjalan.
Route 404: Pastikan file controller dan view ada sesuai web.php.
Izin Ditolak: Jalankan php artisan cache:clear dan php artisan route:cache.
