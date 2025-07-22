@extends('layouts.app')

@section('title', 'Tambah Transaksi Obat')

@section('content')
    <h2>Tambah Transaksi Obat</h2>
    <form method="POST" action="{{ route('transaksi.obat.store') }}">
        @csrf
        <div class="mb-3">
            <label for="kunjungan_id" class="form-label">Kunjungan</label>
            <select name="kunjungan_id" id="kunjungan_id" class="form-control" required>
                <option value="">Pilih Kunjungan</option>
                @foreach ($kunjungan as $k)
                    <option value="{{ $k->id }}" {{ old('kunjungan_id') == $k->id ? 'selected' : '' }}>{{ $k->pasien->nama }} ({{ \Carbon\Carbon::parse($k->tanggal_kunjungan)->format('d-m-Y H:i') }})</option>
                @endforeach
            </select>
            @error('kunjungan_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="obat_id" class="form-label">Obat</label>
            <select name="obat_id" id="obat_id" class="form-control" required>
                <option value="">Pilih Obat</option>
                @foreach ($obat as $o)
                    <option value="{{ $o->id }}" {{ old('obat_id') == $o->id ? 'selected' : '' }}>{{ $o->nama }} (Stok: {{ $o->stok }})</option>
                @endforeach
            </select>
            @error('obat_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah') }}" required min="1">
            @error('jumlah')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea name="catatan" id="catatan" class="form-control">{{ old('catatan') }}</textarea>
            @error('catatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('transaksi.obat.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection