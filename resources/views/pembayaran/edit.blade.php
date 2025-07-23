@extends('layouts.app')

@section('title', 'Edit Pembayaran')

@section('content')
<x-form-container 
    title="Edit Pembayaran" 
    description="Perbarui status dan informasi pembayaran"
    :back-route="route('pembayaran.index')"
    back-text="Kembali ke Daftar Pembayaran">
    
    <form method="POST" action="{{ route('pembayaran.update', $pembayaran) }}" class="space-y-6">
        @csrf
        @method('PUT')
        
        <x-form-group label="Kunjungan Pasien" name="kunjungan_id" required :error="$errors->first('kunjungan_id')">
            <x-form-select name="kunjungan_id" required placeholder="Pilih kunjungan yang akan dibayar">
                @foreach ($kunjungan as $k)
                    <option value="{{ $k->id }}" {{ old('kunjungan_id', $pembayaran->kunjungan_id) == $k->id ? 'selected' : '' }}>
                        {{ $k->pasien->nama }} - {{ \Carbon\Carbon::parse($k->tanggal_kunjungan)->format('d/m/Y H:i') }}
                    </option>
                @endforeach
            </x-form-select>
        </x-form-group>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-group label="Status Pembayaran" name="status" required :error="$errors->first('status')">
                <x-form-select name="status" required placeholder="Pilih status pembayaran">
                    <option value="belum_bayar" {{ old('status', $pembayaran->status) === 'belum_bayar' ? 'selected' : '' }}>Belum Bayar</option>
                    <option value="lunas" {{ old('status', $pembayaran->status) === 'lunas' ? 'selected' : '' }}>Lunas</option>
                </x-form-select>
            </x-form-group>

            <x-form-group label="Tanggal Pembayaran" name="tanggal_bayar" :error="$errors->first('tanggal_bayar')">
                <x-form-input 
                    type="date" 
                    name="tanggal_bayar" 
                    :value="$pembayaran->tanggal_bayar" />
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
                        <strong>Informasi:</strong> Total biaya dihitung otomatis berdasarkan tindakan dan obat. Jika mengubah status menjadi "Lunas", pastikan tanggal pembayaran diisi.
                    </p>
                </div>
            </div>
        </div>

        <x-form-actions 
            submit-text="Perbarui Pembayaran" 
            :cancel-route="route('pembayaran.index')" />
    </form>
</x-form-container>
@endsection
