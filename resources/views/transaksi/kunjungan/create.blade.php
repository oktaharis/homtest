@extends('layouts.app')

@section('title', 'Tambah Kunjungan')

@section('content')
<x-form-container 
    title="Registrasi Kunjungan Baru" 
    description="Daftarkan kunjungan pasien ke dokter"
    :back-route="route('transaksi.kunjungan.index')"
    back-text="Kembali ke Daftar Kunjungan">
    
    <form method="POST" action="{{ route('transaksi.kunjungan.store') }}" class="space-y-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-group label="Pasien" name="pasien_id" required :error="$errors->first('pasien_id')">
                <x-form-select name="pasien_id" required placeholder="Pilih pasien">
                    @foreach ($pasien as $p)
                        <option value="{{ $p->id }}" {{ old('pasien_id') == $p->id ? 'selected' : '' }}>
                            {{ $p->nama }}
                        </option>
                    @endforeach
                </x-form-select>
            </x-form-group>

            <x-form-group label="Dokter" name="user_id" required :error="$errors->first('user_id')">
                <x-form-select name="user_id" required placeholder="Pilih dokter">
                    @foreach ($dokter as $d)
                        <option value="{{ $d->id }}" {{ old('user_id') == $d->id ? 'selected' : '' }}>
                            {{ $d->nama }}
                        </option>
                    @endforeach
                </x-form-select>
            </x-form-group>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-group label="Tanggal & Waktu Kunjungan" name="tanggal_kunjungan" required :error="$errors->first('tanggal_kunjungan')">
                <x-form-input 
                    type="datetime-local" 
                    name="tanggal_kunjungan" 
                    required />
            </x-form-group>

            <x-form-group label="Jenis Kunjungan" name="jenis_kunjungan" required :error="$errors->first('jenis_kunjungan')">
                <x-form-select name="jenis_kunjungan" required placeholder="Pilih jenis kunjungan">
                    <option value="rawat_jalan" {{ old('jenis_kunjungan') === 'rawat_jalan' ? 'selected' : '' }}>Rawat Jalan</option>
                    <option value="konsultasi" {{ old('jenis_kunjungan') === 'konsultasi' ? 'selected' : '' }}>Konsultasi</option>
                </x-form-select>
            </x-form-group>
        </div>

        <div class="bg-indigo-50 border border-indigo-200 rounded-md p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-indigo-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-indigo-700">
                        <strong>Informasi:</strong> Setelah kunjungan terdaftar, dokter dapat menambahkan tindakan medis dan resep obat. Status kunjungan akan berubah sesuai dengan progress pelayanan.
                    </p>
                </div>
            </div>
        </div>

        <x-form-actions 
            submit-text="Daftar Kunjungan" 
            :cancel-route="route('transaksi.kunjungan.index')" />
    </form>
</x-form-container>
@endsection
