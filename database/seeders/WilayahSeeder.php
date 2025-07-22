<?php

namespace Database\Seeders;

use App\Models\Wilayah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinsi = Wilayah::create([
            'nama' => 'Jawa Barat',
            'tipe' => 'provinsi',
            'parent_id' => null,
        ]);

        Wilayah::create([
            'nama' => 'Bandung',
            'tipe' => 'kabupaten',
            'parent_id' => $provinsi->id,
        ]);

        Wilayah::create([
            'nama' => 'Bogor',
            'tipe' => 'kabupaten',
            'parent_id' => $provinsi->id,
        ]);
    }
}
