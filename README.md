Klinik App
Aplikasi manajemen klinik berbasis Laravel 12 dengan Simple Role-Based Access Control (SRBAC) dan Tailwind CSS untuk antarmuka pengguna.

Tentang Klinik App
Klinik App adalah sistem manajemen klinik yang memungkinkan pengelolaan data pasien, kunjungan, tindakan, obat, pembayaran, dan laporan dengan akses berbasis peran. Dibangun dengan Laravel 12, aplikasi ini menggunakan Tailwind CSS (via CDN) untuk antarmuka responsif dan PostgreSQL sebagai database.
Peran (Roles)

Admin: Mengelola pengguna, wilayah, pegawai, tindakan, obat, pasien, dan laporan. Bisa mendaftarkan pengguna baru di /register.
Petugas: Mengelola data pasien dan kunjungan.
Dokter: Mengelola kunjungan, transaksi tindakan, dan transaksi obat.
Kasir: Mengelola pembayaran dan melihat laporan.

Prasyarat

PHP >= 8.2 (dengan ekstensi pdo_pgsql, mbstring, openssl, bcmath, xml)
Composer
Node.js & npm
PostgreSQL
Git

Instalasi

Kloning Proyek
git clone <url-repository>
cd klinik-app


Instal Dependensi PHP
composer install


Instal Dependensi Node.js (opsional untuk Tailwind CSS lokal)
npm install
npm run build

Catatan: Proyek menggunakan Tailwind CSS via CDN di app.blade.php.

Konfigurasi Lingkungan

Salin .env.example ke .env:cp .env.example .env


Ubah pengaturan database di .env (sesuaikan dengan konfigurasi Anda):DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=klinik_app
DB_USERNAME=postgres
DB_PASSWORD=


Generate kunci aplikasi:php artisan key:generate




Jalankan Migrasi

Buat database klinik_app di PostgreSQL.
Jalankan migrasi:php artisan migrate


Atau untuk reset database:php artisan migrate:fresh




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


Untuk reset dan seed ulang:php artisan migrate:fresh --seed




Jalankan Server
php artisan serve

Akses aplikasi di http://localhost:8000.


Fitur

Autentikasi dan registrasi pengguna dengan SRBAC.
Dashboard dinamis berdasarkan peran pengguna.
Pengelolaan data master (pengguna, wilayah, pegawai, tindakan, obat, pasien).
Manajemen transaksi (kunjungan, tindakan, obat, pembayaran).
Laporan untuk admin dan kasir.
Antarmuka responsif dengan Tailwind CSS.

Environment Variables
Tambahkan variabel berikut ke .env:
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=klinik_app
DB_USERNAME=postgres
DB_PASSWORD=
APP_KEY=

Deployment
Untuk deploy ke server produksi:

Siapkan server dengan PHP, PostgreSQL, dan web server (misalnya, Nginx atau Apache).
Kloning proyek dan instal dependensi seperti di atas.
Jalankan migrasi dan seeder.
Konfigurasi web server untuk menunjuk ke folder public.
Jalankan:php artisan optimize



Struktur Proyek

Routes: routes/web.php dengan middleware berbasis peran.
Controllers: AuthController untuk autentikasi, lainnya untuk data master, transaksi, pembayaran, dan laporan.
Views: resources/views/layouts/app.blade.php untuk layout, dengan sidebar.blade.php dan bottombar.blade.php untuk navigasi.
Database: Tabel users (id, username, password, role, nama, created_at, updated_at).

Acknowledgements

Laravel Documentation
Awesome Readme Templates
How to Write a Good README

Contributing
Kontribusi selalu diterima! Lihat contributing.md untuk panduan. Patuhi code of conduct.
Documentation
Laravel Documentation
Pemecahan Masalah

Error Koneksi Database: Periksa .env dan pastikan PostgreSQL berjalan.
Route 404: Pastikan controller dan view ada sesuai web.php.
Izin Ditolak:php artisan cache:clear
php artisan route:cache



Color Reference



Warna
Hex



Primary 500
 #3b82f6


Primary 600
 #2563eb


Primary 700
 #1d4ed8


Gray 100
 #f3f4f6


License
MIT
Badges

Support
Untuk dukungan, hubungi: support@klinikapp.com
Roadmap

Tambah dukungan multi-bahasa.
Integrasi grafik dashboard dengan Chart.js.
Fitur notifikasi untuk transaksi.
