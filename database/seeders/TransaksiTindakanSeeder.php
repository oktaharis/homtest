<?php

namespace Database\Seeders;

use App\Models\Kunjungan;
use App\Models\Tindakan;
use App\Models\TransaksiTindakan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransaksiTindakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $kunjunganIds = Kunjungan::pluck('id')->toArray();
        $tindakanIds = Tindakan::pluck('id')->toArray();

        foreach ($kunjunganIds as $kunjunganId) {
            TransaksiTindakan::create([
                'kunjungan_id' => $kunjunganId,
                'tindakan_id' => $faker->randomElement($tindakanIds),
                'jumlah' => $faker->numberBetween(1, 3),
                'catatan' => $faker->optional()->sentence,
            ]);
        }
    }
}
