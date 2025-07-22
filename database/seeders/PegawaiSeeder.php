<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::whereIn('role', ['petugas', 'dokter', 'kasir'])->get();

        foreach ($users as $user) {
            Pegawai::create([
                'user_id' => $user->id,
                'nama' => $user->nama,
                'jabatan' => $user->role === 'dokter' ? 'Dokter Umum' : ($user->role === 'petugas' ? 'Petugas Pendaftaran' : 'Kasir'),
            ]);
        }
    }
}
