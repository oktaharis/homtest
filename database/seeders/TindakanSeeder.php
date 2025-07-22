<?php

namespace Database\Seeders;

use App\Models\Tindakan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TindakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tindakan = [
            ['nama' => 'Pemeriksaan Umum', 'biaya' => 50000],
            ['nama' => 'Cek Laboratorium', 'biaya' => 150000],
            ['nama' => 'Konsultasi Spesialis', 'biaya' => 100000],
        ];

        foreach ($tindakan as $item) {
            Tindakan::create($item);
        }
    }
}
