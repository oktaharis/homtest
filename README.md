# Klinik App

![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.3-06B6D4?logo=tailwind-css&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-16-4169E1?logo=postgresql&logoColor=white)

Aplikasi manajemen klinik berbasis web dengan sistem role-based access control (RBAC) untuk mengelola operasional klinik secara efisien.

## Fitur Utama

- ✅ **Manajemen Pengguna** dengan 4 level akses
- 📊 **Dashboard Interaktif** menyesuaikan peran pengguna
- 🏥 **Manajemen Pasien** terintegrasi
- 💊 **Manajemen Obat & Tindakan**
- 💳 **Sistem Pembayaran & Laporan**
- 🔒 **Autentikasi Aman** dengan enkripsi password

## Daftar Peran

| Peran       | Hak Akses |
|-------------|-----------|
| 👨‍💻 Admin   | Full akses ke semua fitur + manajemen user |
| 🧑‍⚕️ Dokter  | Input diagnosa, resep obat, tindakan medis |
| 🧑‍💼 Petugas | Input data pasien & kunjungan |
| 💰 Kasir    | Proses pembayaran & laporan transaksi |

## Teknologi

**Frontend:**
- Tailwind CSS 
- Alpine.js
- Chart.js (untuk grafik dashboard)

**Backend:**
- Laravel 12
- PostgreSQL 17

## Instalasi

### Persyaratan Sistem
- PHP 8.2+
- Composer 2.5+
- Node.js 18+
- PostgreSQL 16
- Git

### Langkah Instalasi

1. **Clone repository**
```bash
git clone <url_repository>
cd klinik-app
```

2. **Instal dependensi**
```bash
composer install
npm install
npm run build atau npm run dev
```

3. **Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Konfigurasi database** (edit .env)
```ini
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=klinik_app
DB_USERNAME=postgres
DB_PASSWORD=password_anda
```

5. **Jalankan migrasi & seeder**
```bash
php artisan migrate --seed
```
atau 
```bash
php artisan migrate:fresh --seed
```

6. **Jalankan server development**
```bash
php artisan serve
```

## Akun Demo

| Peran   | Username | Password    |
|---------|----------|-------------|
| Admin   | admin    | password123   |
| Dokter  | dokter1  | password123   |
| Petugas | petugas1 | password123   |
| Kasir   | kasir1   | password123   |


## Cara Berkontribusi

1. Fork project ini
2. Buat branch fitur baru (`git checkout -b fitur-baru`)
3. Commit perubahan (`git commit -m 'Tambahkan fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buat Pull Request

## Troubleshooting

**Masalah**                          | **Solusi**
------------------------------------|-----------------------------------------
Error koneksi database              | Periksa credential di .env dan pastikan PostgreSQL berjalan
Class not found                     | Jalankan `composer dump-autoload`
Asset tidak terload                 | Jalankan `npm run build` ulang
Route tidak ditemukan               | Clear cache route: `php artisan route:clear`



## Lisensi

[MIT License](https://opensource.org/licenses/MIT)

## Kontak

Untuk pertanyaan lebih lanjut:
- Email: [oktaharis.work@gmail.com]
- WhatsApp: [+62 858-8947-3650]

---

**© 2025 Klinik App** - Dibangun dengan ❤️ untuk pelayanan kesehatan yang lebih baik :)
