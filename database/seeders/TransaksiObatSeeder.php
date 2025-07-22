<?php

namespace Database\Seeders;

use App\Models\Kunjungan;
use App\Models\Obat;
use App\Models\TransaksiObat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransaksiObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $kunjunganIds = Kunjungan::pluck('id')->toArray();
        $obatIds = Obat::pluck('id')->toArray();

        foreach ($kunjunganIds as $kunjunganId) {
            TransaksiObat::create([
                'kunjungan_id' => $kunjunganId,
                'obat_id' => $faker->randomElement($obatIds),
                'jumlah' => $faker->numberBetween(1, 10),
                'catatan' => $faker->optional()->sentence,
            ]);
        }
    }
}
