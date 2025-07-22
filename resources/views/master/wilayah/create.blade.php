@extends('layouts.app')

@section('title', 'Tambah Wilayah')

@section('content')
    <h2>Tambah Wilayah</h2>
    <form method="POST" action="{{ route('master.wilayah.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <select name="tipe" id="tipe" class="form-control" required>
                <option value="provinsi" {{ old('tipe') === 'provinsi' ? 'selected' : '' }}>Provinsi</option>
                <option value="kabupaten" {{ old('tipe') === 'kabupaten' ? 'selected' : '' }}>Kabupaten</option>
            </select>
            @error('tipe')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent (Provinsi)</label>
            <select name="parent_id" id="parent_id" class="form-control">
                <option value="">Tidak ada</option>
                @foreach ($provinsi as $prov)
                    <option value="{{ $prov->id }}" {{ old('parent_id') == $prov->id ? 'selected' : '' }}>{{ $prov->nama }}</option>
                @endforeach
            </select>
            @error('parent_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('master.wilayah.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection