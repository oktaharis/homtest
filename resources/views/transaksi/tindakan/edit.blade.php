@extends('layouts.app')

@section('title', 'Edit Transaksi Tindakan')

@section('content')
<x-form-container 
    title="Edit Tindakan Medis" 
    description="Perbarui tindakan medis yang diberikan kepada pasien"
    :back-route="route('transaksi.tindakan.index')"
    back-text="Kembali ke Daftar Transaksi">
    
    <form method="POST" action="{{ route('transaksi.tindakan.update', $transaksiTindakan) }}" class="space-y-6">
        @csrf
        @method('PUT')
        
        <x-form-group label="Kunjungan Pasien" name="kunjungan_id" required :error="$errors->first('kunjungan_id')">
            <x-form-select name="kunjungan_id" required placeholder="Pilih kunjungan pasien">
                @foreach ($kunjungan as $k)
                    <option value="{{ $k->id }}" {{ old('kunjungan_id', $transaksiTindakan->kunjungan_id) == $k->id ? 'selected' : '' }}>
                        {{ $k->pasien->nama }} - {{ \Carbon\Carbon::parse($k->tanggal_kunjungan)->format('d/m/Y H:i') }}
                    </option>
                @endforeach
            </x-form-select>
        </x-form-group>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-group label="Jenis Tindakan" name="tindakan_id" required :error="$errors->first('tindakan_id')">
                <x-form-select name="tindakan_id" required placeholder="Pilih tindakan medis">
                    @foreach ($tindakan as $t)
                        <option value="{{ $t->id }}" {{ old('tindakan_id', $transaksiTindakan->tindakan_id) == $t->id ? 'selected' : '' }}>
                            {{ $t->nama }} - Rp {{ number_format($t->biaya, 0, ',', '.') }}
                        </option>
                    @endforeach
                </x-form-select>
            </x-form-group>

            <x-form-group label="Jumlah" name="jumlah" required :error="$errors->first('jumlah')">
                <div class="relative">
                    <x-form-input 
                        type="number" 
                        name="jumlah" 
                        :value="$transaksiTindakan->jumlah"
                        placeholder="1"
                        min="1"
                        required />
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm">kali</span>
                    </div>
                </div>
            </x-form-group>
        </div>

        <x-form-group label="Catatan Tindakan" name="catatan" :error="$errors->first('catatan')">
            <x-form-textarea 
                name="catatan" 
                :value="$transaksiTindakan->catatan"
                placeholder="Tambahkan catatan atau keterangan tindakan (opsional)"
                rows="3" />
        </x-form-group>

        <div class="bg-green-50 border border-green-200 rounded-md p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700">
                        <strong>Tips:</strong> Total biaya akan dihitung ulang otomatis berdasarkan perubahan tarif tindakan dan jumlah. Pastikan data yang diperbarui akurat.
                    </p>
                </div>
            </div>
        </div>

        <x-form-actions 
            submit-text="Perbarui Tindakan" 
            :cancel-route="route('transaksi.tindakan.index')" />
    </form>
</x-form-container>
@endsection
