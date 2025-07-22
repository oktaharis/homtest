@extends('layouts.app')

@section('title', 'Tambah Pembayaran')

@section('content')
    <h2>Tambah Pembayaran</h2>
    <form method="POST" action="{{ route('pembayaran.store') }}">
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
            <label for="total_biaya" class="form-label">Total Biaya</label>
            <input type="number" name="total_biaya" id="total_biaya" class="form-control" value="{{ old('total_biaya') }}" required>
            @error('total_biaya')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="belum_bayar" {{ old('status') === 'belum_bayar' ? 'selected' : '' }}>Belum Bayar</option>
                <option value="lunas" {{ old('status') === 'lunas' ? 'selected' : '' }}>Lunas</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
            <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="form-control" value="{{ old('tanggal_bayar') }}">
            @error('tanggal_bayar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection