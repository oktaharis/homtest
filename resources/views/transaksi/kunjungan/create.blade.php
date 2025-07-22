@extends('layouts.app')

@section('title', 'Tambah Kunjungan')

@section('content')
    <h2>Tambah Kunjungan</h2>
    <form method="POST" action="{{ route('transaksi.kunjungan.store') }}">
        @csrf
        <div class="mb-3">
            <label for="pasien_id" class="form-label">Pasien</label>
            <select name="pasien_id" id="pasien_id" class="form-control" required>
                <option value="">Pilih Pasien</option>
                @foreach ($pasien as $p)
                    <option value="{{ $p->id }}" {{ old('pasien_id') == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                @endforeach
            </select>
            @error('pasien_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">Dokter</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Pilih Dokter</option>
                @foreach ($dokter as $d)
                    <option value="{{ $d->id }}" {{ old('user_id') == $d->id ? 'selected' : '' }}>{{ $d->nama }}</option>
                @endforeach
            </select>
            @error('user_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
            <input type="datetime-local" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control" value="{{ old('tanggal_kunjungan') }}" required>
            @error('tanggal_kunjungan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jenis_kunjungan" class="form-label">Jenis Kunjungan</label>
            <select name="jenis_kunjungan" id="jenis_kunjungan" class="form-control" required>
                <option value="rawat_jalan" {{ old('jenis_kunjungan') === 'rawat_jalan' ? 'selected' : '' }}>Rawat Jalan</option>
                <option value="konsultasi" {{ old('jenis_kunjungan') === 'konsultasi' ? 'selected' : '' }}>Konsultasi</option>
            </select>
            @error('jenis_kunjungan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('transaksi.kunjungan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection