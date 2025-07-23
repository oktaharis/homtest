@extends('layouts.app')

@section('title', 'Tambah Tindakan')

@section('content')
<x-form-container 
    title="Tambah Tindakan Medis" 
    description="Tambahkan jenis tindakan medis dan tarif yang berlaku"
    :back-route="route('master.tindakan.index')"
    back-text="Kembali ke Daftar Tindakan">
    
    <form method="POST" action="{{ route('master.tindakan.store') }}" class="space-y-6">
        @csrf
        
        <x-form-group label="Nama Tindakan" name="nama" required :error="$errors->first('nama')">
            <x-form-input 
                name="nama" 
                placeholder="Masukkan nama tindakan medis"
                required />
        </x-form-group>

        <x-form-group label="Biaya Tindakan" name="biaya" required :error="$errors->first('biaya')">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm">Rp</span>
                </div>
                <x-form-input 
                    type="number" 
                    name="biaya" 
                    placeholder="0"
                    class="pl-10"
                    required />
            </div>
        </x-form-group>

        <div class="bg-blue-50 border border-blue-200 rounded-md p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-blue-700">
                        <strong>Informasi:</strong> Biaya tindakan akan digunakan untuk menghitung total biaya kunjungan pasien. Pastikan tarif sesuai dengan standar yang berlaku di klinik.
                    </p>
                </div>
            </div>
        </div>

        <x-form-actions 
            submit-text="Simpan Tindakan" 
            :cancel-route="route('master.tindakan.index')" />
    </form>
</x-form-container>
@endsection
