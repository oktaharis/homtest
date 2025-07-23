@extends('layouts.app')

@section('title', 'Tambah Wilayah')

@section('content')
<x-form-container 
    title="Tambah Wilayah Baru" 
    description="Tambahkan data provinsi atau kabupaten ke dalam sistem"
    :back-route="route('master.wilayah.index')"
    back-text="Kembali ke Daftar Wilayah">
    
    <form method="POST" action="{{ route('master.wilayah.store') }}" class="space-y-6">
        @csrf
        
        <x-form-group label="Nama Wilayah" name="nama" required :error="$errors->first('nama')">
            <x-form-input 
                name="nama" 
                placeholder="Masukkan nama wilayah"
                required />
        </x-form-group>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-group label="Tipe Wilayah" name="tipe" required :error="$errors->first('tipe')">
                <x-form-select name="tipe" required placeholder="Pilih tipe wilayah">
                    <option value="provinsi" {{ old('tipe') === 'provinsi' ? 'selected' : '' }}>Provinsi</option>
                    <option value="kabupaten" {{ old('tipe') === 'kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                </x-form-select>
            </x-form-group>

            <x-form-group label="Provinsi Induk" name="parent_id" :error="$errors->first('parent_id')">
                <x-form-select name="parent_id" placeholder="Pilih provinsi (opsional)">
                    @foreach ($provinsi as $prov)
                        <option value="{{ $prov->id }}" {{ old('parent_id') == $prov->id ? 'selected' : '' }}>
                            {{ $prov->nama }}
                        </option>
                    @endforeach
                </x-form-select>
            </x-form-group>
        </div>

        <div class="bg-blue-50 border border-blue-200 rounded-md p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-blue-700">
                        <strong>Catatan:</strong> Jika memilih tipe "Kabupaten", pastikan untuk memilih provinsi induk. Untuk tipe "Provinsi", biarkan provinsi induk kosong.
                    </p>
                </div>
            </div>
        </div>

        <x-form-actions 
            submit-text="Simpan Wilayah" 
            :cancel-route="route('master.wilayah.index')" />
    </form>
</x-form-container>
@endsection
