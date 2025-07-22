@extends('layouts.app')

@section('title', 'Tambah Transaksi Tindakan')

@section('content')
    <h2>Tambah Transaksi Tindakan</h2>
    <form method="POST" action="{{ route('transaksi.tindakan.store') }}">
        @csrf
        <div class="mb-3">
            <label for="kunjungan_id" class="form-label">Kunjungan</label>
            <select name="kunjungan_id" id="kunjungan_id" class="form-control" required>
                <option value="">Pilih Kunjungan</option>
                @foreach ($kunjungan as $k)
                    <option value="{{ $k->id }}" {{ old('kunjungan_id') == $k->id ? 'selected' : '' }}>{{ $k->pasien->nama }} ({{ $k->tanggal_kunjungan }})</option>
                @endforeach
            </select>
            @error('kunjungan_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tindakan_id" class="form-label">Tindakan</label>
            <select name="tindakan_id" id="tindakan_id" class="form-control" required>
                <option value="">Pilih Tindakan</option>
                @foreach ($tindakan as $t)
                    <option value="{{ $t->id }}" {{ old('tindakan_id') == $t->id ? 'selected' : '' }}>{{ $t->nama }} ({{ number_format($t->biaya, 2) }})</option>
                @endforeach
            </select>
            @error('tindakan_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah') }}" required>
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
        <a href="{{ route('transaksi.tindakan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection