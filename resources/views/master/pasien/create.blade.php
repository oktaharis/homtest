@extends('layouts.app')

@section('title', 'Tambah Pasien')

@section('content')
<x-form-container 
    title="Tambah Pasien Baru" 
    description="Daftarkan pasien baru ke dalam sistem klinik"
    :back-route="route('master.pasien.index')"
    back-text="Kembali ke Daftar Pasien">
    
    <form method="POST" action="{{ route('master.pasien.store') }}" class="space-y-6">
        @csrf
        
        <x-form-group label="Nama Lengkap" name="nama" required :error="$errors->first('nama')">
            <x-form-input 
                name="nama" 
                placeholder="Masukkan nama lengkap pasien"
                required />
        </x-form-group>

        <x-form-group label="Alamat Lengkap" name="alamat" required :error="$errors->first('alamat')">
            <x-form-textarea 
                name="alamat" 
                placeholder="Masukkan alamat lengkap pasien"
                rows="3"
                required />
        </x-form-group>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-group label="Wilayah" name="wilayah_id" required :error="$errors->first('wilayah_id')">
                <x-form-select name="wilayah_id" required placeholder="Pilih wilayah">
                    @foreach ($wilayah as $w)
                        <option value="{{ $w->id }}" {{ old('wilayah_id') == $w->id ? 'selected' : '' }}>
                            {{ $w->nama }}
                        </option>
                    @endforeach
                </x-form-select>
            </x-form-group>

            <x-form-group label="Tanggal Lahir" name="tanggal_lahir" required :error="$errors->first('tanggal_lahir')">
                <x-form-input 
                    type="date" 
                    name="tanggal_lahir" 
                    required />
            </x-form-group>
        </div>

        <div class="bg-green-50 border border-green-200 rounded-md p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700">
                        <strong>Tips:</strong> Pastikan data yang dimasukkan akurat untuk memudahkan pelayanan medis dan administrasi. Usia akan dihitung otomatis berdasarkan tanggal lahir.
                    </p>
                </div>
            </div>
        </div>

        <x-form-actions 
            submit-text="Daftar Pasien" 
            :cancel-route="route('master.pasien.index')" />
    </form>
</x-form-container>
@endsection
