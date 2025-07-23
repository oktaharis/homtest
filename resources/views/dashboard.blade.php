@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <h2 class="text-2xl font-bold text-gray-900">Dashboard</h2>
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <p class="text-gray-700">Selamat datang, {{ Auth::user()->nama }}!</p>
    </div>

    @switch($role)
        @case('admin')
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Total Users</h3>
                    <p class="text-2xl font-bold text-primary-600">{{ $data['total_users'] }}</p>
                    <a href="{{ route('master.users.index') }}" class="text-primary-500 hover:underline">Lihat Users</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Total Pasien</h3>
                    <p class="text-2xl font-bold text-primary-600">{{ $data['total_pasien'] }}</p>
                    <a href="{{ route('master.pasien.index') }}" class="text-primary-500 hover:underline">Lihat Pasien</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Total Kunjungan</h3>
                    <p class="text-2xl font-bold text-primary-600">{{ $data['total_kunjungan'] }}</p>
                    <a href="{{ route('transaksi.kunjungan.index') }}" class="text-primary-500 hover:underline">Lihat Kunjungan</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Pembayaran Lunas</h3>
                    <p class="text-2xl font-bold text-primary-600">{{ $data['total_pembayaran'] }}</p>
                    <a href="{{ route('pembayaran.index') }}" class="text-primary-500 hover:underline">Lihat Pembayaran</a>
                </div>
            </div>
            @break

        @case('petugas')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Total Pasien</h3>
                    <p class="text-2xl font-bold text-primary-600">{{ $data['total_pasien'] }}</p>
                    <a href="{{ route('master.pasien.index') }}" class="text-primary-500 hover:underline">Lihat Pasien</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Kunjungan Hari Ini</h3>
                    <p class="text-2xl font-bold text-primary-600">{{ $data['kunjungan_hari_ini'] }}</p>
                    <a href="{{ route('transaksi.kunjungan.index') }}" class="text-primary-500 hover:underline">Lihat Kunjungan</a>
                </div>
            </div>
            @break

        @case('dokter')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Kunjungan Ditangani</h3>
                    <p class="text-2xl font-bold text-primary-600">{{ $data['kunjungan_dokter'] }}</p>
                    <a href="{{ route('transaksi.kunjungan.index') }}" class="text-primary-500 hover:underline">Lihat Kunjungan</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Transaksi Tindakan</h3>
                    <p class="text-2xl font-bold text-primary-600">{{ $data['transaksi_tindakan'] }}</p>
                    <a href="{{ route('transaksi.tindakan.index') }}" class="text-primary-500 hover:underline">Lihat Tindakan</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Transaksi Obat</h3>
                    <p class="text-2xl font-bold text-primary-600">{{ $data['transaksi_obat'] }}</p>
                    <a href="{{ route('transaksi.obat.index') }}" class="text-primary-500 hover:underline">Lihat Obat</a>
                </div>
            </div>
            @break

        @case('kasir')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Pembayaran Lunas</h3>
                    <p class="text-2xl font-bold text-primary-600">{{ $data['pembayaran_lunas'] }}</p>
                    <a href="{{ route('pembayaran.index') }}" class="text-primary-500 hover:underline">Lihat Pembayaran</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Pembayaran Belum Bayar</h3>
                    <p class="text-2xl font-bold text-primary-600">{{ $data['pembayaran_belum_bayar'] }}</p>
                    <a href="{{ route('pembayaran.index') }}" class="text-primary-500 hover:underline">Lihat Pembayaran</a>
                </div>
            </div>
            @break
    @endswitch
</div>
@endsection