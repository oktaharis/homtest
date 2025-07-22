<?php

namespace Database\Seeders;

use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KunjunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $pasienIds = Pasien::pluck('id')->toArray();
        $userIds = User::where('role', 'dokter')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            Kunjungan::create([
                'pasien_id' => $faker->randomElement($pasienIds),
                'user_id' => $faker->randomElement($userIds),
                'tanggal_kunjungan' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'jenis_kunjungan' => $faker->randomElement(['rawat_jalan', 'konsultasi']),
                'status' => $faker->randomElement(['pendaftaran', 'selesai', 'dibayar']),
            ]);
        }
    }
}
