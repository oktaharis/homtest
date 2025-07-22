<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obat = [
            ['nama' => 'Paracetamol', 'harga' => 5000, 'stok' => 100],
            ['nama' => 'Amoxicillin', 'harga' => 10000, 'stok' => 50],
            ['nama' => 'Ibuprofen', 'harga' => 8000, 'stok' => 75],
        ];

        foreach ($obat as $item) {
            Obat::create($item);
        }
    }
}
