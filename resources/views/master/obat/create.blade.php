@extends('layouts.app')

@section('title', 'Tambah Obat')

@section('content')
<x-form-container 
    title="Tambah Obat Baru" 
    description="Tambahkan obat ke dalam inventori klinik"
    :back-route="route('master.obat.index')"
    back-text="Kembali ke Daftar Obat">
    
    <form method="POST" action="{{ route('master.obat.store') }}" class="space-y-6">
        @csrf
        
        <x-form-group label="Nama Obat" name="nama" required :error="$errors->first('nama')">
            <x-form-input 
                name="nama" 
                placeholder="Masukkan nama obat"
                required />
        </x-form-group>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-group label="Harga per Unit" name="harga" required :error="$errors->first('harga')">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm">Rp</span>
                    </div>
                    <x-form-input 
                        type="number" 
                        name="harga" 
                        placeholder="0"
                        class="pl-10"
                        required />
                </div>
            </x-form-group>

            <x-form-group label="Stok Awal" name="stok" required :error="$errors->first('stok')">
                <div class="relative">
                    <x-form-input 
                        type="number" 
                        name="stok" 
                        placeholder="0"
                        required />
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm">unit</span>
                    </div>
                </div>
            </x-form-group>
        </div>

        <div class="bg-yellow-50 border border-yellow-200 rounded-md p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-yellow-700">
                        <strong>Perhatian:</strong> Pastikan nama obat, harga, dan stok awal sudah benar. Stok akan berkurang otomatis setiap kali obat diresepkan kepada pasien.
                    </p>
                </div>
            </div>
        </div>

        <x-form-actions 
            submit-text="Simpan Obat" 
            :cancel-route="route('master.obat.index')" />
    </form>
</x-form-container>
@endsection
