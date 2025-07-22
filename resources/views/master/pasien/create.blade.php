@extends('layouts.app')

@section('title', 'Tambah Pasien')

@section('content')
    <h2>Tambah Pasien</h2>
    <form method="POST" action="{{ route('master.pasien.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
            @error('alamat')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="wilayah_id" class="form-label">Wilayah</label>
            <select name="wilayah_id" id="wilayah_id" class="form-control" required>
                <option value="">Pilih Wilayah</option>
                @foreach ($wilayah as $w)
                    <option value="{{ $w->id }}" {{ old('wilayah_id') == $w->id ? 'selected' : '' }}>{{ $w->nama }}</option>
                @endforeach
            </select>
            @error('wilayah_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
            @error('tanggal_lahir')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('master.pasien.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection