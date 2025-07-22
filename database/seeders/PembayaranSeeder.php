<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Kunjungan;
use App\Models\TransaksiTindakan;
use App\Models\TransaksiObat;
use App\Models\Pembayaran;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $kunjunganIds = Kunjungan::where('status', 'dibayar')->pluck('id')->toArray();

        foreach ($kunjunganIds as $kunjunganId) {
            $transaksiTindakan = TransaksiTindakan::where('kunjungan_id', $kunjunganId)->with('tindakan')->get();
            $transaksiObat = TransaksiObat::where('kunjungan_id', $kunjunganId)->with('obat')->get();

            $totalBiayaTindakan = $transaksiTindakan->sum(function ($item) {
                return $item->jumlah * $item->tindakan->biaya;
            });

            $totalBiayaObat = $transaksiObat->sum(function ($item) {
                return $item->jumlah * $item->obat->harga;
            });

            Pembayaran::create([
                'kunjungan_id' => $kunjunganId,
                'total_biaya' => $totalBiayaTindakan + $totalBiayaObat,
                'status' => 'lunas',
                'tanggal_bayar' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
