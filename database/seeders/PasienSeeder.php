<?php

namespace Database\Seeders;

use App\Models\Pasien;
use App\Models\Wilayah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $wilayahIds = Wilayah::where('tipe', 'kabupaten')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            Pasien::create([
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'wilayah_id' => $faker->randomElement($wilayahIds),
                'tanggal_lahir' => $faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            ]);
        }
    }
}
