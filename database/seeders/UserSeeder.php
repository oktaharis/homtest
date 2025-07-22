<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'nama' => 'Admin Klinik',
            ],
            [
                'username' => 'petugas1',
                'password' => Hash::make('password123'),
                'role' => 'petugas',
                'nama' => 'Budi Santoso',
            ],
            [
                'username' => 'dokter1',
                'password' => Hash::make('password123'),
                'role' => 'dokter',
                'nama' => 'Dr. Anita Sari',
            ],
            [
                'username' => 'kasir1',
                'password' => Hash::make('password123'),
                'role' => 'kasir',
                'nama' => 'Rina Wulandari',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
