@extends('layouts.app')

@section('title', 'Edit Transaksi Obat')

@section('content')
<x-form-container 
    title="Edit Resep Obat" 
    description="Perbarui resep obat untuk pasien"
    :back-route="route('transaksi.obat.index')"
    back-text="Kembali ke Daftar Resep">
    
    <form method="POST" action="{{ route('transaksi.obat.update', $transaksiObat) }}" class="space-y-6">
        @csrf
        @method('PUT')
        
        <x-form-group label="Kunjungan Pasien" name="kunjungan_id" required :error="$errors->first('kunjungan_id')">
            <x-form-select name="kunjungan_id" required placeholder="Pilih kunjungan pasien">
                @foreach ($kunjungan as $k)
                    <option value="{{ $k->id }}" {{ old('kunjungan_id', $transaksiObat->kunjungan_id) == $k->id ? 'selected' : '' }}>
                        {{ $k->pasien->nama }} - {{ \Carbon\Carbon::parse($k->tanggal_kunjungan)->format('d/m/Y H:i') }}
                    </option>
                @endforeach
            </x-form-select>
        </x-form-group>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-group label="Obat" name="obat_id" required :error="$errors->first('obat_id')">
                <x-form-select name="obat_id" required placeholder="Pilih obat">
                    @foreach ($obat as $o)
                        <option value="{{ $o->id }}" {{ old('obat_id', $transaksiObat->obat_id) == $o->id ? 'selected' : '' }}>
                            {{ $o->nama }} - Stok: {{ $o->stok }} unit
                        </option>
                    @endforeach
                </x-form-select>
            </x-form-group>

            <x-form-group label="Jumlah" name="jumlah" required :error="$errors->first('jumlah')">
                <div class="relative">
                    <x-form-input 
                        type="number" 
                        name="jumlah" 
                        :value="$transaksiObat->jumlah"
                        placeholder="1"
                        min="1"
                        required />
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm">unit</span>
                    </div>
                </div>
            </x-form-group>
        </div>

        <x-form-group label="Catatan Resep" name="catatan" :error="$errors->first('catatan')">
            <x-form-textarea 
                name="catatan" 
                :value="$transaksiObat->catatan"
                placeholder="Tambahkan aturan pakai atau catatan khusus (opsional)"
                rows="3" />
        </x-form-group>

        <div class="bg-amber-50 border border-amber-200 rounded-md p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-amber-700">
                        <strong>Perhatian:</strong> Perubahan jumlah obat akan mempengaruhi stok. Pastikan stok mencukupi untuk perubahan yang akan dilakukan.
                    </p>
                </div>
            </div>
        </div>

        <x-form-actions 
            submit-text="Perbarui Resep" 
            :cancel-route="route('transaksi.obat.index')" />
    </form>
</x-form-container>
@endsection
